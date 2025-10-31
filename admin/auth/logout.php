<?php
// memulai session
session_start();
// menghapus semua session
session_destroy();

echo "<script>
    alert('Anda telah logout');
    window.location.href = 'login.php';
</script>";
