<?php
require_once __DIR__ . '/../../config/koneksi.php';

function admin_hapus_postingan($post_id) {
    global $conn;

    $sqlLikeKomentar = "
        DELETE lk
        FROM like_komentar lk
        JOIN komentar k ON lk.komentar_id = k.komentar_id
        WHERE k.post_id = ?
    ";
    $stmt = mysqli_prepare($conn, $sqlLikeKomentar);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);

    $sqlKomentar = "DELETE FROM komentar WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sqlKomentar);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);

    $sqlLikePost = "DELETE FROM like_post WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sqlLikePost);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);

    $sqlRating = "DELETE FROM rating WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sqlRating);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);
    
    $sqlPost = "DELETE FROM post WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sqlPost);
    mysqli_stmt_bind_param($stmt, "i", $post_id);

    return mysqli_stmt_execute($stmt);
}
