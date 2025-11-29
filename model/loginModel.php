<?php
require_once __DIR__ . '/../config/koneksi.php';

function cekUser($nama, $password) {
    global $conn;

    $sql = "SELECT * FROM user WHERE nama = ? AND password = ? ";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nama, $password);
    mysqli_stmt_execute($stmt);

    $data = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($data);
}

function hitung_postingan_user($user_id){
    global $conn;

    $sql = "SELECT COUNT(*) AS jumlah_postingan FROM post WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $data = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($data);

    return $row['jumlah_postingan'];
}
