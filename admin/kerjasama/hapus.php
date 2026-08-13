<?php
include '../koneksi.php';

$id_kerjasama = intval($_GET['id_kerjasama']); // aman dari SQL injection

// Cek apakah data ada
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kerjasama WHERE id_kerjasama='$id_kerjasama'"));

if ($data) {
    // Hapus file logo jika ada
    $file = __DIR__ . '/../assets/img/kerjasama/' . $data['logo'];
    if (!empty($data['logo']) && file_exists($file)) {
        unlink($file);
    }

    // Hapus data dari database
    $hapus = mysqli_query($koneksi, "DELETE FROM kerjasama WHERE id_kerjasama='$id_kerjasama'");

    if ($hapus && mysqli_affected_rows($koneksi) > 0) {
        // Reset AUTO_INCREMENT supaya ID tetap urut
        $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_kerjasama) AS max_id FROM kerjasama"))['max_id'];
        $next_id = $max_id ? $max_id + 1 : 1;
        mysqli_query($koneksi, "ALTER TABLE kerjasama AUTO_INCREMENT = $next_id");

        echo "<script>
                alert('Data kerjasama berhasil dihapus!');
                window.location='?page=kerjasama/index';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data kerjasama!');
                window.location='?page=kerjasama/index';
              </script>";
    }
} else {
    echo "<script>
            alert('Data kerjasama dengan ID $id_kerjasama tidak ditemukan!');
            window.location='?page=kerjasama/index';
          </script>";
}
