<?php
require_once __DIR__ . '/../koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Pastikan koneksi tersedia
    if (!isset($koneksi) || !$koneksi) {
        die('Database connection not found.');
    }

    // Ambil user berdasarkan username (prepared statement)
    $stmt = mysqli_prepare($koneksi, "SELECT id_user, username, password, level_user, nama_lengkap, foto FROM user WHERE username = ?");
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($res && mysqli_num_rows($res) === 1) {
        $data = mysqli_fetch_assoc($res);

        // Cek password hash
        if (password_verify($password, $data['password'])) {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['level_user'] = $data['level_user'];
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
            $_SESSION['foto'] = $data['foto'];

            echo "<script>
                alert('Login Berhasil');
                window.location.href='../index.php';
            </script>";
            exit;
        } else {
            echo "<script>
                alert('Password salah!');
                window.location.href='login.php';
            </script>";
            exit;
        }
    } else {
        echo "<script>
            alert('Username tidak ditemukan!');
            window.location.href='login.php';
        </script>";
        exit;
    }
}
