<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
    <link rel="stylesheet" href="../../assets/style_profil_user.css">
    
</head>
<body>
    <div class="header">Profil</div>

    <div class="profil-container">
        
        <div class="kembali">
            <a href="dashboard_user.php">Kembali</a>
        </div>

        <div class="card">
            
            <div class="card-header">
                <div class="foto-profil">
                    <img src="" alt="">
                </div>
                <div class="info">
                    <h2><?= $_SESSION['nama']; ?></h2>
                    <p><?= $_SESSION['nama_sekolah'] ?? 'Default'; ?> • <?= $_SESSION['role']; ?></p>
                </div>
                <a href="../../logout.php" class="logout">Logout</a>
            </div>

            <div class="section-bio">
                <div class="section-title">Bio</div>
                <p></p>
                <span class="edit" id='edit_bio'>Edit</span> 
            </div>
            
        </div>

        <div class="postingan">
            <div class="section-title">Postingan Saya (<?= $_SESSION['jumlah_postingan'] ?? 0;?>)</div>
            <div class="card post"><?= $_SESSION['post_id'] ?? 'Belum ada postingan'; ?>
            </div>
        </div>
    </div>
</body>
</html>