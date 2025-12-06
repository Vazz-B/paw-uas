<?php
require_once __DIR__ . '/../../config/koneksi.php';

function admin_ambil_semua_postingan() {
    global $conn;

    $sql = "SELECT 
                post.post_id,
                post.kategori_id,
                post.judul,
                post.isi,
                post.gambar,
                post.tanggal_post,
                user.nama AS nama_user,
                kategori.nama_kategori
            FROM post
            JOIN user ON post.user_id = user.user_id
            LEFT JOIN kategori ON post.kategori_id = kategori.kategori_id
            ORDER BY post.post_id DESC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        return [];
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function admin_ambil_postingan_buku() {
    global $conn;

    $sql = "SELECT 
                post.post_id,
                post.kategori_id,
                post.judul,
                post.isi,
                post.gambar,
                post.tanggal_post,
                user.nama AS nama_user,
                kategori.nama_kategori
            FROM post
            JOIN user ON post.user_id = user.user_id
            LEFT JOIN kategori ON post.kategori_id = kategori.kategori_id
            WHERE post.kategori_id = 1
            ORDER BY post.post_id DESC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        return [];
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function admin_ambil_postingan_film() {
    global $conn;

    $sql = "SELECT 
                post.post_id,
                post.kategori_id,
                post.judul,
                post.isi,
                post.gambar,
                post.tanggal_post,
                user.nama AS nama_user,
                kategori.nama_kategori
            FROM post
            JOIN user ON post.user_id = user.user_id
            LEFT JOIN kategori ON post.kategori_id = kategori.kategori_id
            WHERE post.kategori_id = 4
            ORDER BY post.post_id DESC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        return [];
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}




function admin_ambil_postingan_game() {
    global $conn;

    $sql = "SELECT 
                post.post_id,
                post.kategori_id,
                post.judul,
                post.isi,
                post.gambar,
                post.tanggal_post,
                user.nama AS nama_user,
                kategori.nama_kategori
            FROM post
            JOIN user ON post.user_id = user.user_id
            LEFT JOIN kategori ON post.kategori_id = kategori.kategori_id
            WHERE post.kategori_id = 2
            ORDER BY post.post_id DESC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        return [];
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}




function admin_ambil_postingan_lagu() {
    global $conn;

    $sql = "SELECT 
                post.post_id,
                post.kategori_id,
                post.judul,
                post.isi,
                post.gambar,
                post.tanggal_post,
                user.nama AS nama_user,
                kategori.nama_kategori
            FROM post
            JOIN user ON post.user_id = user.user_id
            LEFT JOIN kategori ON post.kategori_id = kategori.kategori_id
            WHERE post.kategori_id = 3
            ORDER BY post.post_id DESC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        return [];
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
