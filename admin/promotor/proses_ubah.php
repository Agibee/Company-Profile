<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_promotor = $_POST['id_promotor'];
    $nama_promotor = $_POST['nama_promotor'];
    $id_area = $_POST['id_area'];
    $no_telepon = $_POST['no_telepon'];

    $query = "UPDATE promotor SET 
                nama_promotor='$nama_promotor', 
                id_area='$id_area', 
                no_telepon='$no_telepon'
              WHERE id_promotor='$id_promotor'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data promotor berhasil diupdate!');
                window.location.href='?page=promotor/index';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengupdate data promotor!');
                window.history.back();
              </script>";
    }
}
