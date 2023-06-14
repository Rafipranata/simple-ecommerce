



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
                <td data-label="Job"><?php echo $pecah["tanggal_pembelian"]; ?></td>
                <td data-label="Job"><?php echo number_format($pecah["total_pembelian"])   ?></td>
                <td data-label="Job">
                <a href="index.php?halaman=detail&id=<?php echo $pecah["id_pembelian"] ?>"><button class="ui green button">
                    Detail
            </button></a>
        </td>
                </td>
    </tr>
            <tr>
                <td data-label="Name">Jill</td>
                <td data-label="Age">26</td>
                <td data-label="Job">Engineer</td>
                <td data-label="Job">Engineer</td>
                <td data-label="Job">Engineer</td>
            </tr>
            <tr>
                <td data-label="Name">Elyse</td>
                <td data-label="Age">24</td>
                <td data-label="Job">Designer</td>
                <td data-label="Job">Designer</td>
                <td data-label="Job">Designer</td>
            </tr>
            <?php  }  ?>
            <?php $no++ ?>
    </tbody>
</table>
    </div>

</body>
</html>