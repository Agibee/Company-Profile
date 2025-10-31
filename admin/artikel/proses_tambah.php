<?php
include "../koneksi.php";

$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
$isi   = mysqli_real_escape_string($koneksi, $_POST['isi']);

$gambar = "";
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($ext, $allowed)) {
        echo "<script>alert('Format gambar tidak valid!');history.back();</script>";
        exit;
    }

    $newName = time() . '_' . preg_replace('/[^A-Za-z0-9]/', '_', $_FILES['gambar']['name']);
    $targetDir = __DIR__ . '/../assets/img/artikel/';
    if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);
    move_uploaded_file($_FILES['gambar']['tmp_name'], $targetDir . $newName);
    $gambar = $newName;
} else {
    echo "<script>alert('Gambar wajib diunggah!');history.back();</script>";
    exit;
}

$sql = mysqli_query($koneksi, "
    INSERT INTO artikel (judul, isi, gambar, tanggal_upload, tanggal_update)
    VALUES ('$judul', '$isi', '$gambar', NOW(), NOW())
");

if ($sql) {
    echo "<script>alert('Artikel berhasil ditambahkan!');window.location='?page=artikel/index';</script>";
} else {
    echo "<script>alert('Gagal menambah artikel!');history.back();</script>";
}
