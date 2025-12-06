<?php

function untuk_user() {
    session_start();
    if (!isset($_SESSION['login']) || $_SESSION['role'] != 'user') {
        header("Location: index.php?action=forbidden");
        exit;
    }
}

function untuk_admin() {
    session_start();
    if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
        header("Location: index.php?action=forbidden");
        exit;
    }
}
