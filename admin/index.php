<?php
session_start();
$koneksi = new mysqli("localhost", "root", "",  "tokoalbinda"); 

if (!isset($_SESSION['admin'])) {
    echo "<script> alert('Anda Harus Login')  </script>";
    echo "<script> location='login.php'  </script>";
    exit();
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Albinda</title>
    <link rel="stylesheet" href="assets/semantic.min.css">
    <script src="assets/semantic.min.js"></script>
    <link rel="stylesheet" href="assets/styles/style.css">
    
    <link rel="stylesheet" href="assets/vendors/boxicons/css/boxicons.min.css">
</head>

<body>
<style>
    body{
        overflow-y: auto;
    }
</style>
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                <i class="bx bx-code-alt"></i>
                <div class="logo-name">ADMIN</div>
            </div>
            <i class="bx bx-menu" id="toggleMenu"></i>
        </div>
        <ul class="nav-list">
            <li class="nav-item">
                <i class="bx bx-search"></i>
                <input type="text" placeholder="Search . . ." class="sidebar-search">

            </li>
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <i class="bx bx-grid-alt"></i> <span class="nav-name">Dashboard</span>
                </a>

            </li>
            <li class="nav-item">
                <a href="index.php?halaman=produk" class="nav-link">
                <i class='bx bx-basket'></i> <span class="nav-name">Produk</span>
                </a>

            </li>
            <li class="nav-item">
                <a href="index.php?halaman=user" class="nav-link">
                    <i class="bx bx-user"></i> <span class="nav-name">User</span>
                </a>

            </li>
            </li>
            <li class="nav-item">
                <a href="index.php?halaman=order" class="nav-link">
                    <i class="bx bx-cart"></i> <span class="nav-name">Order</span>
                </a>
            </li>
        </ul>
        <div class="profile-content">
            <div class="profile">
                <a href="index.php?halaman=logout">
                <i class="bx bx-log-out " style="color: white;" id="logout"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        
        
        
        
    <?php
        
        

        
        
        
        if (isset($_GET['halaman'])) {
            
            if ($_GET['halaman']=="produk") {
                include 'produk.php';
            }
            
            elseif ($_GET['halaman']=="user") {
                include 'user.php';
            }
            
            elseif ($_GET['halaman']=="order") {
                include 'order.php';
            }
            
            elseif ($_GET['halaman']=="detail") {
                include 'detail.php';
            }
            
            elseif ($_GET['halaman']=="tambahProduk") {
                include 'tambahProduk.php';
            }
            
            elseif ($_GET['halaman']=="hapusProduk") {
                include 'hapusProduk.php';
            }
            
            elseif ($_GET['halaman']=="ubahProduk") {
                include 'ubahProduk.php';
            }
            
            elseif ($_GET['halaman']=="logout") {
                include 'logout.php';
            }
        } 
        else {
            include 'dashboard.php';
        }
        
        ?>
        
        
    </div>

    <script src="assets/scripts/script.js"></script>
</body>

</html>