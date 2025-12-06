<?php
require_once "./model/admin/admin_rangking_model.php";
require_once "./config/cek_role.php";



function admin_tampilrangking() {
    untuk_admin();
    
    $type = $_GET['type'] ?? 'postingan';
    $mode = $_GET['mode'] ?? 'all';
    $sekolah_id = $_GET['sekolah_id'] ?? null;

    // --- POSTINGAN ---
    if ($type == 'postingan') {
        if ($mode == "all") {
            $result = admin_rangking_postingan_keseluruhan();
        } else {
            $result = admin_rangking_postingan_persekolah($sekolah_id);
        }
    }

    // --- KOMENTAR ---
    else if ($type == 'komentar') {
        if ($mode == "all") {
            $result = admin_rangking_komentar_keseluruhan();
        } else {
            $result = admin_rangking_komentar_persekolah($sekolah_id);
        }
    }

    $data = [];
    if ($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    include "./view/user/rangking.php";
}



// nama sekolah otomatis
function admin_filter_sekolah() {
    untuk_user();

    $keyword = trim($_GET['keyword'] ?? '');
    header('Content-Type: application/json'); // penting
    echo json_encode(cek_filter_sekolah($keyword));
}


