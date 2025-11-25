<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
<h2>Daftar User</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>Sekolah ID</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($users)): ?>
    <tr>
        <td><?= $row['user_id'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['password'] ?></td>
        <td><?= $row['role'] ?></td>
        <td><?= $row['sekolah_id'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
