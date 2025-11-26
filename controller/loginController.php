<?php
// loginc
require_once __DIR__ . '/../model/loginModel.php';

function tampilLogin() {
    include __DIR__ . '/../view/login_view.php';
}

function prosesLogin() {
    session_start();

    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $result = cekUser($nama, $password);

    if ($result) {
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['role'] = $result['role'];
        if ($result['role'] == "admin") {
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $nama;
            header("Location: /UAS/paw-uas/view/admin/dashboard_admin.php");
        exit;
        }
        else{
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $nama;
            header("Location: /UAS/paw-uas/view/user/dashboard_user.php");
            exit;
        }
        
    } else {
        echo "<script>alert('nama atau password salah!'); window.location='index.php';</script>";
        exit;
    }
}
