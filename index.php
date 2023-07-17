<?php
include "koneksi.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Albinda</title>
</head>
<body>
    <?php include "navbar.php"?>

<section class="konten">
  <div class="container">
    <h1 class="mb-2">Produk Terbaru</h1>
    <div class="row">
      <?php $ambil = $koneksi->query("SELECT * FROM produk");?>
      <?php while ($perproduk = $ambil->fetch_assoc()){?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3 ">
          <div class="card bg-dark " style="width: 18rem; color:#eaeaea; margin: 0px auto;">
              <img src="fotoProduk/<?php echo $perproduk['foto_produk'] ?>" class="card-img-top" alt="FotoEror">
              <div class="card-body">
                  <h5 class="card-title"><?php echo $perproduk['nama_produk'] ?></h5>
                  <p class="card-text">Rp.<?php echo number_format( $perproduk['harga_produk'] ) ?></p>
                  <a href="beli.php?id=<?php echo $perproduk['id_produk'] ?>" class="btn btn-primary w-50 md-block" name='beli'>Beli</a>
                  <a href="detailProduk.php?id=<?php echo $perproduk['id_produk'] ?>" class="btn btn-outline-info">Detail Produk</a>
                </div>
            </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

</body>
</html>