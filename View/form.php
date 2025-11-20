<!DOCTYPE html>
<html>
<head>
    <title>Form User</title>
</head>
<body>

<h2><?= isset($row) ? "Edit" : "Tambah" ?> User</h2>

<form method="post" action="/index.php?= isset($row) ? 'update' : 'store' ?>">

    <?php if (isset($row)) { ?>
        <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
    <?php } ?>

    Nama : <br>
    <input type="text" name="nama" value="<?= $row['nama'] ?? '' ?>"><br><br>

    Email : <br>
    <input type="email" name="email" value="<?= $row['email'] ?? '' ?>"><br><br>

    Password : <br>
    <input type="text" name="password" value="<?= $row['password'] ?? '' ?>"><br><br>

    Role : <br>
    <input type="text" name="role" value="<?= $row['role'] ?? '' ?>"><br><br>

    Sekolah ID : <br>
    <input type="text" name="sekolah_id" value="<?= $row['sekolah_id'] ?? '' ?>"><br><br>

    <button type="submit">Simpan</button>
    <a href="index.php">Kembali</a>

</form>

</body>
</html>
