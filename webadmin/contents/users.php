<!doctype html>
<html lang="en">
<body>

<!-- Button trigger modal -->
<button type="button" id="btnModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
    Create Users
</button>
<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
//Initiate Class User to get table data
include "./handlers/users/findAllUserQuery.php";
$user = new Users();

//Pagination
$records = $user->getPagination();
$total_records = json_decode($records);
$total_records = $total_records->total_records;
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
$total_records_per_page = 5;
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
?>
<div style="float: right">
    <input type="text" id="user-param" placeholder="Search ...">
    <button type="button" id="btnSearch" name="btn-search-user" class="btn btn-primary btn-search-user">
        <i class="bi bi-search">Search</i>
    </button>
</div>
<?php
if (isset($_GET['parameter'])){
    $parameter = $_GET['parameter'];
} else {
    $parameter = null;
}

$result = $user->getAll($total_records_per_page, $offset, $parameter);
$arr = json_decode($result);
?>
<br>
<br>
<table class="table table-striped table-bordered table-hover table-sm table-paginate">
    <thead>
    <tr>
        <th class="th-sm">ID

        </th>
        <th class="th-sm">Username

        </th>
        <th class="th-sm">Role
        </th>
        <th class="th-sm">Action
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($arr as $key) {
        echo "<tr><th scope='row'>" . $key->id . "</th><td>" . $key->username . "</td><td>" . $key->name . "</td><td>";
        ?>

        <button type="button" id="btnEditModal" name="<?php echo $key->id ?>" class="btn btn-primary btn-edit-user"
                data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-pencil-fill">Edit</i>
        </button>
        <button type="button" id="btnDelete" name="<?php echo $key->id ?>" class="btn btn-primary btn-delete-user">
            <i class="bi bi-trash-fill">Delete</i>
        </button>
        <?php
        echo "</td></tr>";
    }
    ?>
    </tbody>
</table>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
    <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        if ($total_no_of_pages <= 10) {
            if ($page_no <= 1) {
                echo "<li class='page-item disabled'><a class='page-link'>Previous</a> </li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page_no=$previous_page'>Previous</a></li>";
            }
            for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }
            }
            if ($page_no >= $total_no_of_pages) {
                echo "<li class='page-item disabled'><a class='page-link'>Next</a> </li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page_no=$next_page'>Next</a></li>";
            }
        }
        ?>
    </ul>
</nav>
<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelModal">Create User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>