<?php
session_start();

if (isset($_SESSION['login'])) {
    if ($_SESSION['role'] == 'admin'){
        header("Location: /UAS/paw-uas/view/admin/dashboard_admin.php");
        exit;
    }
    else {
        header("Location: /UAS/paw-uas/view/user/dashboard_user.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f7f9fc;
        }
        .tab-select {
            border-radius: 30px;
            background: #e7e7ee;
        }
        .tab-select button {
            border: none;
            background: none;
            padding: 10px 40px;
            font-weight: 500;
            border-radius: 25px;
        }
        .tab-active {
            background: white;
            color: black;
            font-weight: 600;
        }
        .login-card {
            border-radius: 15px;
            padding: 30px;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .btn-dark {
            background: #050517;
        }
    </style>

</head>
<body>

<div class="container text-center mt-5">
    
    <!-- Logo Title -->
    <h2 class="fw-bold mb-1">
        <img src="logo.png" style="width:50px; margin-right:5px;">  
        RevYou
    </h2>
    <p class="text-muted mb-4">
        Platform Review Buku, Film, Game & Lagu
    </p>

    <!-- User / Admin Tabs -->

    <!-- Login Card -->
    <div class="col-md-4 mx-auto">
        <div class="login-card text-start">
            <h4 class="fw-semibold mb-3">Login</h4>

            <form action="index.php?action=proses" method="POST">

                <label class="fw-semibold">Username</label>
                <input type="text" name="nama" class="form-control mb-3" placeholder="username" required>

                <label class="fw-semibold">Password</label>
                <input type="password" name="password" class="form-control mb-4" required>

                <button type="submit" class="btn btn-dark w-100 mb-3">Login</button>

                <p class="text-center">
                    Belum punya akun?
                    <a href="index.php?action=daftar" class="fw-semibold">Daftar</a>
                </p>
            </form>
        </div>
    </div>

</div>

</body>
</html>