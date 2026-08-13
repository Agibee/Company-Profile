<?php
include '../koneksi.php'; // pastikan path sesuai

if (isset($_GET['id_client'])) {
  $id_client = intval($_GET['id_client']); // aman dari SQL injection

  // Cek apakah client ada
  $cek = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM clients WHERE id_client='$id_client'"));

  if ($cek) {
    // Hapus data client
    $hapus = mysqli_query($koneksi, "DELETE FROM clients WHERE id_client='$id_client'");

    if ($hapus && mysqli_affected_rows($koneksi) > 0) {
      // Reset AUTO_INCREMENT supaya ID tetap urut
      $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_client) AS max_id FROM clients"))['max_id'];
      $next_id = $max_id ? $max_id + 1 : 1;
      mysqli_query($koneksi, "ALTER TABLE clients AUTO_INCREMENT = $next_id");

      echo "<script>
                    alert('Data client berhasil dihapus!');
                    window.location.href='?page=clients/index';
                  </script>";
    } else {
      echo "<script>
                    alert('Gagal menghapus data client!');
                    window.history.back();
                  </script>";
    }
  } else {
    echo "<script>
                alert('Client dengan ID $id_client tidak ditemukan!');
                window.location.href='?page=clients/index';
              </script>";
  }
} else {
  echo "<script>
            alert('ID client tidak ditemukan!');
            window.location.href='?page=clients/index';
          </script>";
}
