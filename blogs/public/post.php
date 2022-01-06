<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Krona+One&family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="css/tailwind/tailwind.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/icon.jpg">

    <script src="https://cdn.tiny.cloud/1/e2gflvcjajvi6196u0r32tpapwgvz6s71delm5i7f9novuhs/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src="js/main.js"></script>
    <script>
        function upload(val) {
            var file_data = val;
            var form_data = new FormData();
            var directory = "../../webadmin/contents/forms/userProfiles/";
            form_data.append('file', file_data);
            console.log("test");
            $.ajax({
                url: "../../webadmin/contents/forms/userProfiles/uploadAvatar.php",
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    $('#headerImage').html("<img src=\"" + directory + data + "\" style='max-height: 200px' class=\"img-thumbnail\" alt=\"User Image\">");
                    document.getElementById("headerUrl").value = data;
                }
            });
        }
    </script>
</head>
<body class="antialiased bg-body text-body font-body">
<div class="">
    <?php
    session_start();
    include_once 'header.php';
    ?>

    <section class="relative py-56 bg-black bg-cover bg-no-repeat"
             style="background-position: center ;background-image: url('../../assets/head.jpeg');">
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-80"></div>
        <div class="relative container mx-auto px-4">
            <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                    <h2 class="mb-4 text-2xl text-white font-heading">Create Post</h2>

                    <form action="handler/postHandler.php?action=create" method="post" id="post">
                        <div class="mb-3">
                            <input required name="title"
                                   class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                   type="text" placeholder="Your Title Here">
                        </div>
                        <input type="hidden" name="headerUrl" id="headerUrl">
                        <div class="mb-3" id="headerImage">
                            <img src="../../assets/no-image.jpg" alt="..." class="img-thumbnail">
                        </div>
                        <div class="mb-3">
                            <label class="text-white" for="exampleFormControlFile1">Upload Header / Thumbnail
                                Post</label>
                        </div>
                        <div class="mb-3 text-white">
                            <input type='file' name='headerImage' onchange="upload(this.files[0])">
                        </div>
                        <button class="bg-yellow-500 my-4 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded"
                                type="submit">Save Changes
                        </button>
                </div>
                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                    <div class="mb-3" id="avatarImage">
                        <textarea placeholder="Your Content Here" id="file-picker" name="body">
                        </textarea>
                    </div>
                </div>


                </form>
            </div>
        </div>
    </section>

    <?php
    include_once 'footer.php';
    ?>
</div>
<script>


    tinymce.init({
        selector: 'textarea#file-picker',
        plugins: 'code print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap mentions quickbars linkchecker emoticons advtable export',
        min_height: 500,
        toolbar: 'undo redo | code | undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</body>
</html>

