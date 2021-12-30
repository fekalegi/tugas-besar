<!doctype html>
<html lang="en">
<body>
<!-- Button trigger modal -->
<button type="button" id="btnModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
    Create Users
</button>


<br>
<br>
<table class="table table-striped table-bordered table-hover table-sm" cellspacing="0" width="100%">
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

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', true);
    include "./handlers/users/findAllUserQuery.php";
    $user = new Users();
    $result = $user->getAll();

    $arr = json_decode($result);
    foreach($arr as $key){
        echo "<tr><th scope='row'>" . $key->id. "</th><td>" . $key->username. "</td><td>" . $key->name. "</td><td>";
        ?>

        <button type="button" id="btnEditModal" name="<?php echo $key->id ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-pencil-fill">Edit</i>
        </button>
        <?php
        echo "</td></tr>";
    }
    ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create User</h5>
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