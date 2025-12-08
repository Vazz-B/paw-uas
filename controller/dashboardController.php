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

function tampilGame() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // kategori Game = 2
    $posts = ambilPostinganByKategori(2);

    require_once __DIR__ . '/../view/user/game.php';
}

function tampilLagu() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // kategori Lagu = 3
    $posts = ambilPostinganByKategori(3);

    require_once __DIR__ . '/../view/user/lagu.php';
}
