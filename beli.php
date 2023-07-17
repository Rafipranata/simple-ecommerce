<?php
include "koneksi.php";
$id_produk = $_GET['id'];
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] +=1;
    
} else{
    $_SESSION['keranjang'][$id_produk] = 1;
}


echo '<script>
    Swal.fire({
        title: "Berhasil",
        text: "Produk telah ditambahkan ke keranjang",
        icon: "success"
    }).then(function() {
        window.location = "keranjang.php";
    });
</script>';

?>