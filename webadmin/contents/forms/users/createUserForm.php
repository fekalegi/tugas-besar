<!doctype html>
<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<body style="overflow: hidden">
<div class="row">
    <?php
    include '../../../configs/mySQLConfig.php';
    ?>
    <form action="../../../handlers/users/userHandler.php?action=create" method="post">
        <div class="col">
            <div class="mb-3">
                <input type="text" class="form-control" name="username" id="username"
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
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', true);
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
                    echo "<option value=" . $value->id . ">" . $value->name . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col" style="float: right;">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>