<?php
require_once __DIR__ . '/../model/postModel.php';

require_once __DIR__ . '/../model/postModel.php';

function prosesSimpanPost() {
    session_start();

    // 1. Cek apakah user sudah login
    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $judul = $_POST['judul'];
    // Kita butuh ID user yang sedang login (Nanti kita tambahkan di LoginController)
    $user_id = $_SESSION['user_id'] ?? 0; 

    // --- LOGIKA GAMBAR OTOMATIS ---
    $namaFile = $_FILES['foto']['name'];
    $tmpName  = $_FILES['foto']['tmp_name'];
    $error    = $_FILES['foto']['error'];

    // Cek ada gambar gak
    if ($error === 4) {
        echo "<script>alert('Pilih gambar dulu!'); window.history.back();</script>";
        return;
    }

    // Generate Nama Baru (Uniqid)
    $ekstensi = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaBaru = uniqid() . '_' . time() . '.' . $ekstensi;

    // Tentukan folder tujuan (Pastikan folder 'uploads' ada di samping index.php utama)
    $tujuan = 'uploads/' . $namaBaru;

    // Pindahkan File
    if (move_uploaded_file($tmpName, $tujuan)) {
        
        // Panggil Model untuk simpan text ke DB
        if (simpanPostingan($user_id, $judul, $namaBaru)) {
            // Berhasil
            echo "<script>alert('Berhasil Upload!'); window.location='view/user/dashboard_user.php';</script>";
        } else {
            echo "<script>alert('Gagal simpan ke database!'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('Gagal upload gambar!'); window.history.back();</script>";
    }
}

// tambah halaman buku
function tampilPostinganBuku() {
    require_once __DIR__ . '/../model/postModel.php';

    // Ambil postingan kategori Buku (kategori_id = 1)
    $dataBuku = ambilPostinganBuku();

    // Arahkan ke halaman buku
    include __DIR__ . '/../view/user/buku.php';
}

if (isset($_GET['action']) && $_GET['action'] === 'buku') {
    tampilPostinganBuku();
    exit;
}
?>