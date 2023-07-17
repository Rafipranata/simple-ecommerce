<?php
include "index.php";
$id_pembelian = $_GET['id'];
$query_hapus = "DELETE FROM pembelian WHERE id_pembelian = '$id_pembelian'";
$hapus = $koneksi->query($query_hapus);

// Memeriksa apakah data berhasil dihapus
if ($hapus) {
    // Redirect ke halaman utama atau halaman yang sesuai
    header("Location: index.php?halaman=order");
    exit();
} else {
    echo "Error: " . $koneksi->error;
}
?>