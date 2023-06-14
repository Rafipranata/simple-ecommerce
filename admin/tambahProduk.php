<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form class="ui form" method="POST" enctype="multipart/form-data">
    <div class="ui container">
    <h4 class="ui dividing header">Tambah Produk</h4>

    <div class="field">
        <label>Nama Produk</label>
        <input type="text" name="nama" placeholder="Nama Produk">
    </div>
    <div class="field">
        <label>Harga Produk</label>
        <input type="number" name="harga" placeholder="Harga Produk">
    </div>
    <div class="field">
    <label>Berat Produk (Gr)</label>
    <input type="number" name="berat" placeholder="Berat Produk">
    </div>
    <div class="ui form">
    <div class="field">
        <label>Deskripsi Produk</label>
        <textarea style="height: 155px;" name="deskripsi"></textarea>
    </div>
    <div class="ui input" style="margin-bottom: 10px;">
        <input type="file" name="foto" > 
    </div><br>
    
    <button class="ui primary button" type="submit" name="simpan">Submit</button>
    </div>
</form>

<?php
if (isset($_POST["simpan"])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../fotoProduk/".$nama);

    $nama_produk = $_POST['nama'];
    $harga_produk = $_POST['harga'];
    $berat_produk = $_POST['berat'];
    $deskripsi_produk = $_POST['deskripsi'];

    $query = "INSERT INTO produk (nama_produk, harga_produk, berat, foto_produk, deskripsi_produk) VALUES ('$nama_produk', '$harga_produk', '$berat_produk', '$nama' ,'$deskripsi_produk')";
    $koneksi->query($query);

    echo "<script> alert('Produk Baru Telah Ditambahkan') </script>";
    echo "<script>location.href='index.php?halaman=produk'  </script>";
}
?>











</body>
</html>