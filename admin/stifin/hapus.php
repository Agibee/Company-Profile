<?php
include '../koneksi.php';

// 1. Ambil ID dan validasi angka
$id = intval($_GET['id']);
if ($id <= 0) {
    echo "<script>
        alert('ID tidak valid!');
        window.location='index.php';
    </script>";
    exit;
}

// 2. Cek apakah data ada
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM stifin WHERE id='$id'"));
if (!$data) {
    echo "<script>
        alert('Data dengan ID $id tidak ditemukan!');
        window.location='index.php';
    </script>";
    exit;
}

// 3. Hapus data
$hapus = mysqli_query($koneksi, "DELETE FROM stifin WHERE id='$id'");

if ($hapus && mysqli_affected_rows($koneksi) > 0) {
    // 4. Reset AUTO_INCREMENT
    $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id) AS max_id FROM stifin"))['max_id'];
    $next_id = $max_id ? $max_id + 1 : 1;
    mysqli_query($koneksi, "ALTER TABLE stifin AUTO_INCREMENT = $next_id");

    echo "<script>
        alert('Data berhasil dihapus!');
        window.location='index.php';
    </script>";
} else {
    $error = mysqli_error($koneksi);
    echo "<script>
        alert('Gagal menghapus data! Error: $error');
        window.location='index.php';
    </script>";
}
