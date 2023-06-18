<?php
include 'koneksi.php';
session_destroy();
echo "<script> alert('Anda Berhasil Logout') </script>";
echo "<script>location ='index.php' </script>";



?>