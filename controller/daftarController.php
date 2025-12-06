<?php
require_once __DIR__ . '/../model/daftarModel.php';

// Tampilkan halaman daftar
function tampil_daftar() {
    include __DIR__ . '/../view/daftar_view.php';
}

// Proses daftar
function proses_daftar() {      
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $asal_sekolah = $_POST['asal_sekolah'];

    // Tambahkan sekolah jika belum ada
    $sekolah_id = tambah_sekolah_jika_belum_ada($asal_sekolah);

    // Daftar user
    $hasil = daftar_user_baru($nama, $email, $password, $sekolah_id);

    if ($hasil) {
        echo "<script>alert('Pendaftaran berhasil! Silakan login.'); 
        window.location='index.php?action=login';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal mendaftar!'); window.history.back();</script>";
    }
}

// nama sekolah otomatis
function cari_Sekolah() {
    $keyword = trim($_GET['keyword'] ?? '');
    header('Content-Type: application/json'); // penting
    echo json_encode(cariSekolah($keyword));
}
