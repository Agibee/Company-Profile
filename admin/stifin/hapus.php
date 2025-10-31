    <?php
    include '../koneksi.php';
    $id_kota = $_GET['id'];

    $hapus = mysqli_query($koneksi, "DELETE FROM stifin WHERE id='$id'");

    if ($hapus) {
        echo "<script>
        alert('Data Berhasil Dihapus');
        window.location='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Dihapus');
        window.location='index.php';
        </script>";
    }
