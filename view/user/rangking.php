<?php include 'tambah_postingan.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Postingan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            background-color: #fff;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .nav-link {
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
            padding: 10px 20px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link:hover {
            background-color: #f1f1f1;
            color: #000;
        }

        .nav-link.active {
            background-color: #000;
            color: #fff;
        }

        .post-img {
            border-radius: 12px;
            width: 100%;
            margin-top: 10px;
            max-height: 400px;
            object-fit: contain;
        }

        

    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        
        <!-- SIDEBAR -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-0 px-3">
                <h4 class="mb-4 px-2 fw-bold d-flex align-items-center justify-content-center">
                    <img src="logo.png" width="100" height="100" alt="Logo">
                </h4>    

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=dashboard">
                            <i class="bi bi-house-door-fill"></i> Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#uploadModal">
                            <i class="bi bi-plus-circle"></i> Create Post
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?action=rangking">
                            <i class="bi bi-trophy"></i> Rank
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=tampil_profil">
                            <i class="bi bi-person"></i> Profile
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link text-danger" href="index.php?action=logout">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
        
        <!-- MAIN CONTENT -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-white min-vh-100">

            <!-- HEADER -->
            <div class="pt-4">
                <h2 class="fw-bold d-flex align-items-center gap-2">
                    <i class="bi bi-trophy-fill text-warning"></i> Rank
                </h2>
                <p class="text-muted">Content with the most likes</p>
            </div>

            <!-- TAB Postingan & Komentar -->
            <?php 
                $type = $_GET['type'] ?? 'postingan';
                $mode = $_GET['mode'] ?? 'all';
            ?>

            <div class="d-flex gap-3 mb-4">
                <a href="index.php?action=rangking&type=postingan&mode=<?= $mode ?>"
                    class="flex-fill text-center fw-semibold py-3 rounded-4 
                    <?= $type == 'postingan' ? 'bg-dark text-white' : 'bg-light' ?>">
                    <i class="bi bi-file-earmark-text"></i> Rank Post
                </a>

                <a href="index.php?action=rangking&type=komentar&mode=<?= $mode ?>"
                    class="flex-fill text-center fw-semibold py-3 rounded-4 
                    <?= $type == 'komentar' ? 'bg-dark text-white' : 'bg-light' ?>">
                    <i class="bi bi-chat-left-text"></i> Rank Comment
                </a>
            </div>

            <!-- TAB All & Sekolah -->
            <div class="d-flex bg-light p-1 rounded-pill mb-4 w-100">
                <a href="index.php?action=rangking&type=<?= $type ?>&mode=all"
                    class="flex-fill text-center py-2 rounded-pill fw-semibold
                    <?= $mode == 'all' ? 'bg-white shadow-sm' : 'text-muted' ?>">
                    All
                </a>

                <a href="index.php?action=rangking&type=<?= $type ?>&mode=filter_sekolah"
                    class="flex-fill text-center py-2 rounded-pill fw-semibold
                    <?= $mode == 'filter_sekolah' ? 'bg-white shadow-sm' : 'text-muted' ?>">
                    In School
                </a>
            </div>

            <!-- FILTER PER SEKOLAH -->
            <?php if($mode == 'filter_sekolah'): ?>
                <form action="index.php?action=rangking" method="GET">
            
                    <input type="hidden" name="action" value="rangking">
                    <input type="hidden" name="type" value="<?= $type ?>">
                    <input type="hidden" name="mode" value="filter_sekolah">

                    <div class="input-group" style="max-width: 400px;">
                    <input type="text" id="asal_sekolah" class="form-control" placeholder="enter the school name..." autocomplete="off">

                    <input type="hidden" name="sekolah_id" id="sekolah_id">

                    <button class="btn btn-dark">Search</button>
                    </div>

                    <div id="suggestions" class="border bg-white w-100 rounded position-absolute"></div>
                </form>
            
            <?php endif; ?>
            
            <!-- LIST RANKING -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <?php foreach($data as $index => $key):  
                        $rankIcon = "bi-award";
                        if ($index == 0) $rankIcon = "bi-trophy-fill text-warning";
                        elseif ($index == 1) $rankIcon = "bi-trophy text-secondary";
                        elseif ($index == 2) $rankIcon = "bi-trophy text-brown";
                    ?>
                        <div class="border rounded-4 p-4 mb-4 shadow-sm">
                            
                            <!-- USER -->
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi <?= $rankIcon ?> fs-3 me-3"></i>
                                <img src="https://ui-avatars.com/api/?name=<?= $key['nama_user'] ?>&background=random"
                                     width="48" class="rounded-circle me-3">
                                <div>
                                    <h6 class="fw-bold mb-0"><?= $key['nama_user'] ?></h6>   
                                    <small class="text-muted">
                                        <?php
                                            if ($type == 'postingan') {
                                                $tanggal = $key['tanggal_post'];
                                            } else {
                                                $tanggal = $key['tanggal_komen'];
                                            }
                                        
                                            echo date('d M Y, H:i', strtotime($tanggal));
                                        ?>
                                    </small>
                                </div>          
                            </div>
                                    
                            <!-- Kategori postingan -->
                            <?php if ($type == 'postingan'): ?>
                                <div class="category-badge">
                                    <?php
                                        if ($key['nama_kategori'] == "Buku") {
                                            echo '<i class="bi bi-book-fill me-1"></i>' . "Book";
                                        }
                                        elseif($key['nama_kategori'] == "Film") {
                                            echo '<i class="bi bi-film"></i> ' . "Movie";
                                        }
                                        elseif($key['nama_kategori'] == "Lagu") {
                                            echo '<i class="bi bi-music-note-beamed"></i> ' . "Music";
                                        }
                                        elseif($key['nama_kategori'] == "Game") {
                                            echo '<i class="bi bi-controller"></i> ' . "Game";
                                        }
                                    ?>
                                </div>
                                    
                                <h5 class="fw-bold"><?= $key['judul'] ?></h5>
                                    
                                <p class="text-muted"><?= $key['isi'] ?></p>
                                    
                                <?php if (!empty($key['gambar'])): ?>
                                    <img src="uploads/<?= $key['gambar'] ?>" class="post-img" alt="Post Image">
                                <?php endif; ?>
                            <?php endif; ?>
                                
                            <!-- Kategori Komentar -->
                            <?php if ($type == 'komentar'): ?>
                                <div class="bg-light p-3 rounded mb-3">
                                    <p class="mb-0"><?= $key['isi'] ?></p>
                                </div>
                            <?php endif; ?>
                            
                            <!-- FOOTER -->
                            <div class="d-flex align-items-center gap-4">
                                <span class="text-danger">
                                    <i class="bi bi-heart-fill"></i> <?= $key['jumlah_like'] ?>
                                </span>
                            
                                <?php if ($type == 'postingan'): ?>
                                <span class="text-muted">
                                    <i class="bi bi-chat-left"></i> <?= $key['jumlah_komentar'] ?> komentar
                                </span>
                                <?php endif; ?>
                            </div>    
                        </div>         
                    <?php endforeach; ?>  
                </div>
            </div>
        </main>          
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// AJAX autocomplete
document.getElementById("asal_sekolah").addEventListener("keyup", function () {
    let keyword = this.value;

    if (keyword.length < 2) {
        document.getElementById("suggestions").innerHTML = "";
        return;
    }

    fetch("index.php?action=filter_sekolah&keyword=" + keyword)
        .then(response => response.json())
        .then(data => {
            let box = document.getElementById("suggestions");
            box.innerHTML = "";

            data.forEach(item => {
                let div = document.createElement("div");
                div.classList.add("suggestion-item");
                div.textContent = item.nama_sekolah;

                div.onclick = function () {

                    // tampilkan nama sekolah
                    document.getElementById("asal_sekolah").value = item.nama_sekolah;

                    // simpan sekolah_id ke hidden input
                    document.getElementById("sekolah_id").value = item.sekolah_id;

                    box.innerHTML = "";
                };

                box.appendChild(div);
            });
        });
});
</script>

</body>
</html>
