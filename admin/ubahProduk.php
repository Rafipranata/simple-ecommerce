<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>

    <title>Document</title>
</head>
<body>
    <?php
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]' ");
    $pecah = $ambil ->fetch_assoc();
    ?>
    <form class="ui form" method="POST" enctype="multipart/form-data">
    <div class="ui container">
    <h4 class="ui dividing header">Ubah Produk</h4>

    <div class="field">
        <label>Nama Produk</label>
        <input type="text" name="nama" value="<?php echo $pecah['nama_produk'];  ?>">
    </div>
    <div class="field">
        <label>Harga Produk</label>
        <input type="number" name="harga"value="<?php echo $pecah['harga_produk'];  ?>">
    </div>
    <div class="field">
    <label>Berat Produk (Gr)</label>
    <input type="number" name="berat" placeholder="Berat Produk" value="<?php echo $pecah['berat'];  ?>">
    </div>
    
    <div class="field">
    <label>Stok Produk</label>
    <input type="number" name="stok" placeholder="Berat Produk" value="<?php echo $pecah['stok_produk'];  ?>">
    </div>
    
    
    
    <div class="ui form">
    <div class="field">
        <label>Deskripsi Produk</label>
        <textarea style="height: 155px;" name="deskripsi"><?php echo $pecah['deskripsi_produk'];  ?></textarea>
    </div>
    <div class="field">
        <label>Ganti Foto</label>
    <div class="two fields">
        <div class="field">
        <div class="ui input">
        <input type="file" name="foto" > 
    </div>
        </div>
            <div class="field">
            <img src="../fotoProduk/<?php echo $pecah["foto_produk"];?>" width="120px" alt="foto eror">
        </div>
    </div>
    </div>

    
            <button class="ui primary button" type="submit" name="simpan" style="margin-bottom:20px;">Submit</button>
        </div>
    </form>
    <?php
    if (isset($_POST['simpan'])) {
        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];
    
        // Cek apakah foto diubah atau tidak
        if (!empty($lokasifoto)) {
            move_uploaded_file($lokasifoto, "../fotoProduk/$namafoto");
    
            $query = "UPDATE produk SET 
                nama_produk = '{$_POST['nama']}',
                harga_produk = '{$_POST['harga']}',
                berat = '{$_POST['berat']}',
                stok_produk = '{$_POST['stok']}',
                foto_produk = '$namafoto',
                deskripsi_produk = '{$_POST['deskripsi']}'
                WHERE id_produk = '{$_GET['id']}'";
        } else {
            $query = "UPDATE produk SET 
                nama_produk = '{$_POST['nama']}',
                harga_produk = '{$_POST['harga']}',
                berat = '{$_POST['berat']}',
                stok_produk = '{$_POST['stok']}',
                deskripsi_produk = '{$_POST['deskripsi']}'
                WHERE id_produk = '{$_GET['id']}'";
        }
    
        $koneksi->query($query);
    
        echo "<script>
        Swal.fire({
            title: 'Produk Telah Diubah',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href = 'index.php?halaman=produk';
        });
    </script>";
    }
    
    ?>
</body>
</html>