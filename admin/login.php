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
<style>
    body{
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1440' height='660' preserveAspectRatio='none' viewBox='0 0 1440 660'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1000%26quot%3b)' fill='none'%3e%3crect width='1440' height='660' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M-9.19 576.28a29.15 29.15 0 1 0 43.71 38.58z' stroke='%23037b0b'%3e%3c/path%3e%3cpath d='M1235.5 312.26L1281.46 312.26L1281.46 358.22L1235.5 358.22z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M313.81 444.14L314.96 444.14L314.96 496.58L313.81 496.58z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M360.96 208.26L388.71 208.26L388.71 236.01L360.96 236.01z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M979.93 380.03 a54.56 54.56 0 1 0 109.12 0 a54.56 54.56 0 1 0 -109.12 0z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M768.3 121.39a48.02 48.02 0 1 0-80.62-52.19z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M238.59 166.12 a38.51 38.51 0 1 0 77.02 0 a38.51 38.51 0 1 0 -77.02 0z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M1363.46 46.5 a9.66 9.66 0 1 0 19.32 0 a9.66 9.66 0 1 0 -19.32 0z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M94.72 139.26L119.91 139.26L119.91 164.45L94.72 164.45z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M1276.71 363.99a46.08 46.08 0 1 0 29.88 87.18z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M844.5 258.89 a38.61 38.61 0 1 0 77.22 0 a38.61 38.61 0 1 0 -77.22 0z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M173.26 502.87 a18.64 18.64 0 1 0 37.28 0 a18.64 18.64 0 1 0 -37.28 0z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M149.59 97.3a57.87 57.87 0 1 0-95.63-65.19z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M40.69 580.79a4.33 4.33 0 1 0 5.16 6.96z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M598.03 564.92L632.56 564.92L632.56 606.76L598.03 606.76z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M1311.71 451.56 a44.11 44.11 0 1 0 88.22 0 a44.11 44.11 0 1 0 -88.22 0z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M1388.34 525.63L1431.67 525.63L1431.67 568.96L1388.34 568.96z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M208.94 517.43L213.43 517.43L213.43 521.92L208.94 521.92z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M-5.11 141.5a65.5 65.5 0 1 0 98.72-86.11z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M506.07 121.66a7.49 7.49 0 1 0 9.94-11.2z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M249.73 246.02a4.23 4.23 0 1 0 3.54-7.68z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M486.65 448.71L490.93 448.71L490.93 452.99L486.65 452.99z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M1292.61 361.03L1355.93 361.03L1355.93 385.31L1292.61 385.31z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M1165.6 306.65 a46.27 46.27 0 1 0 92.54 0 a46.27 46.27 0 1 0 -92.54 0z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M993.52 88.4a37.59 37.59 0 1 0-22.86 71.61z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M1261.22 291.57a60.98 60.98 0 1 0 117.1 34.1z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M726.28 64.07L781.43 64.07L781.43 103.58L726.28 103.58z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M207.88 347.79 a36.2 36.2 0 1 0 72.4 0 a36.2 36.2 0 1 0 -72.4 0z' fill='%23037b0b'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1000'%3e%3crect width='1440' height='660' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
    }
</style>
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

        if ($yangcocok == 1) {
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