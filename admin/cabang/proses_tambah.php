<?php
$nama_cabang = $_POST['nama_cabang'];
$id_kota     = $_POST['id_kota'];
$alamat      = $_POST['alamat'];
$jam_buka    = $_POST['jam_buka'];
$jam_tutup   = $_POST['jam_tutup'];
$telepon     = $_POST['telepon'];
$lokasi      = $_POST['lokasi'];
$status      = $_POST['status'];

$query = mysqli_query($koneksi, "
    INSERT INTO cabang (nama_cabang, id_kota, alamat, jam_buka, jam_tutup, telepon, link_maps, status)
    VALUES ('$nama_cabang', '$id_kota', '$alamat', '$jam_buka', '$jam_tutup', '$telepon', '$lokasi', '$status')
");

if ($query) {
    echo "<script>
        alert('Data cabang berhasil ditambahkan!');
        window.location.href='?page=cabang/index';
    </script>";
}
