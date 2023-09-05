<?php
include "koneksi.php";

$keyword = $_GET["keyword"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
OR deskripsi_produk LIKE '%$keyword%'

");
while ($pecah = $ambil->fetch_assoc()) {
    $semuadata[] = $pecah;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian</title>
</head>
<body>
    <?php include "navbar.php"?>
    <div class="container">
        <h1 class="fw-bold mb-4">Hasil Pencarian</h1>

        <?php
        if (empty($semuadata)): ?>

            <div class="alert alert-danger">Produk <strong><?php echo $keyword ?> </strong> Tidak Ditemukan</div>
        <?php endif ?>

    <div class="row ">
        <?php foreach ($semuadata as $key => $value) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3 ">
                <div class="card bg-dark shadow" style="width: 18rem; color:#eaeaea; margin: 0px auto;">
                    <img src="fotoProduk/<?php echo $value['foto_produk'] ?>" class="card-img-top" alt="FotoEror">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value['nama_produk'] ?></h5>
                        <p class="card-text">Rp.<?php echo number_format($value['harga_produk']) ?></p>
                        <a href="beli.php?id=<?php echo $value['id_produk'] ?>" class="btn btn-primary w-50 md-block" name='beli'>Beli</a>
                        <a href="detailProduk.php?id=<?php echo $value['id_produk'] ?>" class="btn btn-outline-info">Detail Produk</a>
                    </div>
                    </div>
                </div>
        <?php endforeach ?>
    
    </div>

</body>
</html>