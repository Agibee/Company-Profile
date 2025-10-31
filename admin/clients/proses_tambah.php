<?php
// Ambil data dari form
$nama_client = $_POST['nama_client'];
$id_promotor = $_POST['id_promotor'];
$id_cabang = $_POST['id_cabang'];
$tanggal_tes = $_POST['tanggal_tes'];
$hasil_stifin = $_POST['hasil_stifin'];
$catatan = $_POST['catatan'];

// Simpan data ke database
$query = mysqli_query($koneksi, "INSERT INTO clients (nama_client, id_promotor, id_cabang, tanggal_tes, hasil_stifin, catatan)
VALUES ('$nama_client', '$id_promotor', '$id_cabang', '$tanggal_tes', '$hasil_stifin', '$catatan')");

if ($query) {
    echo "<script>
        alert('Data client berhasil ditambahkan!');
        window.location.href='?page=clients/index';
    </script>";
} else {
    echo "<script>
        alert('Data client gagal ditambahkan!');
        window.location.href='?page=clients/index';
    </script>";
}
