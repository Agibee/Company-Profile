<?php
include "koneksi.php";

if (isset($_POST['status_bayar'])) {
    foreach ($_POST['status_bayar'] as $id_transaksi => $status) {
        mysqli_query($koneksi, "UPDATE transaksi SET status_bayar='$status' 
        WHERE id_transaksi='$id_transaksi'");
    }
    echo "<script>
        alert('Perubahan status berhasil disimpan');
        window.location='?page=transaksi/index';
    </script>";
} else {
    echo "<script>
        alert('Tidak ada perubahan status yang dikirim');
        window.location='?page=transaksi/index';
    </script>";
}
