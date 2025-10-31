<?php
include '../koneksi.php'; // pastikan path sesuai

$id_provinsi = $_POST['id_provinsi'];
$nama_kota   = $_POST['nama_kota'];

// simpan ke database
$sql = mysqli_query($koneksi, "INSERT INTO kota (id_provinsi, nama_kota) VALUES ('$id_provinsi', '$nama_kota')");

// jika berhasil
if ($sql) {
    echo "<script>
        alert('Data Berhasil Ditambahkan');
        window.location='?page=kota/index';
    </script>";
} else {
    echo "<script>
        alert('Data Gagal Ditambahkan');
        window.location='?page=kota/tambah';
    </script>";
}
