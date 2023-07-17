<?php
include "koneksi.php";

if (!isset($_SESSION['pelanggan'])){
    echo '<script>
        Swal.fire({
            title: "Anda harus Login",
            icon: "warning"
        }).then(function() {
            window.location = "login.php";
        });
    </script>';}

    // mendapatkan id_pelanggan yg login dari session
    $id_pelanggan =  $_SESSION['pelanggan']['id_pelanggan']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Dashboard</title>
</head>
<body>

<?php include "navbar.php"?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
        
        </div>
        <?php
        $ambil = $koneksi->query("SELECT * FROM pelanggan  WHERE id_pelanggan = '$id_pelanggan'");
        $pecah = $ambil->fetch_assoc();
        ?>
        <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
            <div class="card-body text-center">
                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?php echo $pecah['nama_pelanggan']; ?></h5>
                <p class="text-muted mb-1"><?php echo $pecah['email_pelanggan']; ?></p>
                <p class="text-muted mb-4"><?php echo $pecah['telepon_pelanggan']; ?></p>
                <div class="d-flex justify-content-center mb-2">
                <a href="ubahProfile.php?id=<?php echo $_SESSION['pelanggan']['id_pelanggan']?>" class="btn btn-primary">Ubah</a>
                <a href="logout.php"><button type="button" class="btn btn-outline-danger ms-1">Logout</button></a>
                </div>
            </div>
            </div>
            <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    
                    <p class="mb-0">Jumlah Pembelian: </p>
                    <p class="mb-0"></p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <p class="mb-0">Pembelian Berhasil: </p>
                    <p class="mb-0"></p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <p class="mb-0">Pembelian Gagal: </p>
                    <p class="mb-0"></p>
                </li>
                </ul>
            </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Nama</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $pecah['nama_pelanggan']; ?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $pecah['email_pelanggan']; ?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Password</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $pecah['password_pelanggan']; ?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $pecah['telepon_pelanggan']; ?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Alamat</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $pecah['alamat_pelanggan']; ?></p>
                </div>
                </div>
                
                <div class="row">
                
                </div>
            </div>
            </div>
            <div class="col-lg-15">
    
    <div class="#" style="overflow-x: auto;">
        <div class="card"> 
        <div class="card-header">
            Riwayat Belanja <?php echo $pecah['nama_pelanggan']; ?>
        </div>
        <div class="card-body container">
        <table id="example" class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Status</th>
                    <th>Total</th>
                    <th class="w-25">Opsi</th>
                </tr>
            </thead>
            <?php
            
            $ambil= $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = '$id_pelanggan'");
            
            while ($pecah = $ambil->fetch_assoc()){
            ?>
            <tbody>
                <tr> 
                    <td><?php echo $pecah["status_pembelian"] ?></td>
                    <td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
                    <td>
                        <a href="nota.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-info text-dark mb-2 mt-2">detail</a>
                        <?php 
                        if ($pecah['status_pembelian'] == "pending"): ?>
                        <a href="bayar.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">bayar</a>
                        
                        <?php elseif ($pecah['status_pembelian'] == "dikirim"):?>
                            <a href="terima.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-primary">Diterima</a>
                        
                            <?php elseif ($pecah['status_pembelian'] == "diterima" || $pecah['status_pembelian'] == "gagal"):?>
                                <a href="hapus.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-danger">Hapus</a>
                        <?php else:?>
                            <a href="lihat.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-warning">Lihat</a>
                        <?php endif ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
        </div>
            </div>
        </div>
        </div>
    </div>
</section>
<script>
    new DataTable('#example');
</script>
</body>
</html>