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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
include 'findProfiles.php';
$profiles = new profilesForm();
$result = $profiles->getByID($id);
$arr = json_decode($result);
foreach ($arr as $key) {
    $user_id = $key->user_id;
    $first_name = $key->first_name;
    $last_name = $key->last_name;
    $avatar = $key->avatar;
    $gender = $key->gender;
    $email = $key->email;
    $phone_number = $key->phone_number;
}
?>
<div class="row">
    <form action="../../../handlers/userProfiles/profilesHandler.php?action=update" method="post">
        <div class="col">

            <div class="mb-3">
                <input type="text" class="form-control" name="user_id" id="name"
                       disabled="disabled"
                       value="<?php echo $user_id ?>"
                       aria-describedby="name"
                       required="required">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="id" id="name"
                       placeholder="Email"
                       value="<?php echo $id ?>"
                       hidden="hidden"
                       aria-describedby="name"
                       required="required">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="first_name" id="name"
                       placeholder="First Name"
                       value="<?php echo $first_name ?>"
                       aria-describedby="name"
                       required="required">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="last_name" id="name"
                       placeholder="Last Name"
                       value="<?php echo $last_name ?>"
                       aria-describedby="name"
                       required="required">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <input type="email" class="form-control" name="email" id="name"
                       placeholder="Email"
                       value="<?php echo $email ?>"
                       aria-describedby="name"
                       required="required">
            </div>
            <!--Makes number of levels only 1 digit-->
            <div class="mb-3">
                <input type="number" class="form-control" name="gender" id="level"
                       placeholder="Gender | 0 = Male, 1 = Female" maxlength="1"
                       value="<?php echo $gender ?>"
                       oninput="this.value=this.value.slice(0,this.maxLength)"
                       aria-describedby="name"
                       required="required">
            </div>
            <div class="mb-3">
                <input type="tel" class="form-control" name="phone_number" id="name"
                       placeholder="Phone Number"
                       value="<?php echo $phone_number ?>"
                       aria-describedby="name"
                       required="required">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="avatarUrl" id="avatarUrl"
                       value="<?php echo $avatar ?>"
                       aria-describedby="name" hidden="hidden"
                       required="required">
            </div>
            <div class="mb-3" id="avatarImage">
                <img src="<?php echo $avatar ?>" alt="..." class="img-thumbnail">
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