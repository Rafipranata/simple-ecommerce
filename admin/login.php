<?php
session_start();
$koneksi = new mysqli("localhost", "root", "",  "tokoalbinda"); 




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/login/style.css">
    <link rel="stylesheet" href="assets/semantic.min.css">
    <script src="assets/semantic.min.js"></script>
    <title>Sign in</title>
</head>
<body>

    <div class="ui centered">
    <form class="form"  method="POST"  >
        <p class="form-title">Sign in to admin account</p>
        <div class="input-container">
            <input placeholder="Enter username" type="text" name="user">
            <span>
                <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
            </span>
        </div>
        <div class="input-container">
            <input placeholder="Enter password" type="password" name="pw">

            <span>
                <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                    <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
            </span>
        </div>
            <button class="submit" type="submit" name="login">
                Sign in
            </button>
            <?php
    if (isset($_POST['login'])) {
        $ambil = $koneksi->query("SELECT * FROM admin WHERE username = '$_POST[user]'
        AND password = '$_POST[pw]' ");
        $yangcocok = $ambil->num_rows;

        if ($yangcocok > 0) {
            $_SESSION['admin']=$ambil->fetch_assoc();
            echo "<div class = 'ui success message'>
            
            <div class='header'>
                Login Berhasil
            </div>
            <p>Silahkan menuju halaman Admin</p>
            </div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            
        }else {
            echo "<div class = 'ui negative message'>
            
            <div class='header'>
                Login Gagal
            </div>
            <p>Silahkan Coba Kembali</p>
            </div>";
            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        }
    }




?>
    </form>
    </div>
    
</body>
</html>