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

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            background-color: #fff;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .nav-link {
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
            padding: 10px 20px;
            border-radius: 30px;
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

        .post-img {
            border-radius: 12px;
            width: 100%;
            margin-top: 10px;
            max-height: 400px;
            object-fit: contain;
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
                            <i class="bi bi-plus-circle"></i> Create Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?action=ranking">
                            <i class="bi bi-trophy"></i> Rank
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=tampil_profil">
                            <i class="bi bi-person"></i> Profil
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-danger" href="index.php?action=logout">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>


<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-white min-vh-100">

    <!-- HEADER -->
    <div class="pt-4">
        <h2 class="fw-bold d-flex align-items-center gap-2">
            <i class="bi bi-trophy-fill text-warning"></i> Rank
        </h2>
        <p class="text-muted">Content with the most likes</p>
    </div>

    <?php 
        $type = $_GET['type'] ?? 'post';
        $mode = $_GET['mode'] ?? 'all';
    ?>

    <!-- TAB BESAR: POSTINGAN / KOMENTAR -->
    <div class="d-flex gap-3 mb-4">
        <a href="index.php?action=ranking&type=post&mode=<?= $mode ?>"
            class="flex-fill text-center fw-semibold py-3 rounded-4 
            <?= $type == 'post' ? 'bg-dark text-white' : 'bg-light' ?>">
            <i class="bi bi-file-earmark-text"></i> Postingan
        </a>

        <a href="index.php?action=ranking&type=comment&mode=<?= $mode ?>"
            class="flex-fill text-center fw-semibold py-3 rounded-4 
            <?= $type == 'comment' ? 'bg-dark text-white' : 'bg-light' ?>">
            <i class="bi bi-chat-left-text"></i> Komentar
        </a>
    </div>

    <!-- TAB KECIL: KESSELURUHAN / PER SEKOLAH -->
    <div class="d-flex bg-light p-1 rounded-pill mb-4 w-100">
        <a href="index.php?action=ranking&type=<?= $type ?>&mode=all"
            class="flex-fill text-center py-2 rounded-pill fw-semibold
            <?= $mode == 'all' ? 'bg-white shadow-sm' : 'text-muted' ?>">
            Keseluruhan
        </a>

        <a href="index.php?action=ranking&type=<?= $type ?>&mode=school"
            class="flex-fill text-center py-2 rounded-pill fw-semibold
            <?= $mode == 'school' ? 'bg-white shadow-sm' : 'text-muted' ?>">
            Per Sekolah
        </a>
    </div>

    <!-- FILTER PER SEKOLAH -->
    <?php if($mode == 'school'): ?>
        <form method="GET" class="mb-4">
            <input type="hidden" name="action" value="ranking">
            <input type="hidden" name="type" value="<?= $type ?>">
            <input type="hidden" name="mode" value="school">

            <div class="input-group" style="max-width:350px;">
                <input type="text" name="sekolah_id" class="form-control" placeholder="Masukkan ID Sekolah…">
                <button class="btn btn-dark">Cari</button>
            </div>
        </form>
    <?php endif; ?>


    <!-- LIST RANKING -->
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <?php foreach($posts as $index => $p): ?>

                <?php 
                    $rankIcon = "bi-award";
                    if ($index == 0) $rankIcon = "bi-trophy-fill text-warning";
                    elseif ($index == 1) $rankIcon = "bi-trophy text-secondary";
                    elseif ($index == 2) $rankIcon = "bi-trophy text-brown";
                ?>

                <div class="border rounded-4 p-4 mb-4 shadow-sm">

                    <!-- USER -->
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi <?= $rankIcon ?> fs-3 me-3"></i>

                        <img src="https://ui-avatars.com/api/?name=<?= $p['nama_user'] ?>&background=random"
                             width="48" class="rounded-circle me-3">

                        <div>
                            <h6 class="fw-bold mb-0"><?= $p['nama_user'] ?></h6>   
                            <small class="text-muted">
                                <?php
                                    if ($type == 'post') {
                                        $tanggal = $p['tanggal_post'];
                                    } else {
                                        $tanggal = $p['tanggal_komen'];
                                    }
                                
                                    echo date('d M Y, H:i', strtotime($tanggal));
                                ?>
                            </small>
                        </div>

                    </div>

                    <?php if ($type == 'post'): ?>
                        <!-- KATEGORI -->
                        <div class="category-badge">
                            <?php
                                if ($p['nama_kategori'] == "Buku") {
                                    echo '<i class="bi bi-book-fill me-1"></i>' . "Book";
                                }
                                elseif($p['nama_kategori'] == "Film") {
                                    echo '<i class="bi bi-film"></i> ' . "Movie";
                                }
                                elseif($p['nama_kategori'] == "Lagu") {
                                    echo '<i class="bi bi-music-note-beamed"></i> ' . "Music";
                                }
                                elseif($p['nama_kategori'] == "Game") {
                                    echo '<i class="bi bi-controller"></i> ' . "Game";
                                }
                            ?>
                        </div>

                        <!-- JUDUL -->
                        <h5 class="fw-bold"><?= $p['judul'] ?></h5>

                        <!-- ISI -->
                        <p class="text-muted"><?= $p['isi'] ?></p>

                        <!-- GAMBAR -->
                        <?php if (!empty($p['gambar'])): ?>
                            <img src="uploads/<?= $p['gambar'] ?>" class="post-img" alt="Post Image">
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($type == 'comment'): ?>
                        <!-- ISI KOMENTAR -->
                        <div class="bg-light p-3 rounded mb-3">
                            <p class="mb-0"><?= $p['isi'] ?></p>
                        </div>
                    <?php endif; ?>


                    <!-- FOOTER -->
                    <div class="d-flex align-items-center gap-4">
                        <span class="text-danger">
                            <i class="bi bi-heart-fill"></i> <?= $p['jumlah_like'] ?>
                        </span>

                        <?php if ($type == 'post'): ?>
                        <span class="text-muted">
                            <i class="bi bi-chat-left"></i> <?= $p['jumlah_komentar'] ?> komentar
                        </span>
                        <?php endif; ?>
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
