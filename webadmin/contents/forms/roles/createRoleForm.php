<!doctype html>
<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<body style="overflow: hidden">
<div class="row">
    <form action="../../../handlers/roles/rolesHandler.php?action=create" method="post">
        <div class="col">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="name"
                       placeholder="Name"
                       aria-describedby="name"
                       required="required">
            </div>
            <!--Makes number of levels only 1 digit-->
            <div class="mb-3">
                <input type="number" class="form-control" name="level" id="level"
                       placeholder="Level" maxlength="1"
                       oninput="this.value=this.value.slice(0,this.maxLength)"
                       aria-describedby="name"
                       required="required">
            </div>
        </div>
        <div class="col" style="float: right;">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>