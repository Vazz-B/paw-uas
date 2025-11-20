<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>

<h2>Data User</h2>

<a href="/index.php">Tambah User</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>Sekolah ID</th>
        <th>Aksi</th>
    </tr>

    <?php while ($u = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= $u['user_id'] ?></td>
        <td><?= $u['nama'] ?></td>
        <td><?= $u['email'] ?></td>
        <td><?= $u['password'] ?></td>
        <td><?= $u['role'] ?></td>
        <td><?= $u['sekolah_id'] ?></td>
        <td>
            <a href="index.php?action=edit&user_id=<?= $u['user_id'] ?>">Edit</a> |
            <a href="index.php?action=delete&user_id=<?= $u['user_id'] ?>" onclick="return confirm('Hapus user?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
