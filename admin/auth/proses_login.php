<?php
include '../koneksi.php';

// Jika tombol login ditekan
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level_user = $_POST['level_user'];

    // Cek data user di database 
    $user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($user) > 0) {
        // Ubah data dari query menjadi array
        $data = mysqli_fetch_assoc($user);

        // Simpan data ke session
        session_start();
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['level_user'] = $data['level_user'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['foto'] = $data['foto'];

        echo "<script>
            alert('Login Berhasil');
            window.location.href='../index.php';
        </script>";
    } else {
        echo "<script>
            alert('Username atau password salah!');
            window.location.href='login.php';
        </script>";
    }
}
