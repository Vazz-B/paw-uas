<?php
require_once __DIR__ . '/../model/likeKomentarModel.php';

function likeKomentarAction() {
    session_start();

    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'msg' => 'Not logged in']);
        return;
    }

    $user_id = $_SESSION['user_id'];
    $komentar_id = $_POST['komentar_id'] ?? 0;

    if ($komentar_id == 0) {
        echo json_encode(['status' => 'error']);
        return;
    }

    if (hasLikedKomentar($komentar_id, $user_id)) {
        unlikeKomentar($komentar_id, $user_id);
        $newCount = countLikesKomentar($komentar_id);
        echo json_encode(['status' => 'unliked', 'jumlah_like' => $newCount]);
    } else {
        likeKomentar($komentar_id, $user_id);
        $newCount = countLikesKomentar($komentar_id);
        echo json_encode(['status' => 'liked', 'jumlah_like' => $newCount]);
    }
}
