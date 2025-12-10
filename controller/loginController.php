<?php
// loginc
require_once __DIR__ . '/../model/loginModel.php';

function tampil_login() {
    include __DIR__ . '/../view/login_view.php';
}

function proses_login() {
    session_start();

    $nama = $_POST['nama'];
    $password = $_POST['password'];

    // Ambil data user dari model
    $result = cekUser($nama, $password);

    if ($result) {
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['role'] = $result['role'];

        // Redirect berdasarkan role
        if ($result['role'] == "admin") {
            header("Location: /UAS/paw-uas/index.php?action=dashboard_admin");
        } 
        else {
            header("Location: /UAS/paw-uas/index.php?action=dashboard");
        }
        exit;
    } 
    else {
        echo "<script>alert('Nama atau password salah!'); window.location='index.php?action=login';</script>";
        exit;
    }
}
