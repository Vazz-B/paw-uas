<?php
require_once 'controller/loginController.php';
require_once 'controller/logoutController.php';
require_once 'controller/daftarController.php';
require_once 'controller/dashboardController.php';
require_once 'controller/tambahPostinganController.php';
require_once 'controller/profilController.php';
require_once 'controller/rangkingController.php';
require_once 'controller/likeKomentarController.php';
require_once 'controller/komentarUserController.php';
require_once 'controller/likePostController.php';

// akses admin
require_once './controller/admin/dashboard_admin_controller.php';
require_once './controller/admin/admin_hapus_postingan_controller.php';
require_once './controller/admin/komentar_admin_controller.php';
require_once './controller/admin/admin_rangking_controller.php';
require_once './controller/admin/admin_hapus_komentar_controller.php';

$action = $_GET['action'] ?? 'login';

if ($action == "login") tampil_login();
elseif ($action == "proses_login") proses_login();
elseif ($action == "logout") logout();
elseif ($action == "daftar") tampil_daftar();
elseif ($action == "proses_daftar") proses_daftar();
elseif ($action == "cari_sekolah") cari_Sekolah();
elseif ($action == "dashboard") tampil_dashboard();
elseif ($action == "tampil_profil") tampil_profil();
elseif ($action == "edit_bio") edit_bio();
elseif ($action == "edit_post") tampil_edit_post($_GET['post_id']);
elseif ($action == "update_post") proses_update_post();
elseif ($action == "hapus_postingan") hapus_postingan();
elseif ($action == "filter_buku") tampil_filter_buku();
elseif ($action == "filter_film") tampil_filter_film();
elseif ($action == "filter_game") tampil_filter_game();
elseif ($action == "filter_lagu") tampil_filter_lagu();
elseif ($action == "simpan_post") prosesSimpanPost();
elseif ($action == "komentar_user") tampilKomentarUser();
elseif ($action == "simpan_komentar_user") simpanKomentarUser();
elseif ($action == "like_post") likePostAction();
elseif ($action == "like_komentar") likeKomentarAction();
elseif ($action == "rangking") tampilrangking();
elseif ($action == "filter_sekolah") filter_sekolah();


elseif ($action == "forbidden") include "./view/warning.php";



// akses admin
elseif ($action == "dashboard_admin") tampil_dashboard_admin();
elseif ($action == "filter_buku_admin") admin_tampil_filter_buku();
elseif ($action == "filter_film_admin") admin_tampil_filter_film();
elseif ($action == "filter_game_admin") admin_tampil_filter_game();
elseif ($action == "filter_lagu_admin") admin_tampil_filter_lagu();
elseif ($action == "admin_hapus_post") admin_hapus_post();
elseif ($action == "komentar_admin") tampil_komentar_admin();
elseif ($action == "admin_hapus_komentar") admin_hapus_komentar_controller();
elseif ($action == "admin_rangking") admin_tampilrangking();
elseif ($action == "admin_filter_sekolah") filter_sekolah();

