<?php

// require_once __DIR__ . '/../../controller/profilController.php';


$user_id = $_SESSION['user_id'];  // Ambil user_id dari session
$data_user = $_SESSION;  // Ambil data dari session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
    <style>
        /* Styling CSS yang sudah ada */
        body {
            font-family: Arial, sans-serif; 
            background-color: #f7f7f7;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            width: 100%;
            padding: 15px 20px;
            font-weight: bold;
            color: white;
            background-color: #413F3D;
            box-sizing: border-box; 
            text-align: center;
            font-size: 30px;
            position: fixed;
        }
        .profil-container {
            width: 80%;
            padding: 0 20px;
            margin-top: 60px;     /* jarak dari header tetap */
            max-height: 680px;     /* scroll container */
            overflow-y: auto;

        }
        .kembali {
            margin-bottom: 20px;
            margin-top: 20px;
            padding-left: 20px;
        }
        a {
            text-decoration: none;
            color: #555;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin: 20px;
        }
        .card-header {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }
        .foto-profil img {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            margin-right: 15px;
            background-color: #ccc; 
        }
        .info {
            flex-grow: 1;
        }
        .info h2 {
            margin: 0 0 4px 0;
            font-size: 20px;
        }
        .info p {
            margin: 0;
            color: #777;
            font-size: 15px;
        }
        .logout {
            background-color: transparent;
            border: 1px solid #ccc;
            color: #555;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .section-bio {
            padding: 20px;
            position: relative;
        }
        .section-title {
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }
        #bio_user {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-top: 10px;
            font-size: 14px;
            resize: none;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .postingan {
            padding: 0 20px;
        }
        .postingan .section-title {
            color: #555;
            margin-bottom: 10px;
        }
        .post {
            text-align: center;
            padding: 40px 20px;
            color: #777;
            background-color: #fff;
        }
        .postingan-list {
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .post-card {
            display: flex;
            align-items: center;
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .post-thumbnail {
            width: 65px; 
            height: 65px;
            border-radius: 6px;
            object-fit: cover;
            margin-right: 12px;
            background: #eee;
        }

        .post-info {
            flex-grow: 1;
        }

        .post-info h3 {
            font-size: 15px;
            margin: 0 0 5px;
            color: #333;
        }

        .post-info p {
            margin: 0;
            font-size: 13px;
            color: #666;
        }

        .btn-hapus {
            background: #ff4a4a;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-hapus:hover {
            background: #d93636;
        }

        /* Tombol Edit kuning native */
        .btn-edit {
            background-color: #ffeb3b; /* kuning */
            color: #333;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            margin-left: 8px; /* jarak dengan tombol Delete */
            display: inline-block;
        }

        .btn-edit:hover {
            background-color: #fdd835; /* hover lebih terang */
        }

    </style>
</head>
<body>
    <div class="header">Profile</div>

    <div class="profil-container">
        
        <div class="kembali">
            <a href="index.php?action=dashboard">Back</a>
        </div>

        <div class="card">
            
            <div class="card-header">
                <div class="foto-profil">
                    <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['nama'] ?>" alt="Profil Picture">
                </div>
                <div class="info">
                    <h2><?= $_SESSION['nama']; ?></h2>
                    <p><?= $_SESSION['nama_sekolah'] ?? 'Default'; ?> • <?= $_SESSION['role']; ?></p>
                </div>
                <a href="index.php?action=logout" class="logout">Logout</a>
            </div>

            <div class="section-bio">
                <div class="section-title">Bio</div>
                <!-- Menampilkan bio langsung dari session -->
                <form action="index.php?action=edit_bio" method="POST">
                    <textarea name="bio"><?= htmlspecialchars($_SESSION['bio'] ?? 'No biography available.'); ?></textarea>
                    <button type="submit">Update Bio</button>
                </form>
            </div>
            
        </div>

        <div class="postingan">
            <div class="section-title">My Post (<?= $_SESSION['jumlah_postingan'] ?? 0; ?>)</div>

            <div class="postingan-list">

            <?php if (!empty($postingan_user)): ?>
                <?php foreach ($postingan_user as $post): ?>
                    <div class="post-card">

                        <!-- Thumbnail gambar -->
                        <img src="uploads/<?= $post['gambar']; ?>" class="post-thumbnail" alt="image">

                        <!-- Info postingan -->
                        <div class="post-info">
                            <h3><?= htmlspecialchars($post['judul']); ?></h3>
                            <p style="text-align: justify;"><?= htmlspecialchars($post['isi']); ?></p>
                        </div>

                        <!-- Tombol Hapus -->
                        <form action="index.php?action=hapus_postingan" 
                            method="POST" 
                            style="margin-left:10px;">
                            <input type="hidden" name="post_id" value="<?= $post['post_id']; ?>">
                            <button class="btn-hapus" onclick="return confirm('Hapus postingan ini?')">
                                Delete
                            </button>
                        </form>

                        <?php if ($post['user_id'] == $_SESSION['user_id']): ?>
                            <a href="index.php?action=edit_post&post_id=<?= $post['post_id'] ?>" class="btn-edit">
                                Edit
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <p style="text-align:center; color:#777;">No postings available.</p>
            <?php endif; ?>

            </div>
        </div>
    </div>
</body>
</html>