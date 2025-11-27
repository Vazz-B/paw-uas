<?php 
// Pastikan $data_buku sudah dikirim dari controller
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>

<div class="container">
    <h2 class="judul">Daftar Review Buku</h2>

    <div class="filter-menu">
        <a href="dashboard_user.php">Semua</a>
        <a href="../../index.php?action=buku" class="active">Buku</a>
        <a href="film.php">Film</a>
        <a href="game.php">Game</a>
    </div>

    <div class="list-post">
        <?php foreach ($posts as $buku): ?>

            <div class="card-post">
                <div class="header-post">
                    
                    <div class="avatar">
                        <?= strtoupper(substr($buku['nama'], 0, 2)) ?>
                    </div>

                    <div class="info">
                        <b><?= $buku['nama'] ?></b><br>
                        <small><?= date("d M Y, H:i", strtotime($buku['tanggal'])) ?></small>
                    </div>

                </div>

                <div class="kategori">
                    <span class="badge">Buku</span>
                </div>

                <h3 class="judul-post"><?= $buku['judul'] ?></h3>
                <p class="isi-post"><?= $buku['isi'] ?></p>

                <div class="aksi">
                    <span>♡ Suka</span>
                    <span>💬 Komentar</span>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (empty($posts)): ?>
            <p>Tidak ada review buku.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
