$php_start = true;
<?php

// Ensure database connection ($koneksi) is available
if (!isset($koneksi) || !$koneksi) {
    $possible = __DIR__ . '/../koneksi.php';
    if (file_exists($possible)) {
        include_once $possible;
    }

    // Fallback: create a mysqli connection with common defaults
    if (!isset($koneksi) || !$koneksi) {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'stifin';
        $koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($koneksi->connect_error) {
            die('Database connection failed: ' . $koneksi->connect_error);
        }
    }
}

//  Ambil data summary 
$cabang   = $koneksi->query("SELECT COUNT(*) AS total FROM cabang")->fetch_assoc()['total'];
$promotor = $koneksi->query("SELECT COUNT(*) AS total FROM promotor")->fetch_assoc()['total'];
$solver   = $koneksi->query("SELECT COUNT(*) AS total FROM solver")->fetch_assoc()['total'];
$trainer  = $koneksi->query("SELECT COUNT(*) AS total FROM trainer")->fetch_assoc()['total'];
$kerjasama  = $koneksi->query("SELECT COUNT(*) AS total FROM kerjasama")->fetch_assoc()['total'];

//  Data chart client per bulan 
$clientData = $koneksi->query("
    SELECT 
        MONTH(tanggal_tes) AS bulan_angka,
        MONTHNAME(tanggal_tes) AS bulan,
        COUNT(*) AS total
    FROM clients
    GROUP BY MONTH(tanggal_tes), MONTHNAME(tanggal_tes)
    ORDER BY bulan_angka
");

$bulan = [];
$jumlah = [];
while ($row = $clientData->fetch_assoc()) {
    $bulan[] = $row['bulan'];
    $jumlah[] = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard STIFIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container-fluid mt-4">

        <!--  CARD SUMMARY  -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cabang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $cabang ?></div>
                        </div>
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Promotor</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $promotor ?></div>
                        </div>
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Solver</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $solver ?></div>
                        </div>
                        <i class="fas fa-lightbulb fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Trainer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $trainer ?></div>
                        </div>
                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Kerjasama / Clients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kerjasama ?></div>
                        </div>
                        <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>

        <!--  CHART CLIENT PER BULAN  -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Client per Bulan</h6>
            </div>
            <div class="card-body">
                <canvas id="clientChart" height="100"></canvas>
            </div>
        </div>

    </div>

    <script src="https://kit.fontawesome.com/a2e0e6b6f2.js" crossorigin="anonymous"></script>
    <script>
        const ctx = document.getElementById('clientChart').getContext('2d');
        const clientChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($bulan) ?>,
                datasets: [{
                    label: 'Jumlah Client',
                    data: <?= json_encode($jumlah) ?>,
                    backgroundColor: 'rgba(78, 115, 223, 0.2)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 4,
                    pointBackgroundColor: 'rgba(78, 115, 223, 1)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>