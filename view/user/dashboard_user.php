<?php include 'tambah_postingan.php'; ?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Minimal Review</title>
    
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
        
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-0 px-3">
                <h4 class="mb-4 px-2 fw-bold d-flex align-items-center justify-content-center">
                    <img src="logo.png" width="100" height="100" alt="Logo">
                </h4>
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="bi bi-house-door-fill"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#uploadModal">
                            <i class="bi bi-plus-circle"></i> Tambah Postingan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
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

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-white min-vh-100">
            
            <div class="d-flex align-items-center py-4 border-bottom mb-4 sticky-top bg-white" style="z-index: 90;">
                <a href="#" class="filter-pill active"><i class="bi bi-phone"></i> Semua</a>
                <a href="index.php?action=buku" class="filter-pill"><i class="bi bi-book"></i> Buku</a>
                <a href="#" class="filter-pill"><i class="bi bi-film"></i> Film</a>
                <a href="#" class="filter-pill"><i class="bi bi-controller"></i> Game</a>
                
                <div class="ms-auto d-flex align-items-center">
                    <span class="me-2 text-muted small">Halo, <b><?= $_SESSION['nama'] ?></b></span>
                    <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['nama'] ?>&background=random" class="user-avatar" width="30">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <?php if (empty($posts)): ?>
                        <div class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1"></i>
                            <p>Belum ada postingan.</p>
                        </div>
                    <?php endif; ?>

                    <?php foreach($posts as $p): ?>
                        <div class="post-card">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://ui-avatars.com/api/?name=<?= $p['nama_user'] ?>&background=random" class="user-avatar me-3">
                                <div>
                                    <h6 class="mb-0 fw-bold"><?= $p['nama_user'] ?></h6>
                                    <small class="text-muted"><?= date('d M Y, H:i', strtotime($p['tanggal_post'])) ?></small>
                                </div>
                            </div>

                            <div class="category-badge">
                                <?php
                                    if ($p['nama_kategori'] == "Buku") {
                                        echo '<i class="bi bi-book-fill me-1"></i>' . $p['nama_kategori'];
                                    }
                                    elseif($p['nama_kategori'] == "Film") {
                                        echo '<i class="bi bi-film"></i> ' . $p['nama_kategori'];
                                    }
                                    elseif($p['nama_kategori'] == "Lagu") {
                                        echo '<i class="bi bi-music-note-beamed"></i> ' . $p['nama_kategori'];
                                    }
                                    elseif($p['nama_kategori'] == "Game") {
                                        echo '<i class="bi bi-controller"></i> ' . $p['nama_kategori'];
                                    }
                                ?>

                            </div>

                            <h5 class="fw-bold"><?= $p['judul'] ?></h5>
                            
                            <p class="text-secondary">
                                <?= !empty($p['isi']) ? $p['isi'] : 'Tidak ada deskripsi tambahan untuk review ini.' ?>
                            </p>

                            <?php if (!empty($p['gambar'])): ?>
                                <img src="uploads/<?= $p['gambar'] ?>" class="post-img" alt="Post Image">
                            <?php endif; ?>
                            
                            <div class="mt-3 pt-3 border-top d-flex gap-4 text-muted">
                                <span><i class="bi bi-heart"></i> Suka</span>
                                <span><i class="bi bi-chat"></i> Komentar</span>
                                <span class="ms-auto"><i class="bi bi-share"></i></span>
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