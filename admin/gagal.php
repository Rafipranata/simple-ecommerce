<?php
$id_pem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pem'");
$detail_pem = $ambil->fetch_assoc();

$koneksi->query("UPDATE pembelian SET status_pembelian = 'gagal' WHERE id_pembelian = '$id_pem'");

                    echo '<script>
                    Swal.fire({
                        title: "Gagal",
                        text: "Pembelian ini mengalami kecurangan",
                        icon: "error"
                    }).then(function() {
                        window.location = "index.php?halaman=order";
                    });
                </script>';
?>