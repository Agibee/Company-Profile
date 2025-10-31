<?php
include '../koneksi.php';
$id_kota = $_GET['id_kota'];

$hapus = mysqli_query($koneksi, "DELETE FROM kota WHERE id_kota='$id_kota'");

if ($hapus) {
    echo "<script>
    alert('Data Berhasil Dihapus');
    window.location='index.php';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Dihapus');
    window.location='index.php';
    </script>";
}
