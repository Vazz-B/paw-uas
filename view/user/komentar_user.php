<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Komentar Postingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .btn-like-komen i {
            transition: 0.15s ease;
        }

        .btn-like-komen:hover i {
            transform: scale(1.15);
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <a href="index.php?action=dashboard" class="btn btn-sm btn-light mb-3">&larr; Kembali</a>

        <h4>Komentar</h4>

        <div class="mb-4">
            <form action="index.php?action=simpan_komentar_user" method="POST">
                <input type="hidden" name="post_id" value="<?= htmlspecialchars($post_id) ?>">
                <div class="mb-2">
                    <textarea name="isi" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
                </div>
                <button class="btn btn-dark">Kirim Komentar</button>
            </form>
        </div>

        <div>
            <?php if (empty($komentar)): ?>
                <div class="text-muted">Belum ada komentar.</div>
            <?php else: ?>
                <?php foreach ($komentar as $k): ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body pb-2">

                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong><?= htmlspecialchars($k['nama_user']) ?></strong>
                                    <div class="text-muted small">
                                        <?= date('d M Y, H:i', strtotime($k['tanggal_komen'])) ?>
                                    </div>
                                </div>

                                <!-- TOMBOL LIKE DI KANAN -->
                                <span class="btn-like-komen d-flex align-items-center"
                                    data-komen="<?= $k['komentar_id'] ?>"
                                    style="cursor: pointer;">

                                    <i class="bi <?= $k['user_has_liked'] ? 'bi-heart-fill text-danger' : 'bi-heart' ?> icon-like-komen-<?= $k['komentar_id'] ?> fs-5"></i>

                                    <span class="ms-1 like-komen-count-<?= $k['komentar_id'] ?>"
                                        style="font-size: 14px;">
                                        <?= $k['jumlah_like'] ?>
                                    </span>
                                </span>
                            </div>
                            <p class="mt-2 mb-1"><?= nl2br(htmlspecialchars($k['isi'])) ?></p>
                            <?php if ($_SESSION['user_id'] == $k['user_id']): ?>
                                <a href="index.php?action=edit_komentar_user&komentar_id=<?= $k['komentar_id'] ?>"
                                    class="text-secondary ms-1"
                                    style="font-size: 16px;"
                                    title="Edit komentar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-like-komen').forEach(btn => {
                btn.addEventListener('click', function() {
                    const komentarId = this.dataset.komen;

                    fetch('index.php?action=like_komentar', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'komentar_id=' + komentarId
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (!data) return;

                            const icon = document.querySelector('.icon-like-komen-' + komentarId);
                            const count = document.querySelector('.like-komen-count-' + komentarId);

                            if (data.status === 'liked') {
                                icon.classList.remove('bi-heart');
                                icon.classList.add('bi-heart-fill', 'text-danger');
                            } else {
                                icon.classList.remove('bi-heart-fill', 'text-danger');
                                icon.classList.add('bi-heart');
                            }

                            count.textContent = data.jumlah_like;
                        });
                });
            });
        });
    </script>
</body>

</html>