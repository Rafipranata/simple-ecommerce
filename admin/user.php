




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
    <h1>Selamat Datang di user</h1>
    <div class="ui container">
    <table class="ui celled table">
<thead class="center aligned">
    <tr>
    <th>No</th>
    <th>Nama User</th>
    <th>Email</th>
    <th>Telepon</th>
    <th>Aksi</th>
    </tr>
</thead>
    <tbody class="center aligned">
        <?php $no = 1 ?>
        <?php $ambil = $koneksi->query ("SELECT * FROM pelanggan");?>
        <?php while ($pecah = $ambil->fetch_assoc()){ ?>
    <tr>
        <td data-label="Name"><?php echo $no?></td>
        <td data-label="Name"><?php echo $pecah["nama_pelanggan"] ?></td>
        <td data-label="Age"><?php echo $pecah["email_pelanggan"]?></td>
        <td data-label="Job"><?php echo $pecah["telepon_pelanggan"]?></td>
        <td data-label="Job">
        <a href=""><button class="ui  negative button">
            hapus
            </button></a>
        </td>
    </tr>
            <?php $no++?>
            <?php } ?>
    </tbody>
</table>
</div>



    
</body>
</html>