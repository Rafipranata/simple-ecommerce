<?php
/*file ini berfungsi untuk mengecek user klik keranjang, 
jika keranjang kosong maka user diarahkan ke index.php untuk belanja 
dan jika keranjang tidak kosong maka user di arahkan ke keranjang.php


*/
include "koneksi.php";

if (empty($_SESSION['keranjang']) || !isset($_SESSION["keranjang"])) {
    echo '<script>
        Swal.fire({
            title: "Keranjang Kosong",
            text: "Silahkan belanja dahulu",
            icon: "warning"
        }).then(function() {
            window.location = "index.php";
        });
    </script>';
} else {
    header("Location: keranjang.php");
    exit();
}

?>