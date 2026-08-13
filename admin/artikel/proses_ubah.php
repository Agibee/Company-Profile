<?php
include '../koneksi.php';

$id_artikel = intval($_POST['id_artikel']);
$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
$isi = $_POST['isi']; // HTML dari TinyMCE

// Ambil data lama
$dataLama = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel='$id_artikel'"));
$gambarLama = $dataLama['gambar'];
$folder = __DIR__ . '/../assets/img/artikel/';

// Proses upload gambar
if (!empty($_FILES['gambar']['name'])) {
  $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
  $newName = time() . '_' . preg_replace('/[^A-Za-z0-9]/', '_', pathinfo($_FILES['gambar']['name'], PATHINFO_FILENAME)) . '.' . $ext;

  if (move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $newName)) {
    // Hapus gambar lama
    if (!empty($gambarLama) && file_exists($folder . $gambarLama)) {
      unlink($folder . $gambarLama);
    }
    $gambarFinal = $newName;
  } else {
    $gambarFinal = $gambarLama;
  }
} else {
  $gambarFinal = $gambarLama;
}

// Update artikel
$sql = "UPDATE artikel SET 
            judul = '$judul',
            isi = '" . addslashes($isi) . "',
            gambar = '$gambarFinal',
            tanggal_update = NOW()
        WHERE id_artikel = $id_artikel";

if (mysqli_query($koneksi, $sql)) {
  echo "<script>
        alert('Artikel berhasil diperbarui!');
        window.location='?page=artikel/index';
    </script>";
} else {
  echo "<script>
        alert('Gagal memperbarui artikel!');
        history.back();
    </script>";
}
