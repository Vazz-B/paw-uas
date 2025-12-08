<?php
require_once 'config/koneksi.php';
require_once 'model/profilModel.php';

if (!isset($_SESSION['login'])) {
    header('Location: index.php?action=login');
    exit();
}

$post_id = intval($_GET['post_id'] ?? 0);
$post = get_post_by_id($post_id);

// hanya pemilik yang bisa edit
if (!$post || $post['user_id'] != $_SESSION['user_id']) {
    echo "Anda tidak berhak mengedit postingan ini.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Post</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #F2F1EF;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding-top: 50px;
}

.container {
    margin-top: 10px;
    max-width: 600px;
    width: 100%;
    background-color: #D8CFD0;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    color: #413F3D;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    color: #413F3D;
    display: block;
    margin-bottom: 6px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #B1A6A4;
    margin-bottom: 15px;
    font-size: 14px;
    color: #413F3D;
    background-color: #F2F1EF;
}

button.save {
    background-color: #697184;
    color: #F2F1EF;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
}

a.cancel {
    background-color: #B1A6A4;
    color: #413F3D;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    margin-left: 10px;
    font-weight: bold;
}
</style>

</style>
</head>
<body>

<div class="container">
<h2>Edit Post</h2>
<form action="index.php?action=update_post" method="POST">
    <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
    <label>Judul:</label>
    <input type="text" name="judul" value="<?= htmlspecialchars($post['judul']) ?>" required>
    
    <label>Isi:</label>
    <textarea name="isi" rows="6" required><?= htmlspecialchars($post['isi']) ?></textarea>
    
    <div class="d-flex justify-content-end">
        <button type="submit" class="save">Simpan Perubahan</button>
        <a href="index.php?action=tampil_profil" class="cancel btn">Batal</a>
    </div>
</form>
</div>

</body>
</html>