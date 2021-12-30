<!doctype html>
<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<body style="overflow: hidden">
<div class="row">
    <?php
    include '../../../configs/mySQLConfig.php';
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', true);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    include 'findUser.php';
    $users = new Users();
    $user = $users->getByID($id);
    $converted = json_decode($user);
    foreach ($converted as $key){
        $username = $key->username;
        $selectedRole = $key->role_id;

    }
    ?>
    <form action="../../../handlers/users/userHandler.php?action=update" method="post">
        <div class="col">
            <div class="mb-3">
                <input type="text" value="<?php echo $username?>" class="form-control" name="username" id="username"
                       placeholder="username"
                       aria-describedby="username"
                       required="required">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <input type="password" class="form-control" name="password" id="password"
                       placeholder="password" required="required">
            </div>
        </div>
        <?php
        include 'findRoles.php';
        $roles = new Roles();
        $result = $roles->getAll();
        $arr = json_decode($result);
        ?>
        <div class="col">
            <select class="form-select mb-3" name="role" aria-label=".form-select-lg example" required="required">
                <option value="" selected disabled hidden>Select Role</option>
                <?php

                foreach ($arr as $value) {
                    if($value->id == $selectedRole){
                        echo "<option selected='' value=" . $value->id . ">" . $value->name . "</option>";
                    }else {
                        echo "<option value=" . $value->id . ">" . $value->name . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>" >
        <div class="col" style="float: right;">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>