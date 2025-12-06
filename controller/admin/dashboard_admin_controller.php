<?php
require_once __DIR__ . '/../../model/admin/dashboard_admin_model.php';

// Nizam
require_once __DIR__ . '/../../model/likePostModel.php';
require_once __DIR__ . '/../../model/komentarUserModel.php';
// Nizam
require_once "./config/cek_role.php";



function tampil_dashboard_admin() {
    untuk_admin();

    $posts = admin_ambil_semua_postingan();

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
    require_once __DIR__ . '/../../view/admin/dashboard_admin.php';
}

function admin_tampil_filter_buku() {
    untuk_admin();

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
    require_once __DIR__ . '/../../view/admin/filter_buku_admin.php';
}

function admin_tampil_filter_film() {
    untuk_admin();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Ambil data postingan dari model
    $posts = admin_ambil_postingan_film();
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
    require_once __DIR__ . '/../../view/admin/filter_film_admin.php';
}


function admin_tampil_filter_game() {
    untuk_admin();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Ambil data postingan dari model
    $posts = admin_ambil_postingan_game();
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
    require_once __DIR__ . '/../../view/admin/filter_game_admin.php';
}


function admin_tampil_filter_lagu() {
    untuk_admin();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Ambil data postingan dari model
    $posts = admin_ambil_postingan_lagu();
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
    require_once __DIR__ . '/../../view/admin/filter_lagu_admin.php';
}