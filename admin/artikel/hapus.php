<?php
include '../koneksi.php';

$id_artikel = intval($_GET['id_artikel']); // Aman dari SQL injection

// Cek apakah artikel ada
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel='$id_artikel'"));

if ($data) {
  // Hapus file gambar jika ada
  $file = __DIR__ . '/../assets/img/artikel/' . $data['gambar'];
  if (file_exists($file)) unlink($file);

  // Hapus data di database
  $hapus = mysqli_query($koneksi, "DELETE FROM artikel WHERE id_artikel='$id_artikel'");

  if ($hapus && mysqli_affected_rows($koneksi) > 0) {
    // Reset AUTO_INCREMENT supaya ID tetap urut
    $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_artikel) AS max_id FROM artikel"))['max_id'];
    $next_id = $max_id ? $max_id + 1 : 1;
    mysqli_query($koneksi, "ALTER TABLE artikel AUTO_INCREMENT = $next_id");

    echo "<script>
            alert('Artikel berhasil dihapus!');
            window.location.href='?page=artikel/index';
        </script>";
  } else {
    echo "<script>
            alert('Gagal menghapus artikel!');
            window.location.href='?page=artikel/index';
        </script>";
  }
} else {
  echo "<script>
        alert('Artikel dengan ID $id_artikel tidak ditemukan!');
        window.location.href='?page=artikel/index';
    </script>";
}
