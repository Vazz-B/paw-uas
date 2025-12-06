<?php
require_once __DIR__ . '/../../config/koneksi.php';

function admin_hapus_komentar($komentar_id) {
    global $conn;

    // Hapus like dari komentar
    $sqlLikeKomentar = "DELETE FROM like_komentar WHERE komentar_id = ?";
    $stmt = mysqli_prepare($conn, $sqlLikeKomentar);
    mysqli_stmt_bind_param($stmt, "i", $komentar_id);
    mysqli_stmt_execute($stmt);

    // Jika ada fitur balasan komentar (nested comment), hapus di sini:
    /*
    $sqlBalasan = "DELETE FROM komentar WHERE parent_id = ?";
    $stmt = mysqli_prepare($conn, $sqlBalasan);
    mysqli_stmt_bind_param($stmt, "i", $komentar_id);
    mysqli_stmt_execute($stmt);
    */

    // Hapus komentar utama
    $sqlKomentar = "DELETE FROM komentar WHERE komentar_id = ?";
    $stmt = mysqli_prepare($conn, $sqlKomentar);
    mysqli_stmt_bind_param($stmt, "i", $komentar_id);

    return mysqli_stmt_execute($stmt);
}
