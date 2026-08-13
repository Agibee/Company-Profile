<?php
// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];
$no_hp = $_POST['no_hp'];
$level_user = $_POST['level_user'];

// Cek apakah username sudah ada
$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>
    alert('Username sudah digunakan, silakan pilih username lain.');
    window.location = '?page=user/index';
    </script>";
    exit;
}

// Hash password sebelum disimpan
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// proses upload file
if (!isset($_FILES['foto'])) {
    echo "No file uploaded.";
    exit;
}
$originalName = basename($_FILES['foto']['name']);
$tmpName = $_FILES['foto']['tmp_name'];
if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
    echo "Upload error code: " . $_FILES['foto']['error'];
    exit;
}

$targetDir = __DIR__ . '/../assets/img/user/';
if (!is_dir($targetDir)) {
    if (!mkdir($targetDir, 0755, true)) {
        echo "Failed to create upload directory: " . $targetDir;
        exit;
    }
}
if (!is_writable($targetDir)) {
    echo "Upload directory is not writable: " . $targetDir;
    exit;
}

$ext = pathinfo($originalName, PATHINFO_EXTENSION);
$nameOnly = pathinfo($originalName, PATHINFO_FILENAME);
$safeName = preg_replace('/[^A-Za-z0-9_-]/', '_', $nameOnly);
$newFilename = $safeName . '_' . time() . ($ext ? '.' . $ext : '');
$targetFile = $targetDir . $newFilename;

if (!move_uploaded_file($tmpName, $targetFile)) {
    echo "Failed to move uploaded file to: " . $targetFile;
    exit;
}

$namafile = basename($targetFile);

// Insert data ke database
$tambah = mysqli_query($koneksi, "INSERT INTO user (username, password, nama_lengkap, no_hp, foto, level_user) 
VALUES ('$username', '$hashedPassword', '$nama_lengkap', '$no_hp', '$namafile', '$level_user')");

if ($tambah) {
    echo "<script>
    alert('Data Berhasil Ditambahkan'); 
    window.location = '?page=user/index';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Ditambahkan');
    window.location = '?page=user/index';
    </script>";
}
