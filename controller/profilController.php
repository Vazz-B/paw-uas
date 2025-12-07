<?php
require_once __DIR__ . '/../model/profilModel.php';
require_once "./config/cek_role.php";

function tampil_profil(){
    untuk_user();

    if (!isset($_SESSION['login'])){
        header('Location: index.php?action=login');
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $data_user = ambil_data_user($user_id);
    $postingan_user = ambil_postingan_user($user_id);
    $jumlah_postingan = jumlah_postingan($user_id);

    $_SESSION['jumlah_postingan'] = $jumlah_postingan;
    $_SESSION['nama_sekolah'] = $data_user['nama_sekolah'];

    include __DIR__ . '/../view/user/profil.php';
}

function edit_bio(){
    untuk_user();

    if (!isset($_SESSION['login'])){
        header('Location: index.php?action=login');
        exit();
    }

    if (isset($_POST['bio'])){
        $_SESSION['bio'] = $_POST['bio'];
    }

    header('Location: index.php?action=tampil_profil');
    exit();

}

function hapus_postingan(){
    untuk_user();

    if (!isset($_SESSION['login'])){
        header('Location: index.php?action=login');
        exit();
    }

    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];

    // Memanggil model untuk menghapus post beserta semua tabel relasi (komentar, like, rating).
    hapus_post($post_id, $user_id);
    header('Location: index.php?action=tampil_profil');
    exit();
}

// Tampilkan form edit post di halaman baru
function tampil_edit_post($post_id) {
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?action=login');
        exit();
    }

    require_once __DIR__ . '/../model/profilModel.php';
    $post = get_post_by_id($post_id);

    // Pastikan hanya pemilik post yang bisa edit
    if (!$post || $post['user_id'] != $_SESSION['user_id']) {
        echo "Anda tidak berhak mengedit postingan ini.";
        exit();
    }

    include __DIR__ . '/../view/user/edit_post.php';
}

// Proses update post
function proses_update_post() {
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?action=login');
        exit();
    }

    $post_id = intval($_POST['post_id'] ?? 0);
    $judul = $_POST['judul'] ?? '';
    $isi = $_POST['isi'] ?? '';

    require_once __DIR__ . '/../model/profilModel.php';
    $post = get_post_by_id($post_id);

    // Pastikan user adalah pemilik
    if (!$post || $post['user_id'] != $_SESSION['user_id']) {
        echo "Anda tidak berhak mengedit postingan ini.";
        exit();
    }

    // Update menggunakan model
    update_post_by_id($post_id, $judul, $isi);

    // Redirect ke profil
    header('Location: index.php?action=tampil_profil');
    exit();
}

?>