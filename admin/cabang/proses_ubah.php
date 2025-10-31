<?php
$id_cabang = $_POST['id_cabang'];
$nama_cabang = $_POST['nama_cabang'];
$id_kota = $_POST['id_kota'];
$alamat = $_POST['alamat'];
$jam_buka = $_POST['jam_buka'];
$jam_tutup = $_POST['jam_tutup'];
$telepon = $_POST['telepon'];
$lokasi = $_POST['link_maps'];
$status = $_POST['status'];

$sql = mysqli_query($koneksi, "UPDATE cabang SET 
    nama_cabang = '$nama_cabang',
    id_kota = '$id_kota',
    alamat = '$alamat',
    jam_buka = '$jam_buka',
    jam_tutup = '$jam_tutup',
    telepon = '$telepon',
    link_maps = '$lokasi',
    status = '$status'
WHERE id_cabang = '$id_cabang'");

if ($sql) {
    echo "<script>
    alert('Data berhasil diubah!');
    window.location.href='?page=cabang/index';
    </script>";
} else {
    echo "<script>
    alert('Gagal mengubah data!');
    window.history.back();
    </script>";
}
