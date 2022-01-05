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
    <script src="js/main.js"></script>
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
                    $('#avatarImage').html("<img src=\"" + directory + data + "\" style='max-height: 200px' class=\"img-thumbnail\" alt=\"User Image\">");
                    document.getElementById("avatarUrl").value = data;
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
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        include 'handler/findProfiles.php';
        if (isset($_GET['action'])) {
            $success = $_GET['action'];
            switch ($success) {
                case 'success':
                    ?>
                    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3"
                         role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                        </svg>
                        <p>Profile has been saved</p>
                    </div><?php
                    break;
            }
        } ?><?php
        $profiles = new profilesForm();
        $result = $profiles->getByID($id);
        if ($result != null) {
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
            <section class="relative py-56 bg-black bg-cover bg-no-repeat"
                     style="background-position: center ;background-image: url('../../assets/head.jpeg');">
                <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-80"></div>
                <div class="relative container mx-auto px-4">
                    <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                        <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                            <h2 class="mb-4 text-2xl text-white font-heading">Create account</h2>

                            <form action="handler/profileHandler.php?action=update" method="post" id="signup">
                                <input type="hidden" value="<?php echo $id ?>" name="user_id">
                                <input required name="first_name" value="<?php echo $first_name ?>"
                                       class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                       type="text" placeholder="First Name">
                                <input required name="last_name" value="<?php echo $last_name ?>"
                                       class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                       type="text" placeholder="Last Name">
                                <input required name="email" value="<?php echo $email ?>"
                                       class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                       type="email" placeholder="Email">
                                <input required name="phone_number" value="<?php echo $phone_number ?>"
                                       class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                       type="text" placeholder="Phone Number">
                                <div class="relative">
                                    <select name="gender"
                                            class="appearance-none w-full py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                            name="field-name">

                                        <option <?php if ($gender == 0) {
                                            ?> selected <?php } ?>
                                                value="0">Male
                                        </option>
                                        <option <?php if ($gender == 1) {
                                            ?> selected <?php } ?>
                                                value="1">Female
                                        </option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <button class="bg-yellow-500 my-4 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded"
                                        type="submit">Save Changes
                                </button>
                        </div>
                        <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                            <input type="hidden" name="avatarUrl" value="<?php echo $avatar ?>">
                            <div class="mb-3" id="avatarImage">
                                <img style="max-height: 300px;width: auto;max-width: 300px;height: auto"
                                     src="../../webadmin/contents/forms/userProfiles/<?php echo $avatar ?>" alt="..."
                                     class="img-thumbnail">
                            </div>
                            <div class="mb-3 text-white">
                                <label for="exampleFormControlFile1">Upload Avatar</label>
                            </div>
                            <div class="mb-3 text-white">
                                <input type='file' name='avatar' id='avatar' onchange="upload(this.files[0])">
                            </div>
                        </div>


                        </form>
                    </div>
                </div>
            </section>

            <?php
        } else {
            ?>

            <section class="relative py-56 bg-black bg-cover bg-no-repeat"
                     style="background-position: center ;background-image: url('../../assets/head.jpeg');">
                <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-80"></div>
                <div class="relative container mx-auto px-4">
                    <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                        <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                            <h2 class="mb-4 text-2xl text-white font-heading">Create account</h2>

                            <form action="handler/profileHandler.php?action=create" method="post" id="signup">
                                <input type="hidden" value="<?php echo $id ?>" name="user_id">
                                <input required name="first_name"
                                       class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                       type="text" placeholder="First Name">
                                <input required name="last_name"
                                       class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                       type="text" placeholder="Last Name">
                                <input required name="email"
                                       class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                       type="email" placeholder="Email">
                                <input required name="phone_number"
                                       class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                       type="text" placeholder="Phone Number">
                                <div class="relative">
                                    <select name="gender"
                                            class="appearance-none w-full py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                                            name="field-name">

                                        <option value="0">Male
                                        </option>
                                        <option value="1">Female
                                        </option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <button class="bg-yellow-500 my-4 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded"
                                        type="submit">Save Profile
                                </button>
                        </div>
                        <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                            <input type="hidden" name="avatarUrl" id="avatarUrl">
                            <div class="mb-3" id="avatarImage">
                                <img src="../../assets/no-image.jpg" alt="..." class="img-thumbnail">
                            </div>
                            <div class="mb-3">
                                <label class="text-white" for="exampleFormControlFile1">Upload Avatar</label>
                            </div>
                            <div class="mb-3 text-white">
                                <input type='file' name='avatar' id='avatar' onchange="upload(this.files[0])">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </section>

            <?php
        }

    } ?>


    <?php
    include_once 'footer.php';
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</body>
</html>

