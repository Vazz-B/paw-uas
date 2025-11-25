<?php
require_once __DIR__ . '/../model/userModel.php';

$users = getAllUser();

require_once __DIR__ . '/../view/user.php';



// login
require_once __DIR__ . '/../model/userModel.php';

function tampilLogin() {
    include __DIR__ . '/../view/login_view.php';
}

function prosesLogin() {
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = cekUser($username, $password);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Username atau password salah!'); window.location='index.php';</script>";
        exit;
    }
}
