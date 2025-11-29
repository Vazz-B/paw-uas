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

    // Ambil data user dari model
    $result = cekUser($nama, $password);

    if ($result) {
        // Simpan semua data penting ke session
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['sekolah_id'] = $result['sekolah_id'];
        $_SESSION['nama_sekolah'] = $result['nama_sekolah']; 
        $_SESSION['jumlah_postingan'] = $result['user_id']; 

        // Redirect berdasarkan role
        if ($result['role'] == "admin") {
            header("Location: /UAS/paw-uas/view/admin/dashboard_admin.php");
        } else {
            header("Location: /UAS/paw-uas/view/user/dashboard_user.php");
        }
        exit;
    } else {
        echo "<script>alert('Nama atau password salah!'); window.location='index.php?action=login';</script>";
        exit;
    }
}
