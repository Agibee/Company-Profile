<?php
include "../koneksi.php";

$id_trainer = $_POST['id_trainer'];
$nama       = $_POST['nama'];
$jabatan    = $_POST['jabatan'];
$bidang     = $_POST['bidang'];
$deskripsi  = $_POST['deskripsi'];
$foto       = $_FILES['foto']['name'];
$tmpName    = $_FILES['foto']['tmp_name'];

// Ambil data lama (buat hapus foto lama kalau diganti)
$s = "SELECT * FROM trainer WHERE id_trainer='$id_trainer'";
$sql = mysqli_query($koneksi, $s);
$datalama = mysqli_fetch_array($sql);
$fotolama = $datalama['foto'];

// Kalau ada foto baru diupload
if (!empty($foto)) {
    $target = __DIR__ . '/../assets/img/trainer/' . $foto;
    if (move_uploaded_file($tmpName, $target)) {
        if (!empty($fotolama) && file_exists(__DIR__ . '/../assets/img/trainer/' . $fotolama)) {
            unlink(__DIR__ . '/../assets/img/trainer/' . $fotolama);
        }
    } else {
        echo "<script>
        alert('Gagal upload foto baru!');
        window.location='?page=trainer/index';
        </script>";
        exit;
    }
} else {
    $foto = $fotolama;
}

// Update data ke database
$ubah = mysqli_query($koneksi, "
    UPDATE trainer SET 
        nama='$nama',
        jabatan='$jabatan',
        bidang='$bidang',
        deskripsi='$deskripsi',
        foto='$foto'
    WHERE id_trainer='$id_trainer'
");

if ($ubah) {
    echo "<script>
    alert('Data trainer berhasil diubah!');
    window.location='?page=trainer/index';
    </script>";
} else {
    echo "<script>
    alert('Data trainer gagal diubah!');
    window.location='?page=trainer/index';
    </script>";
}
