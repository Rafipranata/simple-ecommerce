<?php

include "koneksi.php";
if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])){
    echo "<script>location = 'chekout.php'</script>";
}

else {
    echo "<script>location = 'index.php'</script>"; 
}

?>