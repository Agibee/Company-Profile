<?php
// Ambil halaman dari URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Tentukan path file (di folder admin)
$file = __DIR__ . '/' . $page . '.php';

// Kalau file tidak ada, coba cek apakah dia folder dengan index.php
if (!file_exists($file)) {
    $file = __DIR__ . '/' . $page . '/index.php';
}

// Kalau file ditemukan, include
if (file_exists($file)) {
    include_once($file);
} else {
    echo "
    <div class='container-fluid'>
        <div class='alert alert-danger mt-4'>
            <strong>Error 404:</strong> Halaman <b>$page</b> tidak ditemukan.<br>
            File yang dicari: <code>$file</code>
        </div>
    </div>";
}
