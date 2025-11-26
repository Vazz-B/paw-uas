<?php
session_start();
session_destroy();
header("Location: /UAS/paw-uas/index.php");
exit;
