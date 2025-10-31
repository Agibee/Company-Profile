<?php
include '../koneksi.php';

$id              = $_POST['id_kerjasama'];
$nama_perusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
$alamat          = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$no_telp         = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
$email           = mysqli_real_escape_string($koneksi, $_POST['email']);

// Ambil data lama (untuk hapus logo lama jika diganti)
$result = mysqli_query($koneksi, "SELECT logo FROM kerjasama WHERE id_kerjasama='$id'");
$dataLama = mysqli_fetch_assoc($result);
$logoLama = $dataLama['logo'] ?? '';

$updateLogo = "";

// ==== PROSES UPLOAD LOGO BARU (jika ada) ====
if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
    $originalName = basename($_FILES['logo']['name']);
    $tmpName = $_FILES['logo']['tmp_name'];

    $targetDir = __DIR__ . '/../assets/img/kerjasama/';

    // Buat folder jika belum ada
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Validasi format file
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($ext, $allowedExt)) {
        echo "<script>alert('Format logo tidak valid (hanya JPG, JPEG, PNG, GIF)!');history.back();</script>";
        exit;
    }

    // Nama file aman dan unik
    $safeName = preg_replace('/[^A-Za-z0-9_-]/', '_', pathinfo($originalName, PATHINFO_FILENAME));
    $newFilename = $safeName . '_' . time() . '.' . $ext;
    $targetFile = $targetDir . $newFilename;

    // Pindahkan file baru
    if (move_uploaded_file($tmpName, $targetFile)) {
        // Hapus logo lama jika ada dan berbeda
        if (!empty($logoLama) && file_exists($targetDir . $logoLama)) {
            unlink($targetDir . $logoLama);
        }

        $updateLogo = ", logo='$newFilename'";
    } else {
        echo "<script>alert('Gagal mengupload logo baru!');history.back();</script>";
        exit;
    }
}

// ==== UPDATE DATA ====
$sql = mysqli_query($koneksi, "
    UPDATE kerjasama 
    SET nama_perusahaan='$nama_perusahaan',
        alamat='$alamat',
        no_telp='$no_telp',
        email='$email'
        $updateLogo
    WHERE id_kerjasama='$id'
");

if ($sql) {
    echo "<script>
        alert('Data berhasil diubah!');
        window.location='?page=kerjasama/index';
    </script>";
} else {
    echo "<script>
        alert('Gagal mengubah data!');
        window.location='?page=kerjasama/ubah&id_kerjasama=$id';
    </script>";
}
