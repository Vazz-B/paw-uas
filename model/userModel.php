<?php
require_once __DIR__ . '/../config/koneksi.php';

function getAllUser() {
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM user");
    return $query;
}

function cekUser($username, $password) {
    global $conn;

    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}
