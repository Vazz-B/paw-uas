<?php
require_once "./model/rangkingModel.php";

function tampilrangking() {
    $type = $_GET['type'] ?? 'post';
    $mode = $_GET['mode'] ?? 'all';
    $sekolah_id = $_GET['sekolah_id'] ?? null;

    // --- POSTINGAN ---
    if ($type == 'post') {
        if ($mode == "all") {
            $result = getTopPostAll();
        } else {
            $result = getTopPostBySekolah($sekolah_id);
        }
    }

    // --- KOMENTAR ---
    else if ($type == 'comment') {
        if ($mode == "all") {
            $result = getTopCommentAll();
        } else {
            $result = getTopCommentBySekolah($sekolah_id);
        }
    }

    $posts = [];
    if ($result) {
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    include "./view/user/rangking.php";
}
