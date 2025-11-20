<?php
require_once "./Model/user.php";

$action = $_GET['action'] ?? 'list';

// Tampilkan daftar user
if ($action == 'list') {
    $data = getAll();
    include "./View/list.php";
}

// Form tambah
else if ($action == 'add') {
    include "./View/form.php";
}

// Simpan data baru
else if ($action == 'store') {
    insertData($_POST['nama'], $_POST['email'], $_POST['password'], $_POST['role'], $_POST['sekolah_id']);
    header("Location: ./index.php");
}

// Form edit
else if ($action == 'edit') {
    $row = getById($_GET['user_id']);
    include "./view/form.php";
}

// Update
else if ($action == 'update') {
    updateData($_POST['user_id'], $_POST['nama'], $_POST['email'], $_POST['password'], $_POST['role'], $_POST['sekolah_id']);
    header("Location: index.php");
}

// Hapus
else if ($action == 'delete') {
    deleteData($_GET['user_id']);
    header("Location: ./index.php");
}
