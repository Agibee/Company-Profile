<?php
include '../koneksi.php';

if (isset($_GET['hapus'])) {
    $id_trainer = intval($_GET['hapus']); // Aman dari SQL injection

    // Cek apakah data trainer ada
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM trainer WHERE id_trainer='$id_trainer'"));

    if ($data) {
        // Hapus file foto jika ada
        $file = __DIR__ . '/../admin/image/' . $data['foto'];
        if (!empty($data['foto']) && file_exists($file)) {
            unlink($file);
        }

        // Hapus data di database
        $hapus = mysqli_query($koneksi, "DELETE FROM trainer WHERE id_trainer='$id_trainer'");

        if ($hapus && mysqli_affected_rows($koneksi) > 0) {
            // Reset AUTO_INCREMENT supaya ID tetap urut
            $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_trainer) AS max_id FROM trainer"))['max_id'];
            $next_id = $max_id ? $max_id + 1 : 1;
            mysqli_query($koneksi, "ALTER TABLE trainer AUTO_INCREMENT = $next_id");

            echo "<script>
                alert('Trainer berhasil dihapus!');
                window.location.href='?page=trainer/index';
            </script>";
        } else {
            echo "<script>
                alert('Gagal menghapus trainer!');
                window.location.href='?page=trainer/index';
            </script>";
        }
    } else {
        echo "<script>
            alert('Trainer dengan ID $id_trainer tidak ditemukan!');
            window.location.href='?page=trainer/index';
        </script>";
    }
} else {
    echo "<script>
        alert('ID trainer tidak ditemukan!');
        window.location.href='?page=trainer/index';
    </script>";
}
