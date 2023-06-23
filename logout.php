<?php
include 'koneksi.php';
session_destroy();
echo '<script>
    Swal.fire({
        title: "Logout Berhasil",
        icon: "success"
    }).then(function() {
        window.location = "index.php";
    });
</script>';

?>