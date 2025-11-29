<?php
require_once 'controller/loginController.php';
require_once 'controller/logoutController.php';
require_once 'controller/daftarController.php';
require_once 'controller/dashboardController.php';
require_once 'controller/tambahPostinganController.php';

$action = $_GET['action'] ?? 'login';

if ($action == "login") tampilLogin();
elseif ($action == "proses_login") prosesLogin();
elseif ($action == "logout") logout();
elseif ($action == "daftar") tampilDaftar();
elseif ($action == "proses_daftar") prosesDaftar();
elseif ($action == "cari_sekolah") cariSekolahAjax();
elseif ($action == "dashboard") tampilDashboard();
elseif ($action == "simpan_post") prosesSimpanPost();