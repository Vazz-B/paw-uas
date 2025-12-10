<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Komentar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container py-4">

    <a href="index.php?action=komentar_user&post_id=<?= $komentar['post_id'] ?>" 
       class="btn btn-light mb-3">&larr; Kembali</a>

    <h4>Edit Komentar</h4>

    <form action="index.php?action=update_komentar_user" method="POST">
        <input type="hidden" name="komentar_id" value="<?= $komentar['komentar_id'] ?>">

        <div class="mb-3">
            <label class="form-label">Isi Komentar</label>
            <textarea name="isi" class="form-control" rows="4" required><?= htmlspecialchars($komentar['isi']) ?></textarea>
        </div>

        <button class="btn btn-dark">Simpan Perubahan</button>
    </form>

</div>
</body>
</html>