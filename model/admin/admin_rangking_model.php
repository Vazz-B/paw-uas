<?php
require_once __DIR__ . '/../../config/koneksi.php';

function admin_rangking_postingan_keseluruhan() {
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

function admin_rangking_postingan_persekolah($sekolah_id) {
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



function admin_rangking_komentar_keseluruhan() {
    global $conn;

    $sql = "SELECT c.*, u.nama AS nama_user
            FROM komentar c
            JOIN user u ON c.user_id = u.user_id
            ORDER BY c.jumlah_like DESC
            LIMIT 10";

    return mysqli_query($conn, $sql);
}

function admin_rangking_komentar_persekolah($sekolah_id) {
    global $conn;

    $sql = "SELECT c.*, u.nama AS nama_user
            FROM komentar c
            JOIN user u ON c.user_id = u.user_id
            WHERE u.sekolah_id = '$sekolah_id'
            ORDER BY c.jumlah_like DESC
            LIMIT 10";

    return mysqli_query($conn, $sql);
}


function cek_filter_sekolah($keyword) {
    global $conn;

    $keyword = "%$keyword%";
    $sql = "SELECT * FROM sekolah WHERE nama_sekolah LIKE ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $keyword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}