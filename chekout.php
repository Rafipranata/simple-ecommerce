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
<?php include "navbar.php"?>

<div class="container mt-3">
    <h1>
    Checkout Belanja
    </h1>
    <hr style="width:100%;">
</div>
<div class="container" style="overflow-x: auto;">
    
<table class="table table-bordered ">
        <thead class="table-secondary ">
            <tr>
            <th>No</th>
            <th>Produk</th>
            
            <th>Jumlah</th>
            <th>Subharga</th>
            </tr>
        </thead>
        <tbody> 
        <?php $no = 1;?>
        <?php $total = 0 ?>
        <?php
            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah['harga_produk'] * $jumlah;
                
                // Tampilkan data produk dalam tabel
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $pecah['nama_produk'] . "</td>";
                echo "<td>" . $jumlah . "</td>";
                echo "<td>Rp." . number_format($subharga) . "</td>";
                echo "</tr>";

                $no++;
                $total += $subharga;
            }
?>

        </tbody>
        <tfoot>
            <th colspan="3">Total Belanja</th>
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
        <div class="mb-3">
        
        <label for="exampleFormControlTextarea1" class="form-label">Alamat Pengiriman</label>
        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" readonly rows="3"><?php echo $_SESSION['pelanggan']['alamat_pelanggan'] ?></textarea>
        </div>
        
        <div class="col-md-4 mb-3" >
            <button type="submit" class="btn btn-primary w-25" name="bayar">Nota</button>
        </div>
    </div>
</form>

<?php
if (isset($_POST['bayar'])) {
    $id_ongkir = $_POST['id_ongkir'];
    
    // Cek apakah ongkir sudah dipilih
    if ($id_ongkir == "Pilih Ongkir") {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda harus memilih ongkir!',
                });
            </script>";
    } else {
        // Proses pembelian
        $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
        $tanggal_pembelian = date('y-m-d');
        
        $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
        $tarif_ongkir = $ambil->fetch_assoc();
        $tarif = $tarif_ongkir['tarif'];
        $total_pembelian = $total + $tarif;

        $koneksi->query("INSERT INTO pembelian(
            id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian
        ) VALUES ('$id_pelanggan', '$id_ongkir' , '$tanggal_pembelian', '$total_pembelian')");

        $id_pembelian = $koneksi->insert_id; // Mendapatkan ID pembelian yang baru saja terjadi

        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
            // Simpan data pembelian_produk ke dalam tabel pembelian_produk
            $koneksi->query("INSERT INTO pembelian_produk(
                id_pembelian, id_produk, jumlah
            ) VALUES ('$id_pembelian', '$id_produk', '$jumlah')");

            // Kurangi stok produk
            $koneksi->query("UPDATE produk SET stok_produk = stok_produk - $jumlah WHERE id_produk = '$id_produk'");
        }
        unset($_SESSION['keranjang']);

        // Mengarahkan ke halaman nota dengan ID pembelian
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
    }
}
?>
</body>
</html>