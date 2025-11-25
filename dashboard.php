<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

echo "Selamat datang, " . $_SESSION['username'];
echo "<br><a href='logout.php'>Logout</a>";
