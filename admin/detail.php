<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="ui container">Detail Pembelian</h1>
    <?php $ambilData = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian. 
        id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian= '$_GET[id]'");
        $detail = $ambilData->fetch_assoc()?>


        <div class="ui container" style="color:white; background-color:#04A0F9; border-radius: 3px;">
        <strong><?php echo $detail['nama_pelanggan']    ?></strong>
        <p>
            <?php  echo $detail['telepon_pelanggan']?><br>
            <?php  echo $detail['email_pelanggan']?><br>
        </p>

        <p>
            Tanggal Pembelian:  <?php echo $detail['tanggal_pembelian']  ?><br>
            Total Pembelian: Rp. <?php echo number_format( $detail['total_pembelian'] ) ?>
        </p>
        </div>

<div class="ui container" style="margin-top: 15px;">
        <table class="ui celled table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1   ?>
    <?php $ambilData = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk. 
        id_produk=produk.id_produk WHERE pembelian_produk. id_pembelian= '$_GET[id]'");
        ?>
        <?php while ($pecah= $ambilData->fetch_assoc()){?>
        <tr>
            <td data-label="Job"><?php echo $no ?></td>
            <td data-label="Name"><?php echo $pecah['nama_produk']?><br></td>
            <td data-label="Age"><?php  echo number_format($pecah['harga_produk'])?><br></td>
            <td data-label="Job"><?php  echo $pecah['jumlah']?><br></td>
            <td data-label="Job"><?php  echo number_format($pecah['harga_produk'] * $pecah['jumlah'])?></td>
            
        </tr>
            <?php $no++ ?>
            <?php } ?>
    </tbody>
        </table>
</div>

</body>
</html>