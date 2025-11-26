<?php
session_start();
// Include model biar bisa ambil data feed
require_once '../../model/postModel.php'; 

if (!isset($_SESSION['login'])) {
    header("Location: ../../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1>Selamat datang, <?php echo $_SESSION['nama']; ?></h1>
    <a href="../../logout.php" class="btn btn-danger mb-4">Logout</a>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <h4>Posting Review</h4>
                <form action="../../index.php?action=simpan_post" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <textarea name="judul" class="form-control" placeholder="Tulis caption..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Upload</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <h4>Feed Terbaru</h4>
            
            <?php 
            // Ambil data langsung dari model
            $posts = ambilSemuaPostingan(); 
            
            foreach($posts as $p): 
            ?>
                <div class="card mb-3">
                    <img src="../../uploads/<?= $p['gambar'] ?>" class="card-img-top" style="max-height: 400px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['nama_user'] ?></h5>
                        <p class="card-text"><?= $p['judul'] ?></p>
                        <p class="text-muted"><small><?= $p['tanggal_post'] ?></small></p>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</div>

</body>
</html>