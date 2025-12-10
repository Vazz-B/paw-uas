<?php
require_once __DIR__ . '/../model/tambahPostinganModel.php';

function prosesSimpanPost() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $user_id = $_SESSION['user_id'] ?? 0; 
    $kategori_id = $_POST['kategori_id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    

    $namaFile = $_FILES['foto']['name'];
    $tmpName  = $_FILES['foto']['tmp_name'];
    $error    = $_FILES['foto']['error'];

    if ($error === 4) {
        echo "<script>alert('Pilih gambar dulu!'); window.history.back();</script>";
        return;
    }

    $ekstensi = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaBaru = uniqid() . '_' . time() . '.' . $ekstensi;

    $tujuan = 'uploads/' . $namaBaru;

    if (move_uploaded_file($tmpName, $tujuan)) {
        if (simpanPostingan($user_id, $kategori_id, $judul, $isi, $namaBaru)) {
            echo "<script>alert('Berhasil Upload!'); window.location='/UAS/paw-uas/index.php?action=dashboard';</script>";
        } else {
            echo "<script>alert('Gagal simpan ke database!'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('Gagal upload gambar!'); window.history.back();</script>";
    }
}
?>