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
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-tailwind.png">
    <script src="https://cdn.tiny.cloud/1/e2gflvcjajvi6196u0r32tpapwgvz6s71delm5i7f9novuhs/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src="js/main.js"></script>
    <script>
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

                    <form action="handler/profileHandler.php?action=update" method="post" id="signup">
                        <input type="hidden" name="headerImage" id="headerImage">
                        <div class="mb-3" id="headerImage">
                            <img src="../../assets/no-image.jpg" alt="..." class="img-thumbnail">
                        </div>
                        <div class="mb-3">
                            <label class="text-white" for="exampleFormControlFile1">Upload Header / Thumbnail
                                Post</label>
                        </div>
                        <div class="mb-3 text-white">
                            <input type='file' name='headerImage' id='headerImage' onchange="upload(this.files[0])">
                        </div>
                        <button class="bg-yellow-500 my-4 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded"
                                type="submit">Save Changes
                        </button>
                </div>
                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                    <div class="mb-3" id="avatarImage">
                        <textarea placeholder="Your Content Here" id="file-picker" name="mytextarea">
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
    function upload(val) {
        var file_data = val;
        var form_data = new FormData();
        var directory = "../../webadmin/contents/forms/userProfiles/"
        form_data.append('file', file_data);
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
                document.getElementById("headerImage").value = data;
            }
        });
    }

    tinymce.init({
        selector: 'textarea#file-picker',
        plugins: 'image code',
        min_height: 500,
        toolbar: 'undo redo | link image | code',
        /* enable title field in the Image dialog*/
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        /*
          URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
          images_upload_url: 'postAcceptor.php',
          here we add custom filepicker only to Image dialog
        */
        file_picker_types: 'image',
        /* and here's our custom image picker*/
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            /*
              Note: In modern browsers input[type="file"] is functional without
              even adding it to the DOM, but that might not be the case in some older
              or quirky browsers like IE, so you might want to add it to the DOM
              just in case, and visually hide it. And do not forget do remove it
              once you do not need it anymore.
            */

            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    /*
                      Note: Now we need to register the blob in TinyMCEs image blob
                      registry. In the next release this part hopefully won't be
                      necessary, as we are looking to handle it internally.
                    */
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), {title: file.name});
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

</script>
</body>
</html>

