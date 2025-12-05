<?php

require_once __DIR__ . '/../config/koneksi.php'; // pastikan path benar

function countLikesPost($post_id) {
    global $conn;
    $sql = "SELECT COUNT(*) FROM like_post WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    return intval($count);
}

function hasLikedPost($post_id, $user_id) {
    global $conn;
    $sql = "SELECT 1 FROM like_post WHERE post_id = ? AND user_id = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $post_id, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $exists = mysqli_stmt_num_rows($stmt) > 0;
    mysqli_stmt_close($stmt);
    return $exists;
}

function addLikePost($post_id, $user_id) {
    global $conn;
    // gunakan INSERT IGNORE untuk menghindari duplicate error jika constraint UNIQUE ada
    $sql = "INSERT IGNORE INTO like_post (post_id, user_id) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $post_id, $user_id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function removeLikePost($post_id, $user_id) {
    global $conn;
    $sql = "DELETE FROM like_post WHERE post_id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $post_id, $user_id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}
