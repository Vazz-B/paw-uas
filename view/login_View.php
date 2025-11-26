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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at top, #eef1ff, #e6e9f5, #dfe3f0);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            width: 420px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            animation: fadeIn 0.4s ease;
        }

        .title {
            font-weight: 700;
            font-size: 26px;
            margin-bottom: 5px;
            text-align: center;
        }

        .subtitle {
            font-size: 14px;
            color: #777;
            margin-bottom: 25px;
            text-align: center;
        }

        input.form-control {
            height: 48px;
            border-radius: 10px;
        }

        .btn-login {
            height: 48px;
            border-radius: 10px;
            background-color: #050517;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .btn-login:hover {
            opacity: .85;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

</head>
<body>

<div class="login-card">

    <div class="text-center mb-4">
        <img src="logo.png" width="55" class="mb-2">
        <div class="title">Login RevYou</div>
        <div class="subtitle">Masuk untuk mengakses review favoritmu</div>
    </div>

    <form action="index.php?action=proses" method="POST">

        <label class="fw-semibold mb-1">Username</label>
        <input type="text" name="nama" class="form-control mb-3" placeholder="Masukkan username" required>

        <label class="fw-semibold mb-1">Password</label>
        <input type="password" name="password" class="form-control mb-4" placeholder="Masukkan password" required>

        <button type="submit" class="btn btn-login w-100">Login</button>

        <p class="text-center mt-3">
            Belum punya akun?
            <a href="index.php?action=daftar" class="fw-bold">Daftar Sekarang</a>
        </p>
    </form>

</div>

</body>
</html>
