<?php
  include 'koneksi.php';

  if (empty($_SESSION['keranjang']) || !isset($_SESSION["keranjang"])) {
    echo '<script>
        Swal.fire({
            title: "Keranjang Kosong",
            text: "Silahkan Belanja Dahulu",
            icon: "warning"
        }).then(function() {
            window.location = "index.php";
        });
    </script>';
  };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
</head>
<body>

<?php include "navbar.php"?>

  <div class="container">
    <h1>
      Keranjang Belanja
    </h1>
  </div>
  <div class="container" style="overflow-x: auto;">
    <hr>
    <table class="table table-bordered ">
      <thead class="bg-light ">
        <tr>
          <th>Produk</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody> 
        <?php $no = 1;?>
      <?php foreach($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
        <?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
              $pecah = $ambil -> fetch_assoc();
              $subharga = $pecah['harga_produk'] * $jumlah; ?>
        <tr>
          <td><?php echo $pecah['nama_produk']?></td>
          <td><?php echo $jumlah?></td>
          <td>Rp.<?php echo number_format($subharga)?></td>
          <td>
            <a href="hapuskeranjang.php?id=<?php  echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>
          </td>
        </tr>
        <?php $no++?>
        <?php endforeach ?>
      </tbody>
    </table>
    <a href="index.php" type="button" class="btn btn-outline-info">Lanjut Belanja</a>
    <?php if (isset($_SESSION["pelanggan"])):?>
            <a type="button" class="btn btn-primary" href="chekout.php" id="navbarDropdown">
            Checkout
          </a>
          <?php else: ?>
          <a type="button" class="btn btn-primary" id="navbarDropdown" onclick="showLoginAlert()">
            Checkout
          </a>
          <?php endif?>
  </div>




  <script>
  function showLoginAlert() {
    Swal.fire({
      title: "Anda harus login terlebih dahulu",
      icon: "warning",
      timer: 2000, // Menampilkan SweetAlert selama 2 detik
      showConfirmButton: false
    }).then(function() {
      window.location.href = "login.php";
    });
  }
</script>
</body>
</html>