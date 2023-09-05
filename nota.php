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
<?php include "navbar.php"?>

<div class="alert alert-primary container mt-2" role="alert">
    <?php
    // Query untuk mengambil data dari tabel pembelian dan melakukan join dengan tabel pelanggan
    // Data yang diambil adalah yang memiliki id_pembelian yang sesuai dengan nilai $_GET['id']
    $ambilData = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambilData->fetch_assoc();
    ?>

    <div class="">
        Nama: <strong><?php echo $detail['nama_pelanggan'] ?></strong>
        <p>
            Telepon: <?php echo $detail['telepon_pelanggan'] ?><br>
            Email: <?php echo $detail['email_pelanggan'] ?><br>
        </p>

        <p>
            Tanggal Pembelian: <?php echo $detail['tanggal_pembelian'] ?><br>
            Total Pembelian: Rp. <?php echo number_format($detail['total_pembelian']) ?> <br>
            Alamat: <?php echo $_SESSION['pelanggan']['alamat_pelanggan'] ?>
        </p>
    </div>
</div>

        
<div class="container" style="overflow-x: auto;">
    <table class="table table-bordered ">
        <thead class="table-secondary">
            <tr>

                <th>Produk</th>
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
    <?php if ($detail['status_pembelian'] != "dikirim" && $detail['status_pembelian'] != "gagal"): ?>
        <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-primary" role="alert">
                        Silahkan melakukan pembayaran sebesar Rp. <?php echo number_format($detail['total_pembelian']) ?> ke <br>
                        <strong>BANK MANDIRI 123-45678-910 AN. JOKO</strong>
                    </div>
                </div>
        </div>
        <?php endif ?>
</div>

</body>
</html>