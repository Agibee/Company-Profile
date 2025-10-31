<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    echo "<script>
        alert('Silahkan login terlebih dahulu');
        window.location.href = 'auth/login.php';
    </script>";
}

include "koneksi.php";
include "layout/header.php";
include "layout/sidebar.php";
include "content.php";
include "layout/footer.php";
    