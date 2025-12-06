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
elseif ($action == "hapus_postingan") hapus_postingan();
elseif ($action == "filter_buku") tampil_filter_buku();
elseif ($action == "filter_film") tampil_filter_film();
elseif ($action == "simpan_post") prosesSimpanPost();
elseif ($action == "komentar_user") tampilKomentarUser();
elseif ($action == "simpan_komentar_user") simpanKomentarUser();
elseif ($action == "like_post") likePostAction();
elseif ($action == "like_komentar") likeKomentarAction();
elseif ($action == "rangking") tampilrangking();
elseif ($action == "filter_sekolah") filter_sekolah();

