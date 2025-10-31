    <?php

    //jika halaman yang diakses ada

    if (!empty($_GET['page'])) {
        include_once($_GET['page'] . ".php");
    } else {
        include "home.php";
    }
