<?php
require_once __DIR__ . '/../config/koneksi.php';

function getBuku() {
    global $conn;

    $sql = "SELECT p.*, u.nama AS nama_user, k.nama_kategori
            FROM post p
            JOIN user u ON p.user_id = u.id
            JOIN kategori k ON p.kategori_id = k.kategori_id
            WHERE p.kategori_id = 1
            ORDER BY p.tanggal_post DESC";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
