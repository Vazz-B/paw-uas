<?php
// Endpoint untuk toggle like via AJAX (POST).

require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../model/likePostModel.php';

function likePostAction() {
    session_start();

    header('Content-Type: application/json; charset=utf-8');

    if (!isset($_SESSION['login']) || !isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'not_logged_in']);
        exit;
    }

    // Hanya terima POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['status' => 'error', 'message' => 'invalid_method']);
        exit;
    }

    $post_id = intval($_POST['post_id'] ?? 0);
    if ($post_id <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'invalid_post']);
        exit;
    }

    $user_id = intval($_SESSION['user_id']);

    // toggle like: jika sudah like -> hapus, kalau belum -> tambah
    if (hasLikedPost($post_id, $user_id)) {
        $ok = removeLikePost($post_id, $user_id);
        $status = $ok ? 'unliked' : 'error';
    } 
    else {
        $ok = addLikePost($post_id, $user_id);
        $status = $ok ? 'liked' : 'error';
    }

    $jumlah = countLikesPost($post_id);

    echo json_encode([
        'status' => $status,
        'jumlah_like' => $jumlah
    ]);
    exit;
}
