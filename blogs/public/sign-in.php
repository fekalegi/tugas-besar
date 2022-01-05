<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Krona+One&family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="css/tailwind/tailwind.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/icon.jpg">
    <script src="js/main.js"></script>
</head>
<body class="antialiased bg-body text-body font-body" style="overflow-y: hidden">
<div class="">

    <section class="relative py-20 bg-black overflow-hidden" style="height: 1000px;">
        <div class="relative z-10 md:pt-40 lg:pt-64 md:pb-40">
            <div class="hidden md:block absolute top-0 right-0 mt-40 -mr-32 h-128 clip-path-2 transform rotate-45">
                <img class="h-128 w-full transform -rotate-45 object-cover" src="../../assets/pict1.jpg" alt=""></div>
            <div class="relative container mx-auto px-4">
                <div class="hidden lg:block absolute -bottom-1/2 left-0 h-64 ml-40 -mb-24 clip-path transform rotate-45">
                    <img class="w-64 transform -rotate-45 object-cover" src="../../assets/pict2.jpeg" alt=""></div>
                <div class="relative z-10 max-w-md mx-auto text-center">
                    <h2 class="mb-4 text-2xl text-white font-heading">Login</h2>
                    <?php
                    if (isset($_GET['signup'])) {
                        $success = $_GET['signup'];
                        switch ($success) {
                            case 'success':
                                ?>
                                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3"
                                     role="alert">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                                    </svg>
                                    <p>Account has been created, Please Login.</p>
                                </div>
                                <br>  <?php
                                break;
                        }
                    } ?>
                    <form action="handler/loginHandler.php?action=login" method="post">
                        <input name="username" class="w-full mb-4 py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-white"
                               type="text" placeholder="Type your username">
                        <div class="flex mb-6 py-4 px-6 bg-black rounded-full border text-white font-bold">
                            <input name="password" class="w-full pr-4 bg-transparent outline-none placeholder-white" type="password"
                                   placeholder="Enter password">
                        </div>


                        <button class="inline-flex w-full items-center justify-center py-4 px-6 rounded-full bg-yellow-300 hover:bg-yellow-400 transform duration-200" type="submit">Login</button>
                    </form>
                    <br>
                    <p class="text-white">haven't got an account yet </p>
                    <a href="sign-up.php">
                        <button style="margin-top: 2rem"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            Sign Up
                        </button>
                    </a>
                </div>
                <img class="hidden sm:block absolute top-1/2 right-0 -mr-52 transform -translate-y-1/2 object-contain"
                     src="boldui-assets/elements/shadow-light-7.svg" alt=""></div>
        </div>
        <div class="absolute top-0 left-0 -ml-64 h-128 clip-path-2 transform rotate-45"></div>
        <div class="hidden lg:block absolute top-0 left-1/2 h-64 clip-path-2 transform rotate-45">
            <img class="w-64 transform -rotate-45 object-cover" src="../../assets/mt2.jpeg" alt=""></div>
    </section>
</div>

</body>
</html>

