<?php
$nama_area = $_POST['nama_area'];

$tambah = mysqli_query($koneksi, "INSERT INTO area (nama_area) VALUES ('$nama_area')");

if ($tambah) {
    echo "<script>
    alert('Data Berhasil Ditambahkan'); 
    window.location = '?page=area/index';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Ditambahkan');
     window.location = '?page=area/index';
     </script>";
}
