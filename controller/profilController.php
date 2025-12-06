<?php
require_once __DIR__ . '/../model/profilModel.php';
require_once "./config/cek_role.php";

function tampil_profil(){
    untuk_user();
    session_start();

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
    session_start();

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
    session_start();

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
?>