<?php
require_once __DIR__ . '/../config/koneksi.php';

function simpanPostingan($user_id, $kategori_id, $judul, $isi, $nama_gambar) {
    global $conn;
    
    $sql = "INSERT INTO post (user_id, kategori_id, judul, isi, gambar) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    mysqli_stmt_bind_param($stmt, "iisss", $user_id, $kategori_id, $judul, $isi, $nama_gambar);
    
    return mysqli_stmt_execute($stmt);
}


?>


