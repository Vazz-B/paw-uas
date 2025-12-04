<?php
require_once 'controller/loginController.php';
require_once 'controller/logoutController.php';
require_once 'controller/daftarController.php';
require_once 'controller/dashboardController.php';
require_once 'controller/tambahPostinganController.php';

require_once 'controller/profilController.php';

require_once 'controller/rangkingController.php';


$action = $_GET['action'] ?? 'login';

if ($action == "login") tampilLogin();
elseif ($action == "proses_login") prosesLogin();
elseif ($action == "logout") logout();
elseif ($action == "daftar") tampilDaftar();
elseif ($action == "proses_daftar") prosesDaftar();
elseif ($action == "cari_sekolah") cariSekolahAjax();
elseif ($action == "dashboard") tampilDashboard();
elseif ($action == "tampil_profil") tampil_profil();
elseif ($action == "edit_bio") edit_bio();
elseif ($action == "hapus_postingan") hapus_postingan();
elseif ($action == "filter_buku") tampil_filter_buku();
elseif ($action == "filter_film") tampil_filter_film();
elseif ($action == "simpan_post") prosesSimpanPost();
elseif ($action == "ranking") tampilRanking();
