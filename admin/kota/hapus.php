<?php
include '../koneksi.php';

$id_kota = intval($_GET['id_kota']); // aman dari SQL injection

// Cek apakah data kota ada
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kota WHERE id_kota='$id_kota'"));

if ($data) {
    // Hapus data kota
    $hapus = mysqli_query($koneksi, "DELETE FROM kota WHERE id_kota='$id_kota'");

    if ($hapus && mysqli_affected_rows($koneksi) > 0) {
        // Reset AUTO_INCREMENT supaya ID tetap urut
        $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_kota) AS max_id FROM kota"))['max_id'];
        $next_id = $max_id ? $max_id + 1 : 1;
        mysqli_query($koneksi, "ALTER TABLE kota AUTO_INCREMENT = $next_id");

        echo "<script>
                alert('Data kota berhasil dihapus!');
                window.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data kota!');
                window.location='index.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Data kota dengan ID $id_kota tidak ditemukan!');
            window.location='index.php';
          </script>";
}
