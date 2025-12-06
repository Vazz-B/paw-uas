<?php
require_once "./model/rangkingModel.php";

function tampilrangking() {
    $type = $_GET['type'] ?? 'postingan';
    $mode = $_GET['mode'] ?? 'all';
    $sekolah_id = $_GET['sekolah_id'] ?? null;

    // --- POSTINGAN ---
    if ($type == 'postingan') {
        if ($mode == "all") {
            $result = rangking_postingan_keseluruhan();
        } else {
            $result = rangking_postingan_persekolah($sekolah_id);
        }
    }

    // --- KOMENTAR ---
    else if ($type == 'komentar') {
        if ($mode == "all") {
            $result = rangking_komentar_keseluruhan();
        } else {
            $result = rangking_komentar_persekolah($sekolah_id);
        }
    }

    $data = [];
    if ($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    include "./view/user/rangking.php";
}



// nama sekolah otomatis
function filter_sekolah() {
    $keyword = trim($_GET['keyword'] ?? '');
    header('Content-Type: application/json'); // penting
    echo json_encode(sekolah($keyword));
}


