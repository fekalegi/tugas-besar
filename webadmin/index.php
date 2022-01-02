<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="../assets/icon.jpg">
    <title>Web Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>

</head>

<body style="z-index: -1;">

<div class="wrapper">
    <!-- PHP Check Login Session -->
    <?php
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
    }else {
        echo "<script type='text/javascript'>window.location = 'login.php'; </script>";
    }
    ?>
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>WebAdmin</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Tables</p>
            <li>
                <a href="index.php?page=users">Users</a>
            </li>
            <li>
                <a href="index.php?page=user_profiles">Users Profiles</a>
            </li>
            <li>
                <a href="index.php?page=roles">Roles</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <p>User : <?php echo $username; ?></p>
        </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <!--Logout Button Handler-->
                    <span><button onclick="<?php session_destroy();?> window.location = 'login.php'" type="submit" id="logout" class="navbar-btn btn-danger"> Logout </button></span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>
            </div>
        </nav>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'users':
                    echo "<script type='text/javascript' src='js/buttonHandlerUsers.js'></script>";
                    include "contents/users.php";
                    break;
                case 'user_profiles':
                    echo "<script type='text/javascript' src='js/buttonHandlerProfiles.js'></script>";
                    include "contents/userProfiles.php";
                    break;
                case 'roles':
                    echo "<script type='text/javascript' src='js/buttonHandlerRoles.js'></script>";
                    include "contents/roles.php";
                    break;
                default:
                    echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                    break;
            }
        } else {
            include "contents/users.php";
        }

        ?>
    </div>
</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'users':
            echo "<script type='text/javascript' src='js/buttonHandlerUsers.js'></script>";
            break;
        case 'user_profiles':
            echo "<script type='text/javascript' src='js/buttonHandlerProfiles.js'></script>";
            break;
        case 'roles':
            echo "<script type='text/javascript' src='js/buttonHandlerRoles.js'></script>";
            break;
    }
} else {
    include "contents/users.php";
}

?>
</body>
<div class="modal-show"></div>

</html>