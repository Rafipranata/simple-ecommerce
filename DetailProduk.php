<?php
include "koneksi.php";

$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");

$detail = $ambil->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include "navbar.php" ?>

<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="fotoProduk/<?php echo $detail['foto_produk']?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1  fw-bold fs-5">Stok: <?php echo $detail['stok_produk']?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $detail['nama_produk']?></h1>
                        <div class="fs-5 mb-5">
                            <span>Rp.<?php echo number_format($detail['harga_produk'])?></span>
                        </div>
                        <p class="lead"><?php echo $detail['deskripsi_produk']?></p>
                        <form action="" method="POST" id="cartForm">
                            <div class="d-flex">
                                <input class="form-control text-center me-3" name="jumlah" value="1" id="inputQuantity" type="number" min="1" style="max-width: 3rem" max="<?php echo $detail['stok_produk']?>" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="beli" form="cartForm">
                                    <i class='bx bxs-cart me-1'></i>
                                    Add to cart
                                </button>
                            </div>
                        </form>

                        <?php 
                        if (isset($_POST["beli"])) {
                            $jumlah = $_POST["jumlah"];
                            // masukan ke keranjang 
                            $_SESSION['keranjang'][$id_produk] = $jumlah;
                            echo '<script>
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "Produk telah ditambahkan ke keranjang",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "keranjang.php";
                                });
                            </script>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <?php $ambil = $koneksi->query("SELECT * FROM produk");?>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php while ($perproduk = $ambil->fetch_assoc()){?>
                        <li class="splide__slide">
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="fotoProduk/<?php echo $perproduk['foto_produk'] ?>" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder fs-5"><?php echo $perproduk['nama_produk'] ?></h5>
                                            <!-- Product price-->
                                            Rp.<?php echo number_format($perproduk['harga_produk']) ?>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="beli.php?id=<?php echo $perproduk['id_produk'] ?>">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Initialize the Splide carousel -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splide', {
            perPage: 3,
            rewind: true,
            breakpoints: {
                768: {
                    perPage: 2
                },
                576: {
                    perPage: 1
                }
            }
        }).mount();
    });
</script>


</body>
</html>