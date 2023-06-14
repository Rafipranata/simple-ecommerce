<?php
if (isset($_GET['id'])) {
    $idget = $_GET['id'];

    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = $idget");
    $ambilData = $ambil->fetch_assoc();

    if ($ambilData) {
        $foto_Produk = $ambilData['foto_produk'];
        if (file_exists("../fotoProduk/$foto_Produk")) {
            unlink("../fotoProduk/$foto_Produk");
        }

        $koneksi->query("DELETE FROM produk WHERE id_produk = $idget");

        echo "<script> alert('Produk Telah Dihapus') </script>";
        echo "<script> location='index.php?halaman=produk'</script>";
    } else {
        echo "<script> alert('Produk tidak ditemukan') </script>";
    }
} else {
    echo "<script> alert('ID Produk tidak ditemukan') </script>";
}
?>
