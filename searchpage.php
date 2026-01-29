<?php
session_start();
if(!isset($_SESSION['email_mem'])){
    header("Location: loginpage.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Member Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{
    box-sizing:border-box;
    font-family: 'Segoe UI', Arial, sans-serif;
}

body{
    margin:0;
    background:#f4f7fe;
}

/* ===== NAVBAR ===== */
.navbar{
    height:70px;
    background:linear-gradient(135deg,#6a5cff,#ff7aa2);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 35px;
    box-shadow:0 8px 25px rgba(0,0,0,0.15);
}

.navbar .logo{
    font-size:22px;
    font-weight:700;
    letter-spacing:1px;
}

.navbar .user-box{
    display:flex;
    align-items:center;
    gap:15px;
    font-size:14px;
}

.navbar .user-box i{
    font-size:18px;
}

.logout-btn{
    background:rgba(255,255,255,0.25);
    border:none;
    padding:8px 16px;
    border-radius:20px;
    color:#fff;
    cursor:pointer;
    transition:0.3s;
}

.logout-btn:hover{
    background:#ff4d6d;
}

/* ===== LAYOUT ===== */
.main{
    display:flex;
    padding:30px;
    gap:30px;
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:240px;
    background:#fff;
    border-radius:20px;
    padding:25px 20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.sidebar h3{
    margin:0 0 20px;
    font-size:16px;
    color:#6a5cff;
}

.menu{
    display:flex;
    flex-direction:column;
    gap:12px;
}

.menu a{
    text-decoration:none;
    color:#444;
    padding:12px 15px;
    border-radius:12px;
    display:flex;
    align-items:center;
    gap:10px;
    transition:0.3s;
    font-size:14px;
}

.menu a i{
    width:18px;
    text-align:center;
}

.menu a:hover{
    background:#eef2ff;
    color:#6a5cff;
}

/* ===== CONTENT ===== */
.content{
    flex:1;
}

.welcome-card{
    background:linear-gradient(135deg,#6a5cff,#ff7aa2);
    color:#fff;
    padding:30px;
    border-radius:25px;
    box-shadow:0 15px 40px rgba(0,0,0,0.15);
    margin-bottom:30px;
}

.welcome-card h2{
    margin:0 0 10px;
    font-size:28px;
}

.welcome-card p{
    margin:0;
    opacity:0.9;
}

/* ===== INFO CARDS ===== */
.info-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

.info-card{
    background:#fff;
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.3s;
}

.info-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(0,0,0,0.12);
}

.info-card i{
    font-size:28px;
    color:#6a5cff;
    margin-bottom:15px;
}

.info-card h4{
    margin:0 0 8px;
    font-size:16px;
    color:#333;
}

.info-card p{
    margin:0;
    font-size:14px;
    color:#666;
    word-break:break-all;
}

/* ===== RESPONSIVE ===== */
@media(max-width:900px){
    .main{
        flex-direction:column;
    }
    .sidebar{
        width:100%;
    }
    .info-grid{
        grid-template-columns:1fr;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">Member Dashboard</div>
    <div class="user-box">
        <i class="fa-solid fa-user"></i>
        <?php echo $_SESSION['name_mem']; ?>
        <button class="logout-btn" onclick="location.href='logout.php'">Logout</button>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h3>MENU</h3>
        <div class="menu">
            <a href="#"><i class="fa-solid fa-house"></i> Dashboard</a>
            <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
            <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- WELCOME -->
        <div class="welcome-card">
            <h2>Welcome, <?php echo $_SESSION['name_mem']; ?> </h2>
            <p>Welcome to your member dashboard system</p>
        </div>

        <!-- INFO -->
        <div class="info-grid">
            <div class="info-card">
                <i class="fa-solid fa-envelope"></i>
                <h4>Email</h4>
                <p><?php echo $_SESSION['email_mem']; ?></p>
            </div>

            <div class="info-card">
                <i class="fa-solid fa-id-card"></i>
                <h4>Member ID</h4>
                <p><?php echo $_SESSION['id_mem']; ?></p>
            </div>

            <div class="info-card">
                <i class="fa-solid fa-user"></i>
                <h4>Name</h4>
                <p><?php echo $_SESSION['name_mem']; ?></p>
            </div>
        </div>

    </div>
</div>

</body>
</html>
