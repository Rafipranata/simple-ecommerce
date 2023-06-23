<?php
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
          <a class="nav-link active" href="index.php" aria-current="page">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cek.php">Keranjang</a>
        </li>
        <li class="nav-item dropdown">
          <?php if (isset($_SESSION["pelanggan"])):?>
            <a class="nav-link" href="logout.php" id="navbarDropdown">
            Logout
          </a>
          <?php else: ?>
          <a class="nav-link" href="login.php" id="navbarDropdown">
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
<div class="alert alert-primary container mt-2" role="alert">
    <?php
    $ambilData = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambilData->fetch_assoc();
    ?>

    <div class="">
        Nama: <strong><?php echo $detail['nama_pelanggan'] ?></strong>
        <p>
            No Telepon: <?php echo $detail['telepon_pelanggan'] ?><br>
            Email: <?php echo $detail['email_pelanggan'] ?><br>
        </p>

        <p>
            Tanggal Pembelian: <?php echo $detail['tanggal_pembelian'] ?><br>
            Total Pembelian: Rp. <?php echo number_format($detail['total_pembelian']) ?>
        </p>
    </div>
</div>

        
<div class="container" style="overflow-x: auto;">
    <table class="table table-bordered ">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php $total = 0 ?>
            <?php $ambilData = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian = '$_GET[id]'"); ?>
            <?php while ($pecah = $ambilData->fetch_assoc()) { ?>
                <tr>
                    <td data-label="No"><?php echo $no ?></td>
                    <td data-label="Nama Produk"><?php echo $pecah['nama_produk'] ?></td>
                    <td data-label="Harga"><?php echo number_format($pecah['harga_produk']) ?></td>
                    <td data-label="Jumlah"><?php echo $pecah['jumlah'] ?></td>
                    <td data-label="Subtotal"><?php echo number_format($pecah['harga_produk'] * $pecah['jumlah']) ?></td>
                </tr>
                <?php $no++ ?>
                <?php $subharga = $pecah['harga_produk'] * $pecah['jumlah'] ?>
                <?php $total += $subharga ?>
            <?php } ?>
        </tbody>
    
    </table>
        <div class="row">
              <div class="col-md-7">
                <div class="alert alert-primary" role="alert">
                    Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']) ?> ke <br>
                    <strong>BANK MANDIRI 123-45678-910 AN. JOKO</strong>
                </div>
              </div>
        </div>
</div>

</body>
</html>