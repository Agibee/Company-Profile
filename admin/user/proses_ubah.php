<?php
// asumsikan $koneksi terhubung

$id_user      = (int)($_POST['id_user'] ?? 0);
$username     = trim($_POST['username'] ?? '');
$password     = $_POST['password'] ?? '';
$nama_lengkap = trim($_POST['nama_lengkap'] ?? '');
$no_hp        = trim($_POST['no_hp'] ?? '');
$level_user   = $_POST['level_user'] ?? '';

// ambil data lama
$stmt = $koneksi->prepare("SELECT foto FROM user WHERE id_user = ?");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc() ?: [];
$foto_lama = $row['foto'] ?? '';
$stmt->close();

// proses password (hash kalau ada)
$updatePassword = false;
if (!empty($password)) {
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $updatePassword = true;
}

// proses upload foto sederhana
$uploadDir = __DIR__ . '/../assets/img/user/';
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

$foto_final = $foto_lama;
if (!empty($_FILES['foto']['name']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $orig = basename($_FILES['foto']['name']);
    $ext = strtolower(pathinfo($orig, PATHINFO_EXTENSION));
    $nameOnly = pathinfo($orig, PATHINFO_FILENAME);
    $safe = preg_replace('/[^A-Za-z0-9_-]/', '_', $nameOnly);
    $new = $safe . '_' . time() . ($ext ? '.' . $ext : '');
    $target = $uploadDir . $new;
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
        $foto_final = $new;
        if ($foto_lama && file_exists($uploadDir . $foto_lama)) @unlink($uploadDir . $foto_lama);
    }
}

// siapkan query UPDATE singkat (dinamis jika password diubah)
if ($updatePassword) {
    $sql = "UPDATE user SET username=?, password=?, nama_lengkap=?, no_hp=?, foto=?, level_user=? WHERE id_user=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssssi", $username, $password_hashed, $nama_lengkap, $no_hp, $foto_final, $level_user, $id_user);
} else {
    $sql = "UPDATE user SET username=?, nama_lengkap=?, no_hp=?, foto=?, level_user=? WHERE id_user=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssssi", $username, $nama_lengkap, $no_hp, $foto_final, $level_user, $id_user);
}

if ($stmt->execute()) {
    echo "<script>alert('Data Berhasil Diubah'); window.location='?page=user/index';</script>";
} else {
    echo "<script>alert('Data Gagal Diubah'); window.location='?page=user/index';</script>";
}
$stmt->close();
