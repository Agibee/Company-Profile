<?php
$id_provinsi = $_POST['id_provinsi'];
$nama_provinsi = $_POST['nama_provinsi'];

$ubah = mysqli_query($koneksi, "UPDATE provinsi SET 
nama_provinsi = '$nama_provinsi' WHERE id_provinsi = '$id_provinsi'");

if ($ubah) {
    echo "<script>
    alert('Data Berhasil Diubah'); 
    window.location = '?page=provinsi/index';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Diubah');
     window.location = '?page=provinsi/index';
     </script>";
}
