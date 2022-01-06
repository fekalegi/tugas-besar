<?php

if (isset($_GET['halaman'])) {
    $page = $_GET['halaman'];

    switch ($page) {
        case 'home':
            include "home.php";
            break;
        case 'about':
            include "about.php";
            break;
        case 'blog':
            include "blog.php";
            break;
        default:
            include "notfound.php";
            break;
    }
} else {
    include "home.php";
}
?>