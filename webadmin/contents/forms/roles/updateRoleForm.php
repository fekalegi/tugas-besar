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
    include 'findRoles.php';
    $users = new Roles();
    $user = $users->getByID($id);
    $converted = json_decode($user);
    foreach ($converted as $key){
        $name = $key->name;
        $level = $key->level;

    }
    ?>
    <form action="../../../handlers/roles/rolesHandler.php?action=update" method="post">
        <div class="col">
            <div class="mb-3">
                <input type="text" value="<?php echo $name?>" class="form-control" name="name" id="name"
                       placeholder="Name"
                       aria-describedby="name"
                       required="required">
            </div>
        </div>
        <!--Makes number of levels only 1 digit-->
        <div class="mb-3">
            <input type="number" class="form-control" name="level" id="level"
                   value="<?php echo $level?>"
                   placeholder="Level" maxlength="1"
                   oninput="this.value=this.value.slice(0,this.maxLength)"
                   aria-describedby="name"
                   required="required">
        </div>
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>" >
        <div class="col" style="float: right;">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>