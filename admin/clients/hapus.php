<?php
// Cek apakah ada parameter id_client
if (isset($_GET['id_client'])) {
    $id_client = $_GET['id_client'];

    // Hapus data client dari database
    $query = "DELETE FROM clients WHERE id_client='$id_client'";
    if (mysqli_query($koneksi, $query)) {
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
    // Jika id_client tidak ada, kembali ke index
    echo "<script>
            alert('ID client tidak ditemukan!');
            window.location.href='?page=clients/index';
          </script>";
}
