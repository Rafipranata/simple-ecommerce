<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin/assets/vendors/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="./style-login/style.css">
    <title>Document</title>
</head>
<body>
<?php include "navbar.php"?>

  <div class="container"> 

  <form class="form" method="POST">
      <p class="form-title">Sign in to your account</p>
        <div class="input-container">
          <input type="email" placeholder="Enter email" name="name">
          <span>
          </span>
        </div>
      <div class="input-container">
          <input type="password" placeholder="Enter password"  name="pw">
      </div>
        <button type="submit" class="submit" name="kirim">
        Log in
      </button>

      <p class="signup-link">
        No account?
        <a href="register.php">Register</a>
      </p>
      <?php
if (isset($_POST['kirim'])) {
  $email= $_POST["name"];
  $password = $_POST["pw"];
  $ambil = $koneksi -> query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan = '$password' ");

  $akunyangcocok = $ambil->num_rows;
  
  if ($akunyangcocok ==  1) {
    $akun = $ambil->fetch_assoc();
    $_SESSION["pelanggan"] = $akun;

    echo '<div class="alert alert-primary" role="alert">
    <h5>Login Berhasil</h5>
    Silahkan Belanja
    </div>';
    echo "<meta http-equiv='refresh' content='1;url=cek2.php'>";
  } else {
    
    echo '<div class="alert alert-danger" role="alert">
    <h5>Login Gagal</h5>
    Silahkan perikasa kembali akun anda
    </div>';
    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    
  }
}



?>
    </form>

</div>



</body>
</html>