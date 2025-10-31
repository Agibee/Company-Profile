<?php
include '../koneksi.php';

// ====== DATA CARD ======
$cabang   = $koneksi->query("SELECT COUNT(*) AS total FROM cabang")->fetch_assoc()['total'];
$promotor = $koneksi->query("SELECT COUNT(*) AS total FROM promotor")->fetch_assoc()['total'];
$solver   = $koneksi->query("SELECT COUNT(*) AS total FROM solver")->fetch_assoc()['total'];
$trainer  = $koneksi->query("SELECT COUNT(*) AS total FROM trainer")->fetch_assoc()['total'];

// ====== DATA GRAFIK CLIENT PER BULAN ======
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
while($row = $clientData->fetch_assoc()){
    $bulan[] = $row['bulan'];
    $jumlah[] = $row['total'];
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- ====== CARD SUMMARY ====== -->
    <div class="row">

        <!-- Cabang -->
        <div class="col-xl-3 col-md-6 mb-4">
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

        <!-- Promotor -->
        <div class="col-xl-3 col-md-6 mb-4">
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

        <!-- Solver -->
        <div class="col-xl-3 col-md-6 mb-4">
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

        <!-- Trainer -->
        <div class="col-xl-3 col-md-6 mb-4">
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
    </div>

    <!-- ====== GRAFIK CLIENT ====== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Client per Bulan</h6>
                </div>
                <!-- Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- ====== JS SECTION ====== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Setup chart data
const ctx = document.getElementById('myAreaChart').getContext('2d');
const myAreaChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($bulan) ?>,
        datasets: [{
            label: "Total Client",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: <?= json_encode($jumlah) ?>,
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: { padding: { left: 10, right: 25, top: 25, bottom: 0 } },
        scales: {
            x: {
                grid: { display: false, drawBorder: false },
                ticks: { maxTicksLimit: 12 }
            },
            y: {
                ticks: {
                    beginAtZero: true,
                    maxTicksLimit: 5,
                    padding: 10,
                    callback: function(value) {
                        return value;
                    }
                },
                grid: { color: "rgb(234, 236, 244)", zeroLineColor: "rgb(234, 236, 244)", drawBorder: false }
            },
        },
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: "rgb(255,255,255)",
                bodyColor: "#858796",
                titleMarginBottom: 10,
                titleColor: '#6e707e',
                titleFont: { size: 14 },
                borderColor: '#dddfeb',
                borderWidth: 1,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(context) {
                        return 'Jumlah: ' + context.formattedValue;
                    }
                }
            }
        }
    }
});
</script>
