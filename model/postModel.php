<?php
require_once __DIR__ . '/../config/koneksi.php';

function simpanPostingan($user_id, $judul, $nama_gambar) {
    global $conn;
    
    // Default Value (Biar gak error karena kolom wajib diisi)
    $kategori_id = 1; // Kita set ID kategori 1 (Misal: Fiksi/Umum)
    $isi_konten  = "-"; // Kita isi dash dulu karena di form upload belum ada input text area isi
    
    // Perhatikan nama tabel diubah jadi 'post' sesuai screenshot kamu
    // Urutan: user_id, kategori_id, judul, isi, gambar
    $sql = "INSERT INTO post (user_id, kategori_id, judul, isi, gambar) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    // "iisss" artinya: integer, integer, string, string, string
    mysqli_stmt_bind_param($stmt, "iisss", $user_id, $kategori_id, $judul, $isi_konten, $nama_gambar);
    
    return mysqli_stmt_execute($stmt);
}


?>


