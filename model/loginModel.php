<?php
require_once __DIR__ . '/../config/koneksi.php';

function cekUser($nama) {
    global $conn;

    $sql = "SELECT * FROM user WHERE nama = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $nama);
    mysqli_stmt_execute($stmt);
    $data = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($data);
}
