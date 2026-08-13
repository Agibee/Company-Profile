<?php
include '../koneksi.php';

if (isset($_GET['id_cabang'])) {
    $id_cabang = intval($_GET['id_cabang']); // Aman dari SQL injection

    // Cek apakah data cabang ada
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM cabang WHERE id_cabang='$id_cabang'"));

    if ($data) {
        // Hapus data cabang
        $hapus = mysqli_query($koneksi, "DELETE FROM cabang WHERE id_cabang='$id_cabang'");

        if ($hapus && mysqli_affected_rows($koneksi) > 0) {
            // Reset AUTO_INCREMENT supaya ID tetap urut
            $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_cabang) AS max_id FROM cabang"))['max_id'];
            $next_id = $max_id ? $max_id + 1 : 1;
            mysqli_query($koneksi, "ALTER TABLE cabang AUTO_INCREMENT = $next_id");

            echo "<script>
                alert('Cabang berhasil dihapus!');
                window.location.href='?page=cabang/index';
            </script>";
        } else {
            echo "<script>
                alert('Gagal menghapus cabang!');
                window.location.href='?page=cabang/index';
            </script>";
        }
    } else {
        echo "<script>
            alert('Cabang dengan ID $id_cabang tidak ditemukan!');
            window.location.href='?page=cabang/index';
        </script>";
    }
} else {
    echo "<script>
        alert('ID cabang tidak ditemukan!');
        window.location.href='?page=cabang/index';
    </script>";
}
