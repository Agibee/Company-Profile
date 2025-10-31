<?php
include '../koneksi.php';

// Ambil data dari form
$id         = $_POST['id'];
$tipe       = mysqli_real_escape_string($koneksi, $_POST['tipe']);
$judul      = mysqli_real_escape_string($koneksi, $_POST['judul']);
$deskripsi  = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

// Ambil data lama (untuk hapus gambar lama jika diganti)
$result = mysqli_query($koneksi, "SELECT gambar FROM konsep_stifin WHERE id='$id'");
if (mysqli_num_rows($result) === 0) {
    echo "<script>alert('Data tidak ditemukan!');window.location='?page=stifin/index';</script>";
    exit;
}
$dataLama = mysqli_fetch_assoc($result);
$gambarLama = $dataLama['gambar'] ?? '';

$updateGambar = ""; // default: tidak update gambar

// ==== PROSES UPLOAD GAMBAR BARU (jika ada) ====
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $originalName = basename($_FILES['gambar']['name']);
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Tentukan folder tujuan
    $targetDir = realpath(__DIR__ . '/../assets/img/stifin/');
    if (!$targetDir) {
        $targetDir = __DIR__ . '/../assets/img/stifin/';
        mkdir($targetDir, 0755, true);
    } else {
        $targetDir .= '/';
    }

    // Validasi ekstensi file
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($ext, $allowedExt)) {
        echo "<script>alert('Format gambar tidak valid! (hanya JPG, JPEG, PNG, GIF)');history.back();</script>";
        exit;
    }

    // Nama file unik
    $safeName = preg_replace('/[^A-Za-z0-9_-]/', '_', pathinfo($originalName, PATHINFO_FILENAME));
    $newFilename = $safeName . '_' . time() . '.' . $ext;
    $targetFile = $targetDir . $newFilename;

    // Pindahkan file
    if (move_uploaded_file($tmpName, $targetFile)) {
        // Hapus gambar lama jika ada
        if (!empty($gambarLama) && file_exists($targetDir . $gambarLama)) {
            unlink($targetDir . $gambarLama);
        }
        $updateGambar = ", gambar='$newFilename'";
    } else {
        echo "<script>alert('Gagal mengupload gambar baru!');history.back();</script>";
        exit;
    }
}

// ==== UPDATE DATA KE DATABASE ====
$sql = mysqli_query($koneksi, "
    UPDATE konsep_stifin 
    SET tipe='$tipe',
        judul='$judul',
        deskripsi='$deskripsi'
        $updateGambar
    WHERE id='$id'
");

// ==== CEK HASIL ====
if ($sql) {
    echo "<script>
        alert('Data berhasil diubah!');
        window.location='?page=stifin/index';
    </script>";
} else {
    echo "<script>
        alert('Gagal mengubah data!');
        window.location='?page=stifin/ubah&id=$id';
    </script>";
}
