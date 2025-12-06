<?php
require_once __DIR__ . '/../config/koneksi.php';

function ambil_data_user($user_id){
    global $conn;
    
    $sql = "SELECT user.*, sekolah.nama_sekolah FROM user LEFT JOIN sekolah ON user.sekolah_id = sekolah.sekolah_id WHERE user.user_id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function jumlah_postingan($user_id){
    global $conn;

    $sql = "SELECT COUNT(*) AS jumlah FROM post WHERE user_id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $data = mysqli_fetch_assoc($result);
    return $data['jumlah'];
}

function ambil_postingan_user($user_id){
    global $conn;

    $sql = "SELECT * FROM post WHERE user_id = $user_id ORDER BY tanggal_post DESC";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function hapus_post($post_id, $user_id) {
    global $conn;

    // 1. Hapus LIKE KOMENTAR
    $sqlLikeKomentar = "
        DELETE lk FROM like_komentar lk
        INNER JOIN komentar k ON lk.komentar_id = k.komentar_id
        WHERE k.post_id = ?
    ";
    $stmt1 = mysqli_prepare($conn, $sqlLikeKomentar);
    mysqli_stmt_bind_param($stmt1, "i", $post_id);
    mysqli_stmt_execute($stmt1);

    // 2. Hapus KOMENTAR
    $sqlKomentar = "DELETE FROM komentar WHERE post_id = ?";
    $stmt2 = mysqli_prepare($conn, $sqlKomentar);
    mysqli_stmt_bind_param($stmt2, "i", $post_id);
    mysqli_stmt_execute($stmt2);

    // 3. Hapus LIKE POST
    $sqlLikePost = "DELETE FROM like_post WHERE post_id = ?";
    $stmt3 = mysqli_prepare($conn, $sqlLikePost);
    mysqli_stmt_bind_param($stmt3, "i", $post_id);
    mysqli_stmt_execute($stmt3);

    // 4. Hapus RATING
    $sqlRating = "DELETE FROM rating WHERE post_id = ?";
    $stmt4 = mysqli_prepare($conn, $sqlRating);
    mysqli_stmt_bind_param($stmt4, "i", $post_id);
    mysqli_stmt_execute($stmt4);

    // 5. Hapus POSTINGAN
    $sqlPost = "DELETE FROM post WHERE post_id = ? AND user_id = ?";
    $stmt5 = mysqli_prepare($conn, $sqlPost);
    mysqli_stmt_bind_param($stmt5, "ii", $post_id, $user_id);

    return mysqli_stmt_execute($stmt5);
}

function get_post_by_id($post_id) {
    global $conn;
    $sql = "SELECT * FROM post WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $post = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $post;
}

// Fungsi update postingan
function update_post_by_id($post_id, $judul, $isi) {
    global $conn;
    $sql = "UPDATE post SET judul = ?, isi = ? WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $judul, $isi, $post_id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}
?>