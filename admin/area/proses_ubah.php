<?php
$id_area = $_POST['id_area'];
$nama_area = $_POST['nama_area'];

$ubah = mysqli_query($koneksi, "UPDATE area SET 
nama_area = '$nama_area' WHERE id_area = '$id_area'");

if ($ubah) {
    echo "<script>
    alert('Data Berhasil Diubah'); 
    window.location = '?page=area/index';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Diubah');
     window.location = '?page=area/index';
     </script>";
}
