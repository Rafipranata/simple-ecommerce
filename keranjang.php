<?php
session_start();
include "koneksi.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" href="#">Keranjang</a>
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

  <div class="container">
    <h1>
      Keranjang Belanja
    </h1>
    <hr>
    <table class="table table-bordered ">
      <thead class="table-secondary ">
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
        </tr>
      </thead>
      <tbody> 
        <?php $no = 1;?>
      <?php  foreach($_SESSION["keranjang"] as $id_produk => $jumlah):?>
        <?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
              $pecah = $ambil -> fetch_assoc();
              $subharga = $pecah['harga_produk'] * $jumlah; ?>
        <tr>
          <td><?php echo $no?></td>
          <td><?php echo $pecah['nama_produk']?></td>
          <td>Rp.<?php echo number_format( $pecah['harga_produk'])?></td>
          <td><?php echo $jumlah?></td>
          <td>Rp.<?php echo number_format($subharga)?></td>
        </tr>
        <?php $no++?>
        <?php  endforeach ?>
      </tbody>
    </table>
    <a href="index.php" type="button" class="btn btn-outline-info">Lanjut Belanja</a>
    <a href="#" class="btn btn-primary">Checkout</a>
  </div>





</body>
</html>