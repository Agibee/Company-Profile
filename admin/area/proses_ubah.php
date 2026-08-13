<?php
include '../koneksi.php';

$id_area = intval($_POST['id_area']);
$nama_area = trim($_POST['nama_area']);

// Cek apakah nama_area sudah ada di area lain
$cek = mysqli_query($koneksi, "SELECT * FROM area WHERE nama_area = '$nama_area' AND id_area != '$id_area'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Data area \"$nama_area\" sudah ada!');
        window.location='?page=area/index';
    </script>";
    exit;
}

// Jika belum ada, lakukan update
$ubah = mysqli_query($koneksi, "UPDATE area SET nama_area = '$nama_area' WHERE id_area = '$id_area'");

if ($ubah) {
    echo "<script>
        alert('Data berhasil diubah'); 
        window.location='?page=area/index';
    </script>";
} else {
    $error = mysqli_error($koneksi);
    echo "<script>
        alert('Data gagal diubah! Error: $error');
        window.location='?page=area/index';
    </script>";
}
