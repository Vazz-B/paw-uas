<?php
require_once __DIR__ . '/../config/koneksi.php';

function ambilRankingKeseluruhan() {
    global $conn;

    $sql = "SELECT 
                p.post_id, p.kategori_id, p.judul, p.isi, p.gambar, p.tanggal_post,
                u.nama AS nama_user,
                k.nama_kategori,
                COUNT(r.rating_id) AS total_rating
            FROM rating r
            JOIN post p ON r.post_id = p.post_id
            JOIN user u ON p.user_id = u.user_id
            LEFT JOIN kategori k ON p.kategori_id = k.kategori_id
            GROUP BY r.post_id
            ORDER BY total_rating DESC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function ambilRankingPerSekolah($sekolah_id) {
    global $conn;

    $sql = "SELECT 
                p.post_id, p.kategori_id, p.judul, p.isi, p.gambar, p.tanggal_post,
                u.nama AS nama_user,
                k.nama_kategori,
                COUNT(r.rating_id) AS total_rating
            FROM rating r
            JOIN post p ON r.post_id = p.post_id
            JOIN user u ON p.user_id = u.user_id
            LEFT JOIN kategori k ON p.kategori_id = k.kategori_id
            WHERE r.sekolah_id = ?
            GROUP BY r.post_id
            ORDER BY total_rating DESC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $sekolah_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
