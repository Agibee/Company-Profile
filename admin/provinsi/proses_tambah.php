<?php
$nama_provinsi = $_POST['nama_provinsi'];

$tambah = mysqli_query($koneksi, "INSERT INTO provinsi (nama_provinsi) VALUES ('$nama_provinsi')");

if ($tambah) {
    echo "<script>
    alert('Data Berhasil Ditambahkan'); 
    window.location = '?page=provinsi/index';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Ditambahkan');
     window.location = '?page=provinsi/index';
     </script>";
}
