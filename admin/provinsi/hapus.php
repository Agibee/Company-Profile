<?php
include "../koneksi.php";

// 1. Cek apakah parameter id_provinsi ada
if (!isset($_GET['id_provinsi'])) {
    echo "<script>
        alert('ID provinsi tidak ditemukan!');
        window.location='?page=provinsi/index';
    </script>";
    exit;
}

// 2. Ambil ID dan validasi angka
$id_provinsi = intval($_GET['id_provinsi']);
if ($id_provinsi <= 0) {
    echo "<script>
        alert('ID provinsi tidak valid!');
        window.location='?page=provinsi/index';
    </script>";
    exit;
}

// 3. Cek apakah provinsi ada di database
$provinsi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM provinsi WHERE id_provinsi='$id_provinsi'"));
if (!$provinsi) {
    echo "<script>
        alert('Provinsi dengan ID $id_provinsi tidak ditemukan!');
        window.location='?page=provinsi/index';
    </script>";
    exit;
}

// 4. Cek apakah ada kota terkait
$cek = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM kota WHERE id_provinsi='$id_provinsi'"));
if ($cek['jumlah'] > 0) {
    echo "<script>
        alert('Provinsi ini tidak bisa dihapus! Masih ada $cek[jumlah] kota terkait.');
        window.location='?page=provinsi/index';
    </script>";
    exit;
}

// 5. Hapus provinsi
$query = mysqli_query($koneksi, "DELETE FROM provinsi WHERE id_provinsi='$id_provinsi'");

// 6. Cek hasil hapus
if ($query && mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
        alert('Data provinsi berhasil dihapus!');
        window.location='?page=provinsi/index';
    </script>";
} else {
    $error = mysqli_error($koneksi);
    echo "<script>
        alert('Gagal menghapus provinsi! Error: $error');
        window.location='?page=provinsi/index';
    </script>";
}
