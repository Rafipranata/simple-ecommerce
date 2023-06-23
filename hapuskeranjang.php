<?php
include "koneksi.php";
$id_produk = $_GET['id'];
unset($_SESSION["keranjang"][$id_produk]);

echo '<script>
    Swal.fire({
        title: "Produk Telah dihapus dari keranjang",
        icon: "success"
    }).then(function() {
        window.location = "keranjang.php";
    });
</script>';

?>