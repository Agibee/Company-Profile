    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>STIFIn - Genetic Intelligence</title>
        <link rel="icon" href="image/logo.jpg" type="image/x-icon">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="assets/lib/animate/animate.min.css" />
        <link href="assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="assets/css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Navbar Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php" class="navbar-brand p-0">
                    <img src="image/logos.png" alt="Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">

                        <!-- Home -->
                        <a href="index.php"
                            class="nav-item nav-link <?= $page == '' ? 'active' : '' ?>">Home</a>

                        <a href="?page=stifin/index"
                            class="nav-item nav-link <?= str_contains($page, 'konsep') ? 'active' : '' ?>">STIFIn</a>

                        <a href="?page=artikel/index"
                            class="nav-item nav-link <?= str_contains($page, 'artikel') ? 'active' : '' ?>">Artikel</a>

                        <div class="nav-item dropdown">
                            <a href="#"
                                class="nav-link dropdown-toggle <?= str_contains($page, 'about') ? 'active' : '' ?>"
                                data-bs-toggle="dropdown">
                                About STIFIn <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                            <div class="dropdown-menu m-0">
                                <a href="?page=about/yayasan" class="dropdown-item <?= $page == 'about/yayasan' ? 'active' : '' ?>">Yayasan STIFIn</a>
                                <a href="?page=about/institute" class="dropdown-item <?= $page == 'about/institute' ? 'active' : '' ?>">STIFIn Institute</a>
                                <a href="?page=about/rumah" class="dropdown-item <?= $page == 'about/rumahquran' ? 'active' : '' ?>">Rumah Qur'an STIFIn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->