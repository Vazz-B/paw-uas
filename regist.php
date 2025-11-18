<?php 
    if(isset($_POST['regist'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="" method="post" name="regist">
        <label>nama : </label>
        <input type="text" name="nama">

        <label>email : </label>
        <input type="text" name="email">

    </form>
</body>
</html>