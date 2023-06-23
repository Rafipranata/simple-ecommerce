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
    </script>';
    exit();
} elseif (empty($_SESSION['keranjang'])) {
    echo '<script>
        Swal.fire({
            title: "Silahkan belanja dahulu",
            text: "Silahkan Belanja Dahulu untuk melanjutkan checkout",
            icon: "warning"
        }).then(function() {
            window.location = "index.php";
        });
    </script>';
} else {
    header("Location: chekout.php");
    exit();
}

?>