<?php
require_once "./koneksi.php";

function getAll() {
    global $conn;
    return mysqli_query($conn, "SELECT * FROM user ORDER BY user_id DESC");
}

function getById($id) {
    global $conn;
    $q = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $id");
    return mysqli_fetch_assoc($q);
}

function insertData($nama, $email, $password, $role, $sekolah_id) {
    global $conn;
    return mysqli_query($conn, "
        INSERT INTO user(nama, email, password, role, sekolah_id)
        VALUES('$nama', '$email', '$password', '$role', '$sekolah_id')
    ");
}

function updateData($id, $nama, $email, $password, $role, $sekolah_id) {
    global $conn;
    return mysqli_query($conn, "
        UPDATE user SET 
            nama='$nama',
            email='$email',
            password='$password',
            role='$role',
            sekolah_id='$sekolah_id'
        WHERE user_id=$id
    ");
}

function deleteData($id) {
    global $conn;
    return mysqli_query($conn, "DELETE FROM user WHERE user_id = $id");
}
