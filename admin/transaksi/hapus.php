<?php
include "koneksi.php";

$id_transaksi = $_GET['id_transaksi'];

// Hapus data transaksi
mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");

echo "<script>
    alert('Transaksi berhasil dihapus');
    window.location='?page=transaksi/index';
</script>";
