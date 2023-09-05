<?php

include "koneksi.php";

if (isset($_SESSION["keranjang"], $_SESSION["pelanggan"])) {
    // Lanjutkan ke halaman checkout
    echo "<script>location = 'chekout.php'</script>";
} else {
    // Kembali ke halaman indeks jika salah satu atau keduanya tidak ada
    echo "<script>location = 'index.php'</script>";
}


?>