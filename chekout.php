<?php
include 'koneksi.php';

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
          <a class="nav-link " href="cek.php">Keranjang</a>
        </li>
        <li class="nav-item dropdown">
          <?php if (isset($_SESSION["pelanggan"])):?>
            <a class="nav-link" href="logout.php" id="navbarDropdown">
            Logout
          </a>
          <?php  else:?>
          <a class="nav-link" href="#" id="navbarDropdown">
            Login
          </a>
          <?php endif?>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="chekout.php">Checkout</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-3">
    <h1>
    Checkout Belanja
    </h1>
</div>
<div class="container" style="overflow-x: auto;">
    <hr style="width:100%;">
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
        <?php $total = 0 ?>
        <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
    <?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
    $pecah = $ambil->fetch_assoc();
    $subharga = $pecah['harga_produk'] * $jumlah; ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $pecah['nama_produk'] ?></td>
        <td>Rp.<?php echo number_format($pecah['harga_produk']) ?></td>
        <td><?php echo $jumlah ?></td>
        <td>Rp.<?php echo number_format($subharga) ?></td>
    </tr>
    <?php $no++ ?>
    <?php $total += $subharga ?>
<?php endforeach ?>
</tbody>
<tfoot>
<th colspan="4">Total Belanja</th>
<th>Rp. <?php echo number_format($total) ?></th>
</tfoot>
</table>
</div>

<form action="" method="POST" class="container ">
    <div class="row ">
        <div class="col-md-4 mb-2">
            <div class="form-group"> </div>
            <input type="text" readonly class="form-control" placeholder="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" aria-label="First name">
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-group">
                <input type="text" readonly class="form-control" placeholder="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" aria-label="Last name">
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <select class="form-select" aria-label="Default select example" name="id_ongkir">
                <option selected>Pilih Ongkir</option>
                <?php $ambil = $koneksi->query("SELECT * FROM ongkir");
                while ($perongkir = $ambil->fetch_assoc()) { ?>
                    <option value="<?php echo $perongkir['id_ongkir'] ?>">
                        <?php echo $perongkir['nama_kota'] ?> -
                        Rp. <?php echo number_format($perongkir['tarif']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-25" name="bayar">Bayar</button>
        </div>
    </div>
</form>

<?php
if (isset($_POST['bayar'])) {
    $id_ongkir = $_POST['id_ongkir'];
    if ($id_ongkir == "Pilih Ongkir") {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda harus memilih ongkir!',
                });
            </script>";
    } else {
        $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
        $tanggal_pembelian = date('y-m-d');

        $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir' ");
        if ($ambil) {
            $tarif_ongkir = $ambil->fetch_assoc();
            $tarif = $tarif_ongkir['tarif'];
            $total_pembelian = $total + $tarif;

            $koneksi->query("INSERT INTO pembelian(
                id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian
            ) VALUES ('$id_pelanggan', '$id_ongkir' , '$tanggal_pembelian', '$total_pembelian')");

            $id_pembelian = $koneksi->insert_id; // Mendapatkan ID pembelian yang baru saja terjadi

            foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                $koneksi->query("INSERT INTO pembelian_produk(
                    id_pembelian, id_produk, jumlah
                ) VALUES ('$id_pembelian', '$id_produk', '$jumlah')");
            }
            unset($_SESSION['keranjang']);

            // Tambahkan kode Sweet Alert dan pengalihan halaman ke nota.php
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Checkout Berhasil!',
                    text: 'Pesanan Anda telah berhasil diproses.',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = 'nota.php?id=$id_pembelian';
                });
            </script>";
        } else {
            echo "Error: " . $koneksi->error;
        }
    }
}
?>





      
</body>
</html>