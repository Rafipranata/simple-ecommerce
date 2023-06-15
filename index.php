<?php
include "koneksi.php"

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Albinda</title>
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
          <a class="nav-link active" href="index.php" aria-current="page">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="keranjang.php">Keranjang</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<section class="konten">
  <div class="container">
    <h1>Produk Terbaru</h1>


    <div class="row">
      <?php $ambil = $koneksi->query("SELECT * FROM produk");?>
      <?php while ($perproduk = $ambil->fetch_assoc()){?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3 ">
          <div class="card bg-dark " style="width: 18rem; color:#eaeaea; margin: 0 auto;">
              <img src="fotoProduk/<?php echo $perproduk['foto_produk'] ?>" class="card-img-top" alt="FotoEror">
              <div class="card-body">
                  <h5 class="card-title"><?php echo $perproduk['nama_produk'] ?></h5>
                  <p class="card-text">Rp.<?php echo number_format( $perproduk['harga_produk'] ) ?></p>
                  <a href="beli.php?id=<?php echo $perproduk['id_produk']   ?>" class="btn btn-primary w-50 md-block">Beli</a>
                  <a href="#" class="btn btn-outline-info">Detail Produk</a>
                </div>
            </div>
        </div>
      <?php } ?>


    </div>
  </div>
</section>





</body>
</html>