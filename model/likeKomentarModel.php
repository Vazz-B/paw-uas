<?php
require_once __DIR__ . '/../config/koneksi.php';

function hasLikedKomentar($komentar_id, $user_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM like_komentar WHERE komentar_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $komentar_id, $user_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_row()[0] > 0;
}

function likeKomentar($komentar_id, $user_id) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO like_komentar (komentar_id, user_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $komentar_id, $user_id);
    return $stmt->execute();
}

function incrementKomentarLike($komentar_id) {
    global $conn;
    $stmt = $conn->prepare("UPDATE komentar SET jumlah_like = jumlah_like + 1 WHERE komentar_id = ?");
    $stmt->bind_param("i", $komentar_id);
    $stmt->execute();
}

function unlikeKomentar($komentar_id, $user_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM like_komentar WHERE komentar_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $komentar_id, $user_id);
    return $stmt->execute();
}

function decrementKomentarLike($komentar_id) {
    global $conn;
    $stmt = $conn->prepare("UPDATE komentar SET jumlah_like = jumlah_like - 1 WHERE komentar_id = ? AND jumlah_like > 0");
    $stmt->bind_param("i", $komentar_id);
    $stmt->execute();
}

function countLikesKomentar($komentar_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT jumlah_like FROM komentar WHERE komentar_id = ?");
    $stmt->bind_param("i", $komentar_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_row()[0];
}