<?php

require_once __DIR__ . '/../config/koneksi.php'; // pastikan path benar

function countLikesPost($post_id) {
    global $conn;
    $sql = "SELECT jumlah_like FROM post WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $jumlah_like);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    return intval($jumlah_like);
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

    // Cek dulu apakah user sudah like
    if (hasLikedPost($post_id, $user_id)) {
        return false; // sudah ada like, tidak usah insert
    }

    // Insert like
    $sql = "INSERT INTO like_post (post_id, user_id) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $post_id, $user_id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($ok) {
        // Tambah jumlah like
        mysqli_query($conn, "UPDATE post SET jumlah_like = jumlah_like + 1 WHERE post_id = $post_id");
    }

    return $ok;
    error_log("INSERT OK: $ok, rows: " . mysqli_affected_rows($conn));
}

function removeLikePost($post_id, $user_id) {
    global $conn;

    // Hapus record like
    $sql = "DELETE FROM like_post WHERE post_id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $post_id, $user_id);
    $ok = mysqli_stmt_execute($stmt);
    $affected = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);

    if ($ok && $affected > 0) {
        mysqli_query($conn, "UPDATE post SET jumlah_like = GREATEST(jumlah_like - 1, 0) WHERE post_id = $post_id");
    }

    return $ok;
}