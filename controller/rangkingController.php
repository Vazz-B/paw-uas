<?php
require_once __DIR__ . '/../model/rangkingModel.php';

function tampilRanking() {
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // mode ranking
    $mode = $_GET['mode'] ?? 'all';

    if ($mode == "sekolah" && isset($_GET['sekolah_id'])) {
        $posts = ambilRankingPerSekolah($_GET['sekolah_id']);
    } else {
        $posts = ambilRankingKeseluruhan();
    }

    require_once __DIR__ . '/../view/user/rangking.php';
}
