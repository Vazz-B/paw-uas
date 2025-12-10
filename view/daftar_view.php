<!DOCTYPE html>
<html>
<head>
    <title>Register Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: white;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .register-card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            width: 420px;
            box-shadow: 0 25px 70px rgba(0,0,0,0.18);
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

        .btn-daftar {
            height: 48px;
            border-radius: 10px;
            background-color: #050517;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .btn-daftar:hover {
            opacity: .85;
        }

        .suggestion-box {
            position: absolute;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            margin-top: 2px;
            z-index: 1000;
            max-height: 180px;
            overflow-y: auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        .suggestion-item {
            padding: 8px 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background: #f1f1f1;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

<div class="register-card">
    
    <div class="text-center mb-4">
        <img src="logo.png" width="55" class="mb-2">
        <div class="title">Create a Revyou Account</div>
        <div class="subtitle">Log in to access your favorite reviews</div>
    </div>

    <form action="index.php?action=proses_daftar" method="POST">

        <label class="fw-semibold mb-1">Username</label>
        <input type="text" name="nama" class="form-control mb-3" placeholder="username" required>

        <label class="fw-semibold mb-1">Email</label>
        <input type="email" name="email" class="form-control mb-3" placeholder="email" required>

        <label class="fw-semibold mb-1">Password</label>
        <input type="password" name="password" class="form-control mb-3" placeholder="password" required>

        <label class="fw-semibold mb-1">School</label>
        <div style="position:relative;">
            <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control" placeholder="Type the name of your school..." required autocomplete="off">
            <div id="suggestions" class="suggestion-box"></div>
        </div>

        <button class="btn btn-daftar w-100 mt-4">Register now</button>

        <p class="text-center mt-3">
            Already have an account?
            <a href="index.php?action=login" class="fw-bold">Login here</a>
        </p>

    </form>
</div>


<script>
// AJAX autocomplete
document.getElementById("asal_sekolah").addEventListener("keyup", function () {
    let keyword = this.value;

    if (keyword.length < 2) {
        document.getElementById("suggestions").innerHTML = "";
        return;
    }

    fetch("index.php?action=cari_sekolah&keyword=" + keyword)
        .then(response => response.json())
        .then(data => {
            let box = document.getElementById("suggestions");
            box.innerHTML = "";

            if (data.length === 0) return;

            data.forEach(item => {
                let div = document.createElement("div");
                div.classList.add("suggestion-item");
                div.textContent = item.nama_sekolah;

                div.onclick = function () {
                    document.getElementById("asal_sekolah").value = item.nama_sekolah;
                    box.innerHTML = "";
                };

                box.appendChild(div);
            });
        });
});
</script>

</body>
</html>
