<?php
require_once __DIR__ . '/../config/koneksi.php';

// Cari sekolah untuk autocomplete
function cariSekolah($keyword) {
    global $conn;

    $keyword = "%$keyword%";
    $sql = "SELECT * FROM sekolah WHERE nama_sekolah LIKE ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $keyword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Tambahkan sekolah jika belum ada
function tambahSekolahJikaBelumAda($nama) {
    global $conn;

    // Cek dulu
    $sql = "SELECT sekolah_id FROM sekolah WHERE nama_sekolah = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $nama);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        return $row['id']; // sudah ada
    }

    // Tambahkan baru
    $insert = mysqli_prepare($conn, "INSERT INTO sekolah (nama_sekolah) VALUES (?)");
    mysqli_stmt_bind_param($insert, "s", $nama);
    mysqli_stmt_execute($insert);

    return mysqli_insert_id($conn);
}

// Daftarkan user baru
function daftarUserBaru($nama, $email, $password, $sekolah_id) {
    global $conn;

    $sql = "INSERT INTO user (nama, email, password, sekolah_id, role) VALUES (?,?,?,?, 'user')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $password, $sekolah_id);

    return mysqli_stmt_execute($stmt);
}
