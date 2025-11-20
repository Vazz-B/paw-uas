<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'web_review');

    if($conn) {
        echo "y";
    } else {
        echo "t";
    }
?>