<?php
require_once 'controller/loginController.php';
require_once 'controller/daftarController.php';
require_once 'controller/dashboardController.php';
require_once 'controller/postController.php';

$action = $_GET['action'] ?? 'login';

if ($action == "login") tampilLogin();
elseif ($action == "proses") prosesLogin();
elseif ($action == "daftar") tampilDaftar();
elseif ($action == "proses_daftar") prosesDaftar();
elseif ($action == "cari_sekolah") cariSekolahAjax();
elseif ($action == "simpan_post") prosesSimpanPost();