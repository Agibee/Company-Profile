<?php
include "../koneksi.php";

$nama       = $_POST['nama'];
$jabatan    = $_POST['jabatan'];
$bidang     = $_POST['bidang'];
$deskripsi  = $_POST['deskripsi'];

// ==== PROSES UPLOAD FOTO ====
$foto = "";
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $originalName = basename($_FILES['foto']['name']);
    $tmpName = $_FILES['foto']['tmp_name'];

    $targetDir = __DIR__ . '/../assets/img/solver/';

    // Buat folder jika belum ada
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Pastikan bisa ditulis
    if (!is_writable($targetDir)) {
        echo "Upload directory not writable.";
        exit;
    }

    // Nama file unik & aman
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $nameOnly = pathinfo($originalName, PATHINFO_FILENAME);
    $safeName = preg_replace('/[^A-Za-z0-9_-]/', '_', $nameOnly);
    $newFilename = $safeName . '_' . time() . '.' . $ext;

    $targetFile = $targetDir . $newFilename;

    if (move_uploaded_file($tmpName, $targetFile)) {
        $foto = $newFilename;
    } else {
        echo "Gagal memindahkan file foto.";
        exit;
    }
} else {
    $foto = ""; // jika tidak upload
}

// ==== SIMPAN KE DATABASE ====
$query = mysqli_query($koneksi, "
    INSERT INTO solver (nama, jabatan, bidang, deskripsi, foto)
    VALUES ('$nama', '$jabatan', '$bidang', '$deskripsi', '$foto')
");

if ($query) {
    echo "<script>
        alert('Data solver berhasil ditambahkan!');
        window.location='?page=solver/index';
    </script>";
} else {
    echo "<script>
        alert('Gagal menambahkan data solver!');
        window.location='?page=solver/tambah';
    </script>";
}
