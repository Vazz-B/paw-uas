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

function jumlah_postingan(){
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
?>