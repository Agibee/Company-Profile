<?php
$nama_cabang = mysqli_real_escape_string($koneksi, $_POST['nama_cabang']);
$id_kota     = intval($_POST['id_kota']);
$alamat      = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$jam_buka    = $_POST['jam_buka'];
$jam_tutup   = $_POST['jam_tutup'];
$telepon     = mysqli_real_escape_string($koneksi, $_POST['telepon']);
$lokasi      = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
$status      = mysqli_real_escape_string($koneksi, $_POST['status']);

//  Cek apakah data cabang sudah ada di kota yang sama
$cek = mysqli_query($koneksi, "
    SELECT * FROM cabang 
    WHERE nama_cabang='$nama_cabang' AND id_kota='$id_kota'
");

if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Data cabang dengan nama yang sama sudah ada di kota ini!');
        window.location.href='?page=cabang/index';
    </script>";
    exit;
}

//  Jika belum ada, insert data
$query = mysqli_query($koneksi, "
    INSERT INTO cabang (nama_cabang, id_kota, alamat, jam_buka, jam_tutup, telepon, link_maps, status)
    VALUES ('$nama_cabang', '$id_kota', '$alamat', '$jam_buka', '$jam_tutup', '$telepon', '$lokasi', '$status')
");

if ($query) {
    echo "<script>
        alert('Data cabang berhasil ditambahkan!');
        window.location.href='?page=cabang/index';
    </script>";
} else {
    $error = mysqli_error($koneksi);
    echo "<script>
        alert('Gagal menambahkan data cabang! Error: $error');
        window.location.href='?page=cabang/index';
    </script>";
}
