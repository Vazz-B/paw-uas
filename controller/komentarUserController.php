<?php
require_once __DIR__ . '/../model/komentarUserModel.php';

function tampilKomentarUser() {
    // tampilkan halaman komentar untuk user — menampilkan komentar + form
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

    $komentar = ambilKomentarByPost($post_id);

    // Logika Like Komentar
    foreach ($komentar as $idx => $k) {
        $komentar_id = intval($k['komentar_id']);

        $komentar[$idx]['jumlah_like'] = countLikesKomentar($komentar_id);

        if (isset($_SESSION['user_id'])) {
            $komentar[$idx]['user_has_liked'] =
                hasLikedKomentar($komentar_id, $_SESSION['user_id']);
        } else {
            $komentar[$idx]['user_has_liked'] = false;
        }
    }

    // view di user/komentar_user.php
    require_once __DIR__ . '/../view/user/komentar_user.php';
}

function simpanKomentarUser() {
    session_start();
    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $post_id = intval($_POST['post_id'] ?? 0);
    $user_id = intval($_SESSION['user_id'] ?? 0);
    $isi = trim($_POST['isi'] ?? '');

    if ($post_id <= 0 || $user_id <= 0 || $isi === '') {
        echo "<script>alert('Data komentar tidak lengkap.'); window.history.back();</script>";
        exit;
    }

    $hasil = tambahKomentar($post_id, $user_id, $isi);

    if ($hasil) {
        header("Location: index.php?action=komentar_user&post_id=" . $post_id);
        exit;
    } else {
        echo "<script>alert('Gagal menyimpan komentar.'); window.history.back();</script>";
        exit;
    }
}