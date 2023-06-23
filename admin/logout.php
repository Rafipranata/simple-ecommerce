<?php
session_destroy();
echo '<script>
    Swal.fire({
        title: "Berhasil Logout",
        icon: "success"
    }).then(function() {
        window.location = "login.php";
    });
</script>';





?>