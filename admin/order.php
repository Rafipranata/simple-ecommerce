
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
    <table class="ui celled table">
            <thead>
                <tr><th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pembelian</th>
                <th>Total Pembelian</th>
                <th>Aksi</th>
            </rt></thead>
    <tbody>
        <?php $no= 1  ?>
        <?php $ambilData = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian. 
        id_pelanggan=pelanggan.id_pelanggan") ?>
        <?php while ($pecah = $ambilData->fetch_assoc()){ ?>
    <tr>
                <td data-label="Name"><?php echo $no?></td>
                <td data-label="Age"><?php echo $pecah["nama_pelanggan"]; ?></td>
                <td data-label="Job"><?php echo $pecah["status_pembelian"]; ?></td>
                <td data-label="Job"><?php echo number_format($pecah["total_pembelian"])   ?></td>
                <td data-label="Job">
                <div class="ui grid">
                <div class="four wide column"><a href="index.php?halaman=detail&id=<?php echo $pecah["id_pembelian"] ?>"><button class="ui green button"> Detail</button></a></div>
                <div class="four wide column"><a href="#"><button class="ui negative button" onclick="hapusData('<?php echo $pecah['id_pembelian'] ?>')">Hapus</button></a></div>
                
                <?php if ($pecah['status_pembelian'] == "proses"): ?>
                <div class="four wide column"><a href="index.php?halaman=kirim&id=<?php echo $pecah["id_pembelian"] ?>" class="ui primary button">Dikirim</a></div>
                <div class="four wide column"><a href="index.php?halaman=gagal&id=<?php echo $pecah["id_pembelian"] ?>" class="ui inverted red button">Gagal</a></div>
                </div>
                
            <?php endif?>
        </td>
                </td>
    </tr>
    <?php $no++ ?>
            <?php  }  ?>
            
    </tbody>
</table>
    </div>
<script>
    function hapusData(id) {
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin menghapus data ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "hapusOrder.php?id=" + id;
            }
        });
    }
</script>
</body>
</html>