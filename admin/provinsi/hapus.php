<?php
include "../koneksi.php";

if (!isset($_GET['id_provinsi'])) {
    echo "<script>
        alert('ID provinsi tidak ditemukan!');
        window.location='?page=provinsi/index';
    </script>";
    exit;
}

$id_provinsi = $_GET['id_provinsi'];

// Cek dulu apakah ID valid (harus angka)
if (!ctype_digit($id_provinsi)) {
    echo "<script>
        alert('ID provinsi tidak valid!');
        window.location='?page=provinsi/index';
    </script>";
    exit;
}

// Hapus data dari database
$query = mysqli_query($koneksi, "DELETE FROM provinsi WHERE id_provinsi='$id_provinsi'");

if ($query) {
    echo "<script>
        alert('Data provinsi berhasil dihapus!');
        window.location='?page=provinsi/index';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data provinsi!');
        window.location='?page=provinsi/index';
    </script>";
}
