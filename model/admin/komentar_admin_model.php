<?php
require_once __DIR__ . '/../../config/koneksi.php';

// Ambil komentar untuk sebuah post (untuk tampilan user)
function admin_ambilKomentarByPost($post_id) {
    global $conn;
    $sql = "SELECT k.komentar_id, k.post_id, k.user_id, k.isi, k.tanggal_komen, k.jumlah_like, u.nama AS nama_user
            FROM komentar k
            JOIN user u ON k.user_id = u.user_id
            WHERE k.post_id = ?
            ORDER BY k.tanggal_komen ASC";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

