<?php
include '../koneksi.php';

$id_artikel = $_POST['id_artikel'];
$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
$isi = mysqli_real_escape_string($koneksi, $_POST['isi']);

$dataLama = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel='$id_artikel'"));
$gambarLama = $dataLama['gambar'];
$folder = __DIR__ . '/../assets/img/artikel/';

if (!empty($_FILES['gambar']['name'])) {
  $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
  $newName = time() . '_' . preg_replace('/[^A-Za-z0-9]/', '_', $_FILES['gambar']['name']);
  move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $newName);

  if (file_exists($folder . $gambarLama)) unlink($folder . $gambarLama);
  $gambarFinal = $newName;
} else {
  $gambarFinal = $gambarLama;
}

$update = mysqli_query($koneksi, "
    UPDATE artikel SET 
        judul='$judul',
        isi='$isi',
        gambar='$gambarFinal',
        tanggal_update=NOW()
    WHERE id_artikel='$id_artikel'
");

if ($update) {
  echo "<script>
  alert('Artikel berhasil diperbarui!');
  window.location='?page=artikel/index';
  </script>";
} else {
  echo "<script>
  alert('Gagal memperbarui artikel!')
  ;history.back();
  </script>";
}
