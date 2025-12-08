<?php
require_once __DIR__ . '/../model/dashboardModel.php';

// Nizam
require_once __DIR__ . '/../model/likePostModel.php';
require_once __DIR__ . '/../model/komentarUserModel.php';
// Nizam
require_once "./config/cek_role.php";

function tampil_dashboard() {
    untuk_user();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Ambil data postingan dari model
    $posts = ambil_semua_postingan();

    // Nizam
    foreach ($posts as $idx => $p) {
        $post_id = intval($p['post_id']);
        $posts[$idx]['jumlah_like'] = countLikesPost($post_id);

        if (isset($_SESSION['user_id'])) {
            $posts[$idx]['user_has_liked'] = hasLikedPost($post_id, $_SESSION['user_id']);
        } else {
            $posts[$idx]['user_has_liked'] = false;
        }

        // Nizam
        $posts[$idx]['jumlah_komentar'] = countKomentarByPost($post_id);
    }

    // Kirim ke view
    require_once __DIR__ . '/../view/user/dashboard_user.php';
}

function tampil_filter_buku() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Ambil data postingan dari model
    $posts = ambil_postingan_buku();

    // Nizam
    foreach ($posts as $idx => $p) {
        $post_id = intval($p['post_id']);
        $posts[$idx]['jumlah_like'] = countLikesPost($post_id);

        if (isset($_SESSION['user_id'])) {
            $posts[$idx]['user_has_liked'] = hasLikedPost($post_id, $_SESSION['user_id']);
        } else {
            $posts[$idx]['user_has_liked'] = false;
        }

        $posts[$idx]['jumlah_komentar'] = countKomentarByPost($post_id);
    }
    // Nizam

    // Kirim ke view
    require_once __DIR__ . '/../view/user/filter_buku.php';
}

function tampil_filter_film() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Ambil data postingan dari model
    $posts = ambil_postingan_film();
    // Nizam
    foreach ($posts as $idx => $p) {
        $post_id = intval($p['post_id']);
        $posts[$idx]['jumlah_like'] = countLikesPost($post_id);

        if (isset($_SESSION['user_id'])) {
            $posts[$idx]['user_has_liked'] = hasLikedPost($post_id, $_SESSION['user_id']);
        } else {
            $posts[$idx]['user_has_liked'] = false;
        }

        $posts[$idx]['jumlah_komentar'] = countKomentarByPost($post_id);
    }
    // Nizam

    // Kirim ke view
    require_once __DIR__ . '/../view/user/filter_film.php';
}

function tampil_filter_game() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Ambil data postingan dari model
    $posts = ambil_postingan_game();
    // Nizam
    foreach ($posts as $idx => $p) {
        $post_id = intval($p['post_id']);
        $posts[$idx]['jumlah_like'] = countLikesPost($post_id);

        if (isset($_SESSION['user_id'])) {
            $posts[$idx]['user_has_liked'] = hasLikedPost($post_id, $_SESSION['user_id']);
        } else {
            $posts[$idx]['user_has_liked'] = false;
        }

        $posts[$idx]['jumlah_komentar'] = countKomentarByPost($post_id);
    }
    // Nizam

    // Kirim ke view
    require_once __DIR__ . '/../view/user/filter_game.php';
}

function tampil_filter_lagu() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Ambil data postingan dari model
    $posts = ambil_postingan_lagu();
    // Nizam
    foreach ($posts as $idx => $p) {
        $post_id = intval($p['post_id']);
        $posts[$idx]['jumlah_like'] = countLikesPost($post_id);

        if (isset($_SESSION['user_id'])) {
            $posts[$idx]['user_has_liked'] = hasLikedPost($post_id, $_SESSION['user_id']);
        } else {
            $posts[$idx]['user_has_liked'] = false;
        }

        $posts[$idx]['jumlah_komentar'] = countKomentarByPost($post_id);
    }
    // Nizam

    // Kirim ke view
    require_once __DIR__ . '/../view/user/filter_lagu.php';
}