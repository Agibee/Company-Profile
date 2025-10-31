<?php
$id_promotor = $_GET['id_promotor'];

$query = "DELETE FROM promotor WHERE id_promotor='$id_promotor'";

if (mysqli_query($koneksi, $query)) {
  echo "<script>
            alert('Data promotor berhasil dihapus!');
            window.location.href='?page=promotor/index';
          </script>";
} else {
  echo "<script>
            alert('Gagal menghapus data promotor!');
            window.history.back();
          </script>";
}
