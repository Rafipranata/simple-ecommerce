<?php
$id_pem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pem'");
$detail_pem = $ambil->fetch_assoc();

$koneksi->query("UPDATE pembelian SET status_pembelian = 'dikirim' WHERE id_pembelian = '$id_pem'");

                    echo '<script>
                    Swal.fire({
                        title: "Berhasil",
                        text: "Pembelian ini akan dikirim",
                        icon: "success"
                    }).then(function() {
                        window.location = "index.php?halaman=order";
                    });
                </script>';
?>