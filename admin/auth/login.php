<?php
session_start();
if (isset($_SESSION['id_user'])) {
    echo "<script>
        alert('Anda sudah login');
        window.location.href = '../index.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | STIFIn Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-success bg-gradient d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <img src="../../image/logos.png" alt="Logo STIFIn" width="100">
        </div>

        <h4 class="text-center mb-3">Login STIFIn Center</h4>
        <p class="text-center text-muted mb-4">Masuk ke dashboard untuk mengelola konten</p>

        <form action="proses_login.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn btn-success w-100">Masuk</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>