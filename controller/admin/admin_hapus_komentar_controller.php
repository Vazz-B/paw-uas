<?php
require_once __DIR__ . '/../../model/admin/admin_hapus_komentar_model.php';

function admin_hapus_komentar_controller() {

    if (!isset($_GET['komentar_id'])) {
        echo "ID komentar tidak ditemukan!";
        exit;
    }

    $komentar_id = $_GET['komentar_id'];
    $hapus = admin_hapus_komentar($komentar_id);

    if ($hapus) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Gagal menghapus komentar!";
    }
}
