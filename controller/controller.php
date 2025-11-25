<?php
require_once __DIR__ . '/../model/user.php';

$users = getAllUser();

require_once __DIR__ . '/../view/user.php';