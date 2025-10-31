<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_client = $_POST['id_client'];
    $nama_client = $_POST['nama_client'];
    $id_promotor = $_POST['id_promotor'];
    $id_cabang = $_POST['id_cabang'];
    $tanggal_tes = $_POST['tanggal_tes'];
    $hasil_stifin = $_POST['hasil_stifin'];
    $catatan = $_POST['catatan'];

    $query = "UPDATE clients SET 
                nama_client='$nama_client',
                id_promotor='$id_promotor',
                id_cabang='$id_cabang',
                tanggal_tes='$tanggal_tes',
                hasil_stifin='$hasil_stifin',
                catatan='$catatan'
              WHERE id_client='$id_client'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data client berhasil diupdate!');
                window.location.href='?page=clients/index';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengupdate data client!');
                window.history.back();
              </script>";
    }
}
