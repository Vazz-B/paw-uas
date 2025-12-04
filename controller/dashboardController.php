<?php
require_once __DIR__ . '/../model/dashboardModel.php';

function tampilDashboard() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Ambil data postingan dari model
    $posts = ambilSemuaPostingan();

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
    $posts = ambil_potingan_film();

    // Kirim ke view
    require_once __DIR__ . '/../view/user/filter_film.php';
}

