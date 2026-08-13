<?php
$id_kota = $_POST['id_kota'];
$id_provinsi = $_POST['id_provinsi'];
$nama_kota = mysqli_real_escape_string($koneksi, $_POST['nama_kota']); // amanin karakter khusus

// Cek dulu apakah kombinasi provinsi + kota sudah ada, kecuali untuk ID yang sama
$cek = mysqli_query($koneksi, "
    SELECT * FROM kota 
    WHERE id_provinsi='$id_provinsi' AND nama_kota='$nama_kota' AND id_kota != '$id_kota'
");

if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Kota $nama_kota sudah terdaftar di provinsi ini!');
        window.location.href='?page=kota/edit&id_kota=$id_kota';
    </script>";
    exit;
}

// Update data
$sql = mysqli_query($koneksi, "
    UPDATE kota SET id_provinsi='$id_provinsi', nama_kota='$nama_kota' 
    WHERE id_kota='$id_kota'
");

if ($sql) {
    echo "<script>
        alert('Data berhasil diubah');
        window.location.href='?page=kota/index';
    </script>";
} else {
    $error = mysqli_error($koneksi);
    echo "<script>
        alert('Data tidak bisa diubah! Error: $error');
        window.location.href='?page=kota/edit&id_kota=$id_kota';
    </script>";
}
