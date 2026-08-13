<?php
include '../koneksi.php';

$id_area = intval($_GET['id_area']); // Aman dari SQL injection

// Cek apakah data ada
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM area WHERE id_area='$id_area'"));

if ($data) {
    // Hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM area WHERE id_area='$id_area'");

    if ($hapus && mysqli_affected_rows($koneksi) > 0) {
        // Reset AUTO_INCREMENT supaya urut lagi
        $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_area) AS max_id FROM area"))['max_id'];
        $next_id = $max_id ? $max_id + 1 : 1;
        mysqli_query($koneksi, "ALTER TABLE area AUTO_INCREMENT = $next_id");

        echo "<script>
            alert('Data area berhasil dihapus!');
            window.location.href='?page=area/index';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data area!');
            window.location.href='?page=area/index';
        </script>";
    }
} else {
    echo "<script>
        alert('Data area dengan ID $id_area tidak ditemukan!');
        window.location.href='?page=area/index';
    </script>";
}
