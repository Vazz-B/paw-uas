<?php
require_once __DIR__ . '/../model/bukuModel.php';

function tampilBuku() {
    $posts = getBuku(); 
    include __DIR__ . '/../view/user/buku.php';
}
