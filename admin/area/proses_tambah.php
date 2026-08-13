<?php
include '../koneksi.php';

$nama_area = trim($_POST['nama_area']);

// Cek apakah nama_area sudah ada
$cek = mysqli_query($koneksi, "SELECT * FROM area WHERE nama_area = '$nama_area'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Data area \"$nama_area\" sudah ada!');
        window.location='?page=area/index';
    </script>";
    exit;
}

// Jika belum ada, lakukan insert
$tambah = mysqli_query($koneksi, "INSERT INTO area (nama_area) VALUES ('$nama_area')");

if ($tambah) {
    echo "<script>
        alert('Data berhasil ditambahkan'); 
        window.location='?page=area/index';
    </script>";
} else {
    $error = mysqli_error($koneksi);
    echo "<script>
        alert('Data gagal ditambahkan! Error: $error');
        window.location='?page=area/index';
    </script>";
}
