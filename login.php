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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="cek.php">Keranjang</a>
        </li>
        <li class="nav-item dropdown">
          <?php if (isset($_SESSION["pelanggan"])):?>
            <a class="nav-link active" href="logout.php" id="navbarDropdown">
            Logout
          </a>
          <?php  else:?>
          <a class="nav-link active" href="#" id="navbarDropdown">
            Login
          </a>
          <?php endif?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cek2.php">Checkout</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
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
        <a href="">Sign up</a>
      </p>
    </form>

</div>
<?php
if (isset($_POST['kirim'])) {
  $email= $_POST["name"];
  $password = $_POST["pw"];
  $ambil = $koneksi -> query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan = '$password' ");


  $akunyangcocok = $ambil->num_rows;
  
  if ($akunyangcocok ==  1) {
    $akun = $ambil->fetch_assoc();
    $_SESSION["pelanggan"] = $akun;

    echo '<script>
        Swal.fire({
            title: "Login Berhasil",
            text: "Silahkan Berbelanja",
            icon: "success",
            showConfirmButton: true,
            timer: 3000  // Menampilkan SweetAlert selama 2 detik
        }).then(function() {
            // Redirect ke halaman lain setelah SweetAlert ditutup
            window.location.href = "cek2.php";
        });
    </script>';
  } else {
    
    echo '<script>
        Swal.fire({
            title: "Login Gagal",
            text: "Periksa kembali akun anda",
            icon: "error",
            confirmButtonText: "OK"
        });
    </script>';
    
  }
}



?>


</body>
</html>