<!doctype html>
<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/>

<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });

    function upload(val) {
        var file_data = val;
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: "uploadAvatar.php",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                $('#avatarImage').html("<img src=\"" + data + "\" style='max-height: 200px' class=\"img-thumbnail\" alt=\"User Image\">");
                document.getElementById("avatarUrl").value = data;
            }
        });
    }
</script>
<body style="overflow-x: hidden">
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
include 'findProfiles.php';
$users = new ProfilesForm();
$allUsers = $users->getAllUsers();
$arr = json_decode($allUsers);
?>
<div class="row">
    <form action="../../../handlers/userProfiles/profilesHandler.php?action=create" method="post">
        <div class="col">
            <div class="mb-3">
                <select class="form-control selectpicker" name="user_id" onchange="console.log(this.value)" id="select-username" data-live-search="true">
                    <option value="" selected disabled hidden>Select Username</option>
                    <?php
                    foreach ($arr as $value) {
                        echo "<option data-tokens='".$value->username."' value=" . $value->id . ">" . $value->username . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="first_name" id="name"
                       placeholder="First Name"
                       aria-describedby="name"
                       required="required">
            </div>
            <!--Makes number of levels only 1 digit-->
            <div class="mb-3">
                <input type="text" class="form-control" name="last_name" id="name"
                       placeholder="Last Name"
                       aria-describedby="name"
                       required="required">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <input type="email" class="form-control" name="email" id="name"
                       placeholder="Email"
                       aria-describedby="name"
                       required="required">
            </div>
            <!--Makes number of levels only 1 digit-->
            <div class="mb-3">
                <input type="number" class="form-control" name="gender" id="level"
                       placeholder="Gender | 0 = Male, 1 = Female" maxlength="1"
                       oninput="this.value=this.value.slice(0,this.maxLength)"
                       aria-describedby="name"
                       required="required">
            </div>
            <div class="mb-3">
                <input type="tel" class="form-control" name="phone_number" id="name"
                       placeholder="Phone Number"
                       aria-describedby="name"
                       required="required">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="avatarUrl" id="avatarUrl"
                       aria-describedby="name" hidden="hidden"
                       required="required">
            </div>
            <div class="mb-3" id="avatarImage">
                <img src="" alt="..." class="img-thumbnail">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlFile1">Upload Avatar</label>
            </div>
            <div class="mb-3">
                <input type='file' name='avatar' id='avatar' onchange="upload(this.files[0])">
            </div>
        </div>


        <div class="col" style="float: right;">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
<style>
    .mb-3 {
        margin-left: 10px;
        margin-right: 10px;
    }
</style>
</html>