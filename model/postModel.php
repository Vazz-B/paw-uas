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
?>


