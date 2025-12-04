<?php include 'tambah_postingan.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Postingan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: #fff;
        }

        .nav-link {
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
            padding: 10px 20px;
            border-radius: 30px; /* Membuat tombol bulat */
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link:hover {
            background-color: #f1f1f1;
            color: #000;
        }

        .nav-link.active {
            background-color: #000;
            color: #fff;
        }

        /* Feed Styling */
        .feed-container {
            margin-top: 20px;
        }

        .filter-pill {
            background: #fff;
            border: 1px solid #eee;
            color: #555;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            margin-right: 5px;
            transition: 0.2s;
        }
        
        .filter-pill.active {
            background: #000;
            color: #fff;
            border-color: #000;
        }

        .filter-pill:hover {
            background-color: #e9ecef;
            color: #000;
        }

        /* Card Post Styling */
        .post-card {
            border: 1px solid #eee;
            border-radius: 16px;
            background: #fff;
            margin-bottom: 25px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            background-color: #ddd;
        }

        .post-img {
            border-radius: 12px;
            width: 100%;
            margin-top: 15px;
            object-fit: cover;
        }
        
        .category-badge {
            background-color: #f1f3f5;
            color: #555;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="container-fluid">
<div class="row">

    <!-- SIDEBAR -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-0 px-3">
                <h4 class="mb-4 px-2 fw-bold d-flex align-items-center justify-content-center">
                    <img src="logo.png" width="100" height="100" alt="Logo">
                </h4>
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=dashboard">
                            <i class="bi bi-house-door-fill"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#uploadModal">
                            <i class="bi bi-plus-circle"></i> Tambah Postingan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?action=ranking">
                            <i class="bi bi-trophy"></i> Rangking
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person"></i> Profil
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <a class="nav-link text-danger" href="index.php?action=logout">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
   
<!-- CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-white min-vh-100">

    <!-- HEADER -->
    <div class="pt-4">
        <h2 class="fw-bold d-flex align-items-center gap-2">
            <i class="bi bi-trophy-fill text-warning"></i> Peringkat
        </h2>
        <p class="text-muted">Konten dengan like terbanyak</p>
    </div>

    <!-- TAB POSTINGAN / KOMENTAR -->
    <div class="d-flex gap-3 mb-4">
        <a href="index.php?action=ranking&type=post" 
           class="flex-fill text-center fw-semibold py-3 rounded-4 
                <?= ($_GET['type'] ?? 'post') == 'post' ? 'bg-dark text-white' : 'bg-light' ?>">
            <i class="bi bi-file-earmark-text"></i> Postingan
        </a>

        <a href="index.php?action=ranking&type=comment" 
           class="flex-fill text-center fw-semibold py-3 rounded-4 
                <?= ($_GET['type'] ?? '') == 'comment' ? 'bg-dark text-white' : 'bg-light' ?>">
            <i class="bi bi-chat-left-text"></i> Komentar
        </a>
    </div>

    <!-- TAB KECIL KESSELURUHAN / PER SEKOLAH -->
    <div class="d-flex bg-light p-1 rounded-pill mb-4 w-100">
        <a href="index.php?action=ranking&type=post&mode=all" 
           class="flex-fill text-center py-2 rounded-pill fw-semibold
                <?= ($_GET['mode'] ?? 'all') == 'all' ? 'bg-white shadow-sm' : 'text-muted' ?>">
            Keseluruhan
        </a>

        <a href="index.php?action=ranking&type=post&mode=school" 
           class="flex-fill text-center py-2 rounded-pill fw-semibold
                <?= ($_GET['mode'] ?? '') == 'school' ? 'bg-white shadow-sm' : 'text-muted' ?>">
            Per Sekolah
        </a>
    </div>

    <!-- FILTER SEKOLAH JIKA MODE SCHOOL -->
    <?php if(($_GET['mode'] ?? '') == 'school'): ?>
        <form method="GET" class="mb-4">
            <input type="hidden" name="action" value="ranking">
            <input type="hidden" name="type" value="post">
            <input type="hidden" name="mode" value="school">

            <div class="input-group" style="max-width:350px;">
                <input type="text" name="sekolah_id" class="form-control" placeholder="Masukkan ID Sekolah…">
                <button class="btn btn-dark">Cari</button>
            </div>
        </form>
    <?php endif; ?>

    <!-- POST LIST -->
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <?php foreach($posts as $index => $p): ?>

                <?php 
                    // PILIH ICON RANK
                    $rankIcon = "bi-award";
                    if ($index == 0) $rankIcon = "bi-trophy-fill text-warning";
                    else if ($index == 1) $rankIcon = "bi-trophy text-secondary";
                    else if ($index == 2) $rankIcon = "bi-trophy text-brown";
                ?>

                <div class="border rounded-4 p-4 mb-4 shadow-sm">

                    <!-- USER SECTION -->
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi <?= $rankIcon ?> fs-3 me-3"></i>

                        <img src="https://ui-avatars.com/api/?name=<?= $p['nama_user'] ?>&background=random"
                             width="48" class="rounded-circle me-3">

                        <div>
                            <h6 class="fw-bold mb-0"><?= $p['nama_user'] ?></h6>
                            <small class="text-muted">Unknown</small>
                        </div>
                    </div>

                    <!-- KATEGORI -->
                    <div class="mb-2">
                        <span class="badge rounded-pill text-dark bg-light p-2 d-flex align-items-center gap-1" style="width:max-content;">
                            <?php
                                $icon = [
                                    "Film" => "bi-film",
                                    "Buku" => "bi-book",
                                    "Lagu" => "bi-music-note-beamed",
                                    "Game" => "bi-controller"
                                ];
                            ?>
                            <i class="bi <?= $icon[$p['nama_kategori']] ?>"></i>
                            <?= $p['nama_kategori'] ?>
                        </span>
                    </div>

                    <!-- TITLE -->
                    <h5 class="fw-bold"><?= $p['judul'] ?></h5>

                    <!-- CONTENT -->
                    <p class="text-muted"><?= $p['isi'] ?></p>

                    <!-- IMAGE -->
                    <?php if (!empty($p['gambar'])): ?>
                        <img src="uploads/<?= $p['gambar'] ?>" class="img-fluid rounded mb-3">
                    <?php endif; ?>

                    <!-- FOOTER -->
                    <div class="d-flex align-items-center gap-4">
                        <span class="text-danger">
                            <i class="bi bi-heart-fill"></i> <?= $p['total_rating'] ?>
                        </span>

                        <span class="text-muted">
                            <i class="bi bi-chat-left"></i> <?= $p['jumlah_komentar'] ?? 0 ?> komentar
                        </span>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

</main>


</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
