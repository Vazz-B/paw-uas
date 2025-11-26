<?php

require_once __DIR__ . "/../tpp/conn.php";

class dashboardModel {

    private $db;

    public function __construct() {
        global $conn;
        $this->db = $conn;
    }

    // Ambil postingan dari database
    public function getPosts() {
        $sql = "SELECT 
                    p.*, 
                    u.nama AS username,
                    k.nama_kategori AS kategori
                FROM post p
                JOIN user u ON p.user_id = u.id
                JOIN kategori k ON p.kategori_id = k.kategori_id
                WHERE p.deleted_by IS NULL
                ORDER BY p.tanggal_post DESC";

        return mysqli_query($this->db, $sql);
    }
}
