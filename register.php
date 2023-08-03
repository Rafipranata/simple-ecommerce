<?php
include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style-login/register.css">
    <title>Register</title>
</head>
<style>

</style>
<body>

<?php include "navbar.php"?>

    <div class="container">
        <form class="form" method="post" >
                <p class="title">Register </p>
                    <div class="flex">
                    <label>
                        <input required="" placeholder="" type="text" class="input" name="nama">
                        <span>Nama</span>
                    </label>

                    <label>
                        <input required="" placeholder="" type="number" class="input" name="telepon">
                        <span>Telepon</span>
                    </label>
                </div>

                <label>
                    <input required="" placeholder="" type="email" class="input" name="email">
                    <span>Email</span>
                </label>

                <label>
                    <input required="" placeholder="" type="password" class="input" name="pw">
                    <span>Password</span>
                </label>
                <label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat" name="alamat"></textarea>
                </label>
                <button class="submit" name="submit">Submit</button>
                <p class="signin mb-0">Already have an acount ? <a href="login.php">Login</a> </p>
                <?php
                if (isset($_POST["submit"])) {
                    $nama = $_POST["nama"];
                    $telepon = $_POST["telepon"];
                    $email = $_POST["email"];
                    $password = $_POST["pw"];
                    $alamat = $_POST["alamat"];

                    //cek email apakah sudah digunakan
                    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
                    $yangcocok = $ambil->num_rows;
                    if ($yangcocok == 1) {
                        echo '<div class="alert alert-danger mb-0" role="alert">
                                <h5>Login Gagal</h5>
                                Email Telah Digunakan
                                </div>';
                                    echo "<meta http-equiv='refresh' content='1;url=register.php'>";
                    } else {
                        $koneksi->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan)
                                VALUES('$email', '$password', '$nama', '$telepon', '$alamat')");
                        echo '<div class="alert alert-primary" role="alert">
                                    <h5>Login Berhasil</h5>
                                    Silahkan Login
                        </div>';
                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                    }
                }
            ?>
        </form>
    </div>


</body>
</html>