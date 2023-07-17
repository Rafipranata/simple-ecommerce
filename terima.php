<?php
include "koneksi.php";


$id = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id'");
$detail_pem = $ambil->fetch_assoc();

$koneksi->query("UPDATE pembelian SET status_pembelian = 'diterima' WHERE id_pembelian = '$id'");

echo '<script>
    Swal.fire({
        title: "Berhasil",
        text: "Pembelian ini telah diterima",
        icon: "success"
    }).then(function() {
        window.location = "akun.php";
    });
</script>';
?>
