<?php
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];
$no_hp = $_POST['no_hp'];
$foto = $_FILES['foto']['name'];
$tmpName = $_FILES['foto']['tmp_name'];
$level_user = $_POST['level_user'];

$s = "Select * from user where id_user='$id_user'";
$sql = mysqli_query($koneksi, $s);
$datalama = mysqli_fetch_array($sql);
$fotolama = $datalama['foto'];

if (!empty($foto)) {
    // proses upload file
    $target = __DIR__ . '/../assets/img/user/' . $foto;
    if (move_uploaded_file($tmpName, $target)) {
        echo "File uploaded successfully.";
        if (!empty($fotolama) && file_exists(__DIR__ . '/../assets/img/user/' . $fotolama)) {
            unlink(__DIR__ . '/../assets/img/user/' . $fotolama);
        }
    } else {
        echo "Failed to move uploaded file.";
        exit;
    }
} else {
    $foto = $fotolama;
}

$ubah = mysqli_query($koneksi, "UPDATE user SET username='$username',
 password='$password', nama_lengkap='$nama_lengkap',
 no_hp='$no_hp', foto='$foto', level_user='$level_user' WHERE id_user='$id_user'");

if ($ubah) {
    echo "<script>
    alert('Data Berhasil Diubah'); 
    window.location = '?page=user/index';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Diubah');
     window.location = '?page=user/index';
     </script>";
}
