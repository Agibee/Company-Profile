<?php

$id_provinsi = intval($_POST['id_provinsi']);
$nama_kota   = mysqli_real_escape_string($koneksi, $_POST['nama_kota']);

//  Cek apakah kota sudah ada di provinsi ini
$cek = mysqli_query($koneksi, "
    SELECT * FROM kota 
    WHERE id_provinsi='$id_provinsi' AND nama_kota='$nama_kota'
");

if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Kota $nama_kota sudah terdaftar di provinsi ini!');
        window.location='?page=kota/tambah';
    </script>";
    exit;
}

// 2️Simpan ke database
$sql = mysqli_query($koneksi, "
    INSERT INTO kota (id_provinsi, nama_kota) 
    VALUES ('$id_provinsi', '$nama_kota')
");

// cek hasil insert
if ($sql) {
    echo "<script>
        alert('Data berhasil ditambahkan!');
        window.location='?page=kota/index';
    </script>";
} else {
    $error = mysqli_error($koneksi);
    echo "<script>
        alert('Gagal menambahkan data! Error: $error');
        window.location='?page=kota/tambah';
    </script>";
}
