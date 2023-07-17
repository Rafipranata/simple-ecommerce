<?php
include "koneksi.php";


//mendapatkan id_pembelian dari url

$id_pem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pem'");
$detail_pem = $ambil->fetch_assoc();

//mendapatkan id pelanggan yg beli
$id_pelanggan_beli = $detail_pem["id_pelanggan"];

//mendapatkan id pelanggan yg login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_beli) {
    echo '<script>
    Swal.fire({
        title: "Jangan Nakal",
        icon: "warning"
    }).then(function() {
        window.location = "akun.php";
    });
</script>';
}
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
        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan_login'");
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
                    Konfirmasi Pembayaran
                </div>
            <div class="card-body shadow">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="nama" placeholder="nama" aria-label="First name">
                    </div>
                    <div class="col">
                    <input class="form-control" type="text" value="Rp. <?php echo number_format($detail_pem['total_pembelian'])?>" aria-label="Disabled input example" disabled readonly>
                    
                    </div>
                </div>
                
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" name="bank" id="formGroupExampleInput" placeholder="Bank">
                </div>
                
                <div class="mb-3">
                    <input type="number" class="form-control" name="jumlah" id="formGroupExampleInput2" placeholder="Jumlah" >
                    <div id="emailHelp" class="form-text">Isi sesuai nominal yang diatas</div>
                </div>
                
                <div class="mb-3">
                    <input type="file" class="form-control" name="bukti" id="formGroupExampleInput2" >
                    <div id="emailHelp" class="form-text text-danger">Foto bukti pembayaran maksimal 2 MB</div>
                </div>
                <button class="btn btn-success" name="bayar">Bayar</button>
                </form>
                <?php
                if (isset($_POST["bayar"])){
                    $namabukti = $_FILES["bukti"]["name"];
                    $lokasibukti = $_FILES["bukti"]["tmp_name"];
                    $namafiks = date("YmdHis").$namabukti;
                    move_uploaded_file($lokasibukti, "buktiPembayaran/$namafiks");

                    $nama = $_POST["nama"];
                    $bank = $_POST["bank"];
                    $jumlah = $_POST["jumlah"];
                    $tanggal = date("Y-m-d");

                    //simpan pembayaran
                    $koneksi->query("INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti)
                    VALUES ('$id_pem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");
                    
                    //update data dari pending ke proses
                    $koneksi->query("UPDATE pembelian SET status_pembelian = 'proses' WHERE id_pembelian = '$id_pem'");

                    echo '<script>
                    Swal.fire({
                        title: "Berhasil",
                        text: "Pembelian anda akan kami proses",
                        icon: "success"
                    }).then(function() {
                        window.location = "akun.php";
                    });
                </script>';
                }
                ?>
            </div>
            </div>
            <div class="col-lg-15">
</div>
    
</section>
</body>
</html>