<?php
require_once __DIR__ . '/../../model/admin/admin_hapus_postingan_model.php';
require_once "./config/cek_role.php";

function admin_hapus_post() {
    untuk_admin();
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    if (!isset($_POST['post_id'])) {
        header("Location: index.php?action=dashboard_admin");
        exit;
    }

    $post_id = intval($_POST['post_id']);

    if (admin_hapus_postingan($post_id)) {
        $_SESSION['msg'] = "Postingan berhasil dihapus.";
    } else {
        $_SESSION['msg'] = "Gagal menghapus postingan.";
    }
    
    header("Location: index.php?action=dashboard_admin");
    exit;
}
