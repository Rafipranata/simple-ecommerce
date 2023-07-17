<?php
include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #eee;">
    <?php include "navbar.php"?>
<section >
    <div class="container py-5">
        <div class="row">
        
        </div>
        <?php
        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]' ");
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
                <a href="logout.php"><button type="button" class="btn btn-outline-danger ms-1">Logout</button></a>
                </div>
            </div>
            </div>
            
        </div>
        <div class="col-lg-8">
            <form  method="POST"> 
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nama</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" id="inputName" value="<?php echo $pecah['nama_pelanggan'];  ?>">
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email"  id="inputEmail" value="<?php echo $pecah['email_pelanggan'];  ?>">
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Password</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="pw"  id="inputPassword" value="<?php echo $pecah['password_pelanggan'];  ?>">
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="phone"  id="inputPhone" value="<?php echo $pecah['telepon_pelanggan'];  ?>">
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Alamat</p>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?php echo $pecah['alamat_pelanggan'];  ?></textarea>
                        </div>
                        </div>
                        
                        <div class="row mt-3">
                        <div class="col-sm-3 ">
                            
                            <button class="btn btn-primary" name="simpan">Ubah Profile</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-lg-15">
    
    
        </div>
        </div>
    </div>
</section>
            <?php
                if (isset($_POST['simpan'])) {
                        $query = "UPDATE pelanggan SET 
                            nama_pelanggan = '{$_POST['nama']}',
                            email_pelanggan = '{$_POST['email']}',
                            password_pelanggan = '{$_POST['pw']}',
                            telepon_pelanggan = '{$_POST['phone']}',
                            alamat_pelanggan = '{$_POST['alamat']}'
                            WHERE id_pelanggan = '{$_GET['id']}'";
                    
                            $koneksi->query($query);
                    
                            echo "<script>
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Profile anda berhasil di ubah',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                window.location.href = 'akun.php';
                            });
                        </script>";
                
                
                
                };
                    
            ?>
</body>
</html>