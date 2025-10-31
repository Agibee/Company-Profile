<?php
include '../koneksi.php';

// Ambil data dari form
$tipe      = mysqli_real_escape_string($koneksi, $_POST['tipe']);
$judul     = mysqli_real_escape_string($koneksi, $_POST['judul']);
$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

// Siapkan variabel gambar
$gambar = "";

// === PROSES UPLOAD GAMBAR ===
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $namaFile   = $_FILES['gambar']['name'];
    $tmpFile    = $_FILES['gambar']['tmp_name'];

    // Gunakan __DIR__ untuk path absolut, agar tidak salah arah
    $folder     = __DIR__ . '/../assets/img/stifin/';

    // Buat folder jika belum ada
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }

    // Bersihkan nama file
    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $nameOnly = pathinfo($namaFile, PATHINFO_FILENAME);
    $safeName = preg_replace('/[^A-Za-z0-9_-]/', '_', $nameOnly);
    $namaBaru = $safeName . '_' . time() . '.' . $ext;

    // Pindahkan file
    if (move_uploaded_file($tmpFile, $folder . $namaBaru)) {
        $gambar = $namaBaru;
    } else {
        echo "<script>alert('❌ Gagal memindahkan file ke folder tujuan.');history.back();</script>";
        exit;
    }
} else {
    $gambar = ""; // Jika tidak upload gambar
}

// === SIMPAN KE DATABASE ===
$sql = mysqli_query($koneksi, "
    INSERT INTO konsep_stifin (tipe, judul, deskripsi, gambar)
    VALUES ('$tipe', '$judul', '$deskripsi', '$gambar')
");

if ($sql) {
    echo "<script>
        alert(' Data berhasil ditambahkan!');
        window.location='?page=stifin/index';
    </script>";
} else {
    echo "<script>
        alert(' Gagal menambahkan data ke database!');
        window.location='?page=stifin/tambah';
    </script>";
}
