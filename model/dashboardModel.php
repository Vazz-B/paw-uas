<?php
require_once __DIR__ . '/../config/koneksi.php';

function ambilSemuaPostingan() {
    global $conn;
    
    // Join ke tabel user (pastikan nama tabel user benar, di screenshot terlihat 'user')
    // Sesuaikan nama kolom di tabel post (post_id, judul, gambar, tanggal_post)
    $query = "SELECT post.*, user.nama as nama_user 
              FROM post 
              JOIN user ON post.user_id = user.user_id 
              ORDER BY post.post_id DESC";
              
    $result = mysqli_query($conn, $query);
    
    // Cek error kalau query salah
    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
