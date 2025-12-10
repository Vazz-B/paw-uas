<?php
require_once __DIR__ . '/../../model/admin/komentar_admin_model.php';

function tampil_komentar_admin() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $post_id = intval($_GET['post_id'] ?? 0);
    if ($post_id <= 0) {
        echo "Post tidak ditemukan.";
        exit;
    }

    $komentar = admin_ambilKomentarByPost($post_id);

    // Logika Like Komentar
    foreach ($komentar as $idx => $k) {
        $komentar_id = intval($k['komentar_id']);
        $komentar[$idx]['jumlah_like'] = countLikesKomentar($komentar_id);

        if (isset($_SESSION['user_id'])) {
            $komentar[$idx]['user_has_liked'] =
                hasLikedKomentar($komentar_id, $_SESSION['user_id']);
        } 
        else {
            $komentar[$idx]['user_has_liked'] = false;
        }
    }

    require_once __DIR__ . '/../../view/admin/komentar_admin.php';
}
