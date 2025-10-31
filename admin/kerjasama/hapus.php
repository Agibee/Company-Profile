<?php
include '../koneksi.php';
$id = $_GET['id_kerjasama'];

// hapus logo juga dari folder
$q = mysqli_query($koneksi, "SELECT logo FROM kerjasama WHERE id_kerjasama='$id'");
$data = mysqli_fetch_array($q);
if ($data['logo'] != '' && file_exists("../assets/img/kerjasama/" . $data['logo'])) {
    unlink("../assets/img/kerjasama/" . $data['logo']);
}

$del = mysqli_query($koneksi, "DELETE FROM kerjasama WHERE id_kerjasama='$id'");

if ($del) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location='?page=kerjasama/index';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data');
        window.location='?page=kerjasama/index';
    </script>";
}
