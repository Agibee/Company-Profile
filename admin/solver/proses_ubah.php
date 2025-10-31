<?php
include "../koneksi.php";

$id_solver = $_POST['id_solver'];
$nama       = $_POST['nama'];
$jabatan    = $_POST['jabatan'];
$bidang     = $_POST['bidang'];
$deskripsi  = $_POST['deskripsi'];
$foto       = $_FILES['foto']['name'];
$tmpName    = $_FILES['foto']['tmp_name'];

// Ambil data lama (buat hapus foto lama kalau diganti)
$s = "SELECT * FROM solver WHERE id_solver='$id_solver'";
$sql = mysqli_query($koneksi, $s);
$datalama = mysqli_fetch_array($sql);
$fotolama = $datalama['foto'];

// Kalau ada foto baru diupload
if (!empty($foto)) {
    $target = __DIR__ . '/../assets/img/solver/' . $foto;
    if (move_uploaded_file($tmpName, $target)) {
        if (!empty($fotolama) && file_exists(__DIR__ . '/../assets/img/solver/' . $fotolama)) {
            unlink(__DIR__ . '/../assets/img/solver/' . $fotolama);
        }
    } else {
        echo "<script>
        alert('Gagal upload foto baru!');
        window.location='?page=solver/index';
        </script>";
        exit;
    }
} else {
    $foto = $fotolama;
}

// Update data ke database
$ubah = mysqli_query($koneksi, "
    UPDATE solver SET 
        nama='$nama',
        jabatan='$jabatan',
        bidang='$bidang',
        deskripsi='$deskripsi',
        foto='$foto'
    WHERE id_solver='$id_solver'
");

if ($ubah) {
    echo "<script>
    alert('Data solver berhasil diubah!');
    window.location='?page=solver/index';
    </script>";
} else {
    echo "<script>
    alert('Data solver gagal diubah!');
    window.location='?page=solver/index';
    </script>";
}
