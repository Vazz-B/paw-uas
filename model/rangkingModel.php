<?php
require_once __DIR__ . '/../config/koneksi.php';

function getTopPostAll() {
    global $conn;

    $sql = "SELECT p.*, u.nama AS nama_user, k.nama_kategori,
            (SELECT COUNT(*) FROM komentar WHERE post_id = p.post_id) AS jumlah_komentar
            FROM post p
            JOIN user u ON p.user_id = u.user_id
            LEFT JOIN kategori k ON p.kategori_id = k.kategori_id
            ORDER BY p.jumlah_like DESC
            LIMIT 10";

    return mysqli_query($conn, $sql);
}

function getTopPostBySekolah($sekolah_id) {
    global $conn;

    $sql = "SELECT p.*, u.nama AS nama_user, k.nama_kategori,
            (SELECT COUNT(*) FROM komentar WHERE post_id = p.post_id) AS jumlah_komentar
            FROM post p
            JOIN user u ON p.user_id = u.user_id
            LEFT JOIN kategori k ON p.kategori_id = k.kategori_id
            WHERE u.sekolah_id = '$sekolah_id'
            ORDER BY p.jumlah_like DESC
            LIMIT 10";

    return mysqli_query($conn, $sql);
}



function getTopCommentAll() {
    global $conn;

    $sql = "SELECT c.*, u.nama AS nama_user
            FROM komentar c
            JOIN user u ON c.user_id = u.user_id
            ORDER BY c.jumlah_like DESC
            LIMIT 10";

    return mysqli_query($conn, $sql);
}

function getTopCommentBySekolah($sekolah_id) {
    global $conn;

    $sql = "SELECT c.*, u.nama AS nama_user
            FROM komentar c
            JOIN user u ON c.user_id = u.user_id
            WHERE u.sekolah_id = '$sekolah_id'
            ORDER BY c.jumlah_like DESC
            LIMIT 10";

    return mysqli_query($conn, $sql);
}
