<?php
require_once __DIR__ . '/../model/daftarModel.php';

// Tampilkan halaman daftar
function tampilDaftar() {
    include __DIR__ . '/../view/daftar_view.php';
}

// Proses daftar
function prosesDaftar() {      
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $asal_sekolah = $_POST['asal_sekolah'];

    // Tambahkan sekolah jika belum ada
    $sekolah_id = tambahSekolahJikaBelumAda($asal_sekolah);

    // Daftar user
    $hasil = daftarUserBaru($nama, $email, $password, $sekolah_id);

    if ($hasil) {
        echo "<script>alert('Pendaftaran berhasil! Silakan login.'); 
        window.location='index.php?action=login';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal mendaftar!'); window.history.back();</script>";
    }
}

// nama sekolah otomatis
function cariSekolahAjax() {
    $keyword = trim($_GET['keyword'] ?? '');
    header('Content-Type: application/json'); // penting
    echo json_encode(cariSekolah($keyword));
}
