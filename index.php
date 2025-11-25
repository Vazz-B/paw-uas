<?php
require_once 'controller/loginController.php';

$action = $_GET['action'] ?? 'login';

if ($action == "login") {
    tampilLogin();
} 
elseif ($action == "proses") {
    prosesLogin();
}
