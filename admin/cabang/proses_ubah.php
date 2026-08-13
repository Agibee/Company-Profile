<?php

$id_cabang   = intval($_POST['id_cabang']);
$nama_cabang = mysqli_real_escape_string($koneksi, $_POST['nama_cabang']);
$id_kota     = intval($_POST['id_kota']);
$alamat      = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$jam_buka    = $_POST['jam_buka'];
$jam_tutup   = $_POST['jam_tutup'];
$telepon     = mysqli_real_escape_string($koneksi, $_POST['telepon']);
$lokasi      = mysqli_real_escape_string($koneksi, $_POST['link_maps']);
$status      = mysqli_real_escape_string($koneksi, $_POST['status']);

// Cek apakah ada cabang lain dengan nama yang sama di kota yang sama
$cek = mysqli_query($koneksi, "
    SELECT * FROM cabang 
    WHERE nama_cabang='$nama_cabang' AND id_kota='$id_kota' AND id_cabang != '$id_cabang'
");

if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Data cabang dengan nama yang sama sudah ada di kota ini!');
        window.location.href='?page=cabang/index';
    </script>";
    exit;
}

//  Update data
$sql = mysqli_query($koneksi, "
    UPDATE cabang SET 
        nama_cabang = '$nama_cabang',
        id_kota = '$id_kota',
        alamat = '$alamat',
        jam_buka = '$jam_buka',
        jam_tutup = '$jam_tutup',
        telepon = '$telepon',
        link_maps = '$lokasi',
        status = '$status'
    WHERE id_cabang = '$id_cabang'
");

if ($sql) {
    echo "<script>
        alert('Data berhasil diubah!');
        window.location.href='?page=cabang/index';
    </script>";
} else {
    $error = mysqli_error($koneksi);
    echo "<script>
        alert('Gagal mengubah data! Error: $error');
        window.history.back();
    </script>";
}
