<?php
include "../koneksi.php";

// ==== AMBIL DATA DARI FORM ====
$nama_perusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
$alamat          = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$no_telp         = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
$email           = mysqli_real_escape_string($koneksi, $_POST['email']);

// ==== PROSES UPLOAD LOGO ====
$logo = "";
if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
    $originalName = basename($_FILES['logo']['name']);
    $tmpName      = $_FILES['logo']['tmp_name'];

    // Folder tujuan upload
    $targetDir = __DIR__ . '/../assets/img/kerjasama/';

    // Buat folder jika belum ada
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Pastikan folder bisa ditulis
    if (!is_writable($targetDir)) {
        echo "<script>alert('Folder tujuan tidak bisa ditulis!');history.back();</script>";
        exit;
    }

    // Cek ekstensi file
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($ext, $allowedExt)) {
        echo "<script>alert('Format logo harus JPG, JPEG, PNG, atau GIF!');history.back();</script>";
        exit;
    }

    // Cek ukuran file (maks 2MB)
    if ($_FILES['logo']['size'] > 2 * 1024 * 1024) {
        echo "<script>alert('Ukuran file maksimal 2MB!');history.back();</script>";
        exit;
    }

    // Nama file aman & unik
    $nameOnly = pathinfo($originalName, PATHINFO_FILENAME);
    $safeName = preg_replace('/[^A-Za-z0-9_-]/', '_', $nameOnly);
    $newFilename = $safeName . '_' . time() . '.' . $ext;

    // Path lengkap file tujuan
    $targetFile = $targetDir . $newFilename;

    // Pindahkan file ke folder tujuan
    if (move_uploaded_file($tmpName, $targetFile)) {
        $logo = $newFilename;
    } else {
        echo "<script>alert('Gagal memindahkan file logo!');history.back();</script>";
        exit;
    }
} else {
    $logo = ""; // Jika tidak upload logo
}

// ==== SIMPAN DATA KE DATABASE ====
$sql = mysqli_query($koneksi, "
    INSERT INTO kerjasama (nama_perusahaan, alamat, no_telp, email, logo)
    VALUES ('$nama_perusahaan', '$alamat', '$no_telp', '$email', '$logo')
");

// ==== FEEDBACK ====
if ($sql) {
    echo "<script>
        alert('Data perusahaan berhasil ditambahkan!');
        window.location='?page=kerjasama/index';
    </script>";
} else {
    echo "<script>
        alert('Gagal menambahkan data perusahaan!');
        window.location='?page=kerjasama/tambah';
    </script>";
}
