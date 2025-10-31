<?php
include "../koneksi.php";

if (!isset($_GET['id_trainer'])) {
    echo "<script>
        alert('ID trainer tidak ditemukan!');
        window.location='?page=trainer/index';
    </script>";
    exit;
}

$id_trainer = $_GET['id_trainer'];

// Ambil data trainer dulu buat hapus file fotonya
$sql = mysqli_query($koneksi, "SELECT foto FROM trainer WHERE id_trainer='$id_trainer'");
$data = mysqli_fetch_array($sql);
$foto = $data['foto'];

// Hapus file foto jika ada
if (!empty($foto)) {
    $filePath = __DIR__ . '/../assets/img/trainer/' . $foto;
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

// Hapus data dari database
$query = mysqli_query($koneksi, "DELETE FROM trainer WHERE id_trainer='$id_trainer'");

if ($query) {
    echo "<script>
        alert('Data trainer berhasil dihapus!');
        window.location='?page=trainer/index';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data trainer!');
        window.location='?page=trainer/index';
    </script>";
}
