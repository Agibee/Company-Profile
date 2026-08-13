<?php
include '../koneksi.php';

$id_promotor = intval($_GET['id_promotor']); // aman dari SQL injection

// Cek apakah data promotor ada
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM promotor WHERE id_promotor='$id_promotor'"));

if ($data) {
  // Hapus data promotor
  $hapus = mysqli_query($koneksi, "DELETE FROM promotor WHERE id_promotor='$id_promotor'");

  if ($hapus && mysqli_affected_rows($koneksi) > 0) {
    // Reset AUTO_INCREMENT supaya ID tetap urut
    $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_promotor) AS max_id FROM promotor"))['max_id'];
    $next_id = $max_id ? $max_id + 1 : 1;
    mysqli_query($koneksi, "ALTER TABLE promotor AUTO_INCREMENT = $next_id");

    echo "<script>
                alert('Data promotor berhasil dihapus!');
                window.location.href='?page=promotor/index';
              </script>";
  } else {
    echo "<script>
                alert('Gagal menghapus data promotor!');
                window.location.href='?page=promotor/index';
              </script>";
  }
} else {
  echo "<script>
            alert('Data promotor dengan ID $id_promotor tidak ditemukan!');
            window.location.href='?page=promotor/index';
          </script>";
}
