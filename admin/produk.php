


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/semantic.min.css">
    <script src="assets/semantic.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="ui container">
    <h1>Produk</h1>
    <table class="ui celled table">
<thead class="center aligned">
    <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Berat</th>
    <th>Foto</th>
    <th>Aksi</th>
    </tr>
</thead>
    <tbody class="center aligned">
        <?php $no = 1 ?>
        <?php $ambil = $koneksi-> query ("SELECT * FROM produk");?>
        <?php while ($pecah = $ambil->fetch_assoc()){ ?>
    <tr>
        <td ><?php echo $no?></td>
        <td ><?php echo $pecah["nama_produk"] ?></td>
        <td >Rp. <?php echo number_format( $pecah["harga_produk"])?></td>
        <td ><?php echo $pecah["berat"]?>.Gr</td>
        <td >
            <img src="../fotoProduk/<?php echo $pecah["foto_produk"];?>" width="130px" alt="foto eror">
        </td>
        <td >
        <a href="index.php?halaman=hapusProduk&id=<?php echo $pecah['id_produk'];?>"><button class="ui  negative button">
            hapus
            </button></a>
            <a href="index.php?halaman=ubahProduk&id=<?php echo $pecah['id_produk'];?>"><button class="ui primary button">
            ubah
            </button></a>
        </td>
    </tr>
            <?php $no++?>
            <?php } ?>
            
    </tbody>
</table>
            <a href="index.php?halaman=tambahProduk"><button class="ui primary button"  style="margin-bottom:13px;">Tambah Produk</button></a>
        </div>



</body>
</html>