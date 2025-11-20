<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Minimal Dashboard</title>

<style>
    body{
        margin:0;
        font-family: Poppins, sans-serif;
        background:#f5f6f8;
    }

    /* TOP NAV */
    .topbar{
        background:white;
        padding:15px 25px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        border-bottom:1px solid #eee;
        position:sticky;
        top:0;
        z-index:10;
    }

    .topbar .title{
        font-size:20px;
        font-weight:600;
    }

    .topbar .user{
        display:flex;
        align-items:center;
        gap:10px;
        font-weight:500;
    }

    .topbar .user img{
        width:35px;
        height:35px;
        border-radius:50%;
    }

    /* SIDEBAR */
    .sidebar{
        width:220px;
        background:white;
        height:100vh;
        padding:20px;
        position:fixed;
        top:60px;
        left:0;
        border-right:1px solid #eee;
    }

    .menu-item{
        padding:12px 15px;
        border-radius:10px;
        margin-bottom:8px;
        cursor:pointer;
        display:flex;
        align-items:center;
        gap:10px;
        color:#333;
        transition:0.2s;
    }

    .menu-item:hover,
    .menu-item.active{
        background:#111;
        color:white;
    }

    .menu-item i{
        font-size:18px;
    }

    /* MAIN AREA */
    .main{
        margin-left:240px;
        padding:20px 30px;
    }

    /* FILTER BAR */
    .filters{
        display:flex;
        gap:10px;
        margin-bottom:20px;
    }

    .filter-btn{
        padding:8px 16px;
        background:white;
        border-radius:20px;
        cursor:pointer;
        border:1px solid #ddd;
        font-size:14px;
        transition:0.2s;
    }

    .filter-btn:hover,
    .filter-btn.active{
        background:#111;
        color:white;
    }

    /* POST CARD */
    .post-card{
        background:white;
        padding:20px;
        border-radius:14px;
        margin-bottom:20px;
        box-shadow:0 2px 8px rgba(0,0,0,0.08);
    }

    .post-header{
        display:flex;
        align-items:center;
        gap:12px;
        margin-bottom:10px;
    }

    .post-header img{
        width:45px;
        height:45px;
        border-radius:50%;
    }

    .post-header .name{
        font-weight:600;
    }

    .post-header .time{
        font-size:13px;
        color:#666;
    }

    .tag{
        display:inline-block;
        background:#e7f0ff;
        color:#4467ff;
        padding:5px 10px;
        border-radius:12px;
        font-size:13px;
        margin-bottom:8px;
    }

    .post-title{
        font-weight:600;
        font-size:18px;
        margin:5px 0;
    }

    .post-image{
        margin-top:10px;
        width:100%;
        border-radius:12px;
    }

</style>
</head>
<body>

<!-- TOP BAR -->
<div class="topbar">
    <div class="title">Minimal</div>
    <div class="user">
        Demo User
        <img src="https://i.pravatar.cc/100" alt="">
    </div>
</div>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="menu-item active">🏠 Home</div>
    <div class="menu-item">➕ Tambah Postingan</div>
    <div class="menu-item">🏆 Ranking</div>
    <div class="menu-item">👤 Profil</div>
</div>

<!-- MAIN CONTENT -->
<div class="main">

    <!-- FILTERS -->
    <div class="filters">
        <div class="filter-btn active">Semua</div>
        <div class="filter-btn">Buku</div>
        <div class="filter-btn">Film</div>
        <div class="filter-btn">Game</div>
        <div class="filter-btn">Lagu</div>
    </div>

    <!-- POST -->
    <div class="post-card">
        <div class="post-header">
            <img src="https://i.pravatar.cc/150?img=12">
            <div>
                <div class="name">Sarah Chen</div>
                <div class="time">1h yang lalu</div>
            </div>
        </div>

        <div class="tag">📚 Buku</div>
        <div class="post-title">Atomic Habits</div>

        <p>
            Buku yang luar biasa tentang membangun kebiasaan baik.
            Sangat recommended untuk yang ingin meningkatkan produktivitas!
        </p>

        <img class="post-image"
             src="https://images.pexels.com/photos/590493/pexels-photo-590493.jpeg"
             alt="">
    </div>

</div>

</body>
</html>