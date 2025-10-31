<?php
include "../koneksi.php";

if (!isset($_GET['id_solver'])) {
    echo "<script>
        alert('ID solver tidak ditemukan!');
        window.location='?page=solver/index';
    </script>";
    exit;
}

$id_solver = $_GET['id_solver'];

// Ambil data solver dulu buat hapus file fotonya
$sql = mysqli_query($koneksi, "SELECT foto FROM solver WHERE id_solver='$id_solver'");
$data = mysqli_fetch_array($sql);
$foto = $data['foto'];

// Hapus file foto jika ada
if (!empty($foto)) {
    $filePath = __DIR__ . '/../assets/img/solver/' . $foto;
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

// Hapus data dari database
$query = mysqli_query($koneksi, "DELETE FROM solver WHERE id_solver='$id_solver'");

if ($query) {
    echo "<script>
        alert('Data solver berhasil dihapus!');
        window.location='?page=solver/index';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data solver!');
        window.location='?page=solver/index';
    </script>";
}
