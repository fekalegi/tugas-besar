<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

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
            <li>
                <a href="index.php?page=posts">Posts</a>
            </li>
            <li>
                <a href="index.php?page=comments">Comments</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">

        </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
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
                    include "contents/users.php";
                    break;
                case 'user_profiles':
                    include "contents/userProfiles.php";
                    break;
                case 'roles':
                    include "contents/roles.php";
                    break;
                case 'posts':
                    include "contents/posts.php";
                    break;
                case 'comments':
                    include "contents/comments.php";
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
        $('#btnModal').on('click', function () {
            $('#createModal').appendTo(".modal-show");
            document.getElementById('modal-body').innerHTML = "<object id='modal-container' width='100%' height='200' data='contents/forms/users/createUserForm.php'> </object>";
        })
        var btnEdit = document.getElementsByClassName('btn-edit-user')
        for (var i = 0; i < btnEdit.length; i++) {
            btnEdit[i].onclick = function (){
                $('#createModal').appendTo("body");
                document.getElementById('modal-body').innerHTML = "<object id='modal-container' width='100%' height='200' data='contents/forms/users/updateUserForm.php?id=" + this.name + "'> </object>";

            }
        }
        var btnDelete = document.getElementsByClassName('btn-delete-user')
        for (var i = 0; i < btnDelete.length; i++) {
            btnDelete[i].onclick = function (){
                var answer = window.confirm("Delete Data ?")
                if (answer){
                    location.href = "handlers/users/userHandler.php?action=delete&id="+this.name+"";
                }else{

                }
            }
        }
        var btnSearch = document.getElementsByClassName('btn-search-user')
        for (var i = 0; i < btnSearch.length; i++) {
            btnSearch[i].onclick = function (){
                $param = document.getElementById('user-param').value
                location.href = "index.php?page=users&parameter="+ $param;
            }
        }
    });
</script>
</body>
<div class="modal-show"></div>

</html>