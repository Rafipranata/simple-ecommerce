<?php
include "koneksi.php";


//mendapatkan id_pembelian dari url

$id_pem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pem'");
$detail_pem = $ambil->fetch_assoc();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #eee;">
    <?php include "navbar.php" ?>
<section>
    <div class="container py-5">
        <div class="row">
        
        </div>
        <?php
        $ambil = $koneksi->query("SELECT * FROM pelanggan");
        $pecah = $ambil->fetch_assoc();
        ?>
        <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
            <div class="card-body text-center">
                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?php echo $pecah['nama_pelanggan'];  ?></h5>
                <p class="text-muted mb-1"><?php echo $pecah['email_pelanggan'];  ?></p>
                <p class="text-muted mb-4"><?php echo $pecah['telepon_pelanggan'];  ?></p>
                <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary">Ubah</button>
                <a href="logout.php"><button type="button" class="btn btn-outline-danger ms-1">Logout</button></a>
                </div>
            </div>
            </div>
            
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header fw-bold">
                    Lihat Pembayaran
                </div>
            <div class="card-body shadow">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="nama" placeholder="nama" aria-label="First name" value="<?php echo $detail_pem['nama']?>" disabled readonly>
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="nama" placeholder="nama" aria-label="First name" value="<?php echo $detail_pem['tanggal']?>" disabled readonly>
                    
                    
                    </div>
                </div>
                
                <div class="mb-3 mt-3">
                <input type="text" class="form-control" name="nama" placeholder="nama" aria-label="First name" value="<?php echo $detail_pem['bank']?>" disabled readonly>
                </div>
                
                <div class="mb-3">
                <input class="form-control" type="text" value="Rp. <?php echo number_format($detail_pem['jumlah'])?>" aria-label="Disabled input example" disabled readonly>
                    
                </div>
                
                <div class="mb-3">
                    
                    <img src="./buktiPembayaran/<?php echo $detail_pem["bukti"];?>" class="img-fluid w-50" alt="">
                </div>
                </form>
            </div>
            </div>
            <div class="col-lg-15">
</div>
    
</section>
</body>
</html>