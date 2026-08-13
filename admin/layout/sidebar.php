<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon" style="width:60px; height:60px; display:flex; align-items:center; justify-content:center; overflow:visible;">
            <img src="image/logo.jpg" alt="Logo" style="width:70px; height:70px;">
        </div>
    </a>


    <!-- Divider -->
    <hr class=" sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Konsep STIFIn -->
    <li class="nav-item">
        <a class="nav-link" href="?page=stifin/index">
            <i class="fas fa-fw fa-brain"></i>
            <span>Konsep STIFIn</span>
        </a>
    </li>

    <!-- Artikel -->
    <li class="nav-item">
        <a class="nav-link" href="?page=artikel/index">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Artikel</span>
        </a>
    </li>
    <!-- Divider -->

    <hr class="sidebar-divider">
    <!-- Data Cabang -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCabang"
            aria-expanded="false" aria-controls="collapseCabang">
            <i class="fas fa-fw fa-store"></i>
            <span>Data Cabang</span>
        </a>
        <div id="collapseCabang" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Wilayah:</h6>
                <a class="collapse-item" href="?page=provinsi/index"><i class="fas fa-map"></i> Provinsi</a>
                <a class="collapse-item" href="?page=kota/index"><i class="fas fa-city"></i> Kota</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Cabang:</h6>
                <a class="collapse-item" href="?page=cabang/index"><i class="fas fa-building"></i> Cabang</a>
            </div>
        </div>
    </li>
    <!-- Promotor, Trainer & Solver -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePromotorTrainer"
            aria-expanded="false" aria-controls="collapsePromotorTrainer">
            <i class="fas fa-fw fa-users"></i>
            <span>Ekosistem</span>
        </a>
        <div id="collapsePromotorTrainer" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=area/index">
                    <i class="fas fa-map-marked-alt"></i> Area
                </a>
                <a class="collapse-item" href="?page=promotor/index">
                    <i class="fas fa-user-tie"></i> Promotor
                </a>
                <a class="collapse-item" href="?page=trainer/index">
                    <i class="fas fa-chalkboard-teacher"></i> Trainer
                </a>
                <a class="collapse-item" href="?page=solver/index">
                    <i class="fas fa-lightbulb"></i> Solver
                </a>
            </div>
        </div>
    </li>

    <!-- Kerjasama & Clients -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKerjasama"
            aria-expanded="false" aria-controls="collapseKerjasama">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Kerjasama</span>
        </a>
        <div id="collapseKerjasama" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=kerjasama/index"><i class="fas fa-building"></i> Perusahaan</a>
                <a class="collapse-item" href="?page=clients/index"><i class="fas fa-user-friends"></i> Clients</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <!-- User -->
    <li class="nav-item">
        <a class="nav-link" href="?page=user/index">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Manajemen User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">


        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class=" dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?= $_SESSION['nama_lengkap'] ?>
                        </span>
                        <img class="img-profile rounded-circle"
                            src="assets/img/user/<?= $_SESSION['foto'] ?>"
                            alt="User Profile">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->