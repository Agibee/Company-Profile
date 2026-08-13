<?php
include "../koneksi.php";

// 1. Cek apakah parameter id_solver ada
if (!isset($_GET['id_solver'])) {
    echo "<script>
        alert('ID solver tidak ditemukan!');
        window.location='?page=solver/index';
    </script>";
    exit;
}

// 2. Ambil ID dan validasi angka
$id_solver = intval($_GET['id_solver']);
if ($id_solver <= 0) {
    echo "<script>
        alert('ID solver tidak valid!');
        window.location='?page=solver/index';
    </script>";
    exit;
}

// 3. Cek apakah data solver ada
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM solver WHERE id_solver='$id_solver'"));
if (!$data) {
    echo "<script>
        alert('Data solver dengan ID $id_solver tidak ditemukan!');
        window.location='?page=solver/index';
    </script>";
    exit;
}

// 4. Hapus file foto jika ada
if (!empty($data['foto'])) {
    $filePath = __DIR__ . '/../assets/img/solver/' . $data['foto'];
    if (file_exists($filePath)) unlink($filePath);
}

// 5. Hapus data dari database
$query = mysqli_query($koneksi, "DELETE FROM solver WHERE id_solver='$id_solver'");

if ($query && mysqli_affected_rows($koneksi) > 0) {
    // Reset AUTO_INCREMENT supaya ID tetap urut
    $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_solver) AS max_id FROM solver"))['max_id'];
    $next_id = $max_id ? $max_id + 1 : 1;
    mysqli_query($koneksi, "ALTER TABLE solver AUTO_INCREMENT = $next_id");

    echo "<script>
        alert('Data solver berhasil dihapus!');
        window.location='?page=solver/index';
    </script>";
} else {
    $error = mysqli_error($koneksi);
    echo "<script>
        alert('Gagal menghapus data solver! Error: $error');
        window.location='?page=solver/index';
    </script>";
}
