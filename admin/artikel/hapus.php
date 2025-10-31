<?php
include '../koneksi.php';
$id = $_GET['id_artikel'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel='$id'"));
$file = __DIR__ . '/../assets/img/artikel/' . $data['gambar'];

if (file_exists($file)) unlink($file);

$hapus = mysqli_query($koneksi, "DELETE FROM artikel WHERE id_artikel='$id'");

if ($hapus) {
  echo "<script>alert('Artikel berhasil dihapus!');window.location='?page=artikel/index';</script>";
} else {
  echo "<script>alert('Gagal menghapus artikel!');history.back();</script>";
}
