<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

echo "Selamat datang, Admin " . $_SESSION['nama'];
echo "<br><a href='../../index.php?action=logout'>Logout</a>";
?>

isi seperti dashboard user hanya saja tidak ada profil dan tambah postingan
- bisa menghapus semua postingan dan semua komentar


