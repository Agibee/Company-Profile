<?php
$id_kota = $_POST['id_kota'];
$id_provinsi = $_POST['id_provinsi'];
$nama_kota = $_POST['nama_kota'];

$sql = mysqli_query($koneksi, "UPDATE kota SET id_provinsi='$id_provinsi', nama_kota='$nama_kota' 
WHERE id_kota='$id_kota'");

if ($sql) {
    echo "<script>
        alert('Data berhasil diubah');
        window.location.href='?page=kota/index';
        </script>";
} else {
    echo "<script>
        alert('Data tidak bisa diubah');
        window.location.href='?page=kota/edit&id_kota=$id_kota';
        </script>";
}
