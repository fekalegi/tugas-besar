<!DOCTYPE html>
<html lang="en">
<head>
    <title>Error</title>
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
<body class="antialiased bg-body text-body font-body">
<div class="">
    <?php
    session_start();
    include_once 'header.php';
    ?>
    <section class="h-screen bg-black bg-no-repeat bg-cover" style="background-image: url('boldui-assets/images/404.png');">
        <div class="flex h-full items-center">
            <div class="container mx-auto px-4">
                <div class="max-w-md mx-auto text-center">
                    <h2 class="mb-4 text-2xl text-white font-heading">Page not found</h2>
                    <p class="mb-10 text-lg text-gray-500">Sorry! We are unable to find the page you are looking for</p>
                    <div class="flex flex-wrap items-center justify-center">
                        <a class="inline-flex w-full sm:w-auto mb-6 sm:mb-0 sm:mr-8 items-center justify-center py-4 px-6 rounded-full bg-yellow-300 hover:bg-yellow-400 transform duration-200" href="#">
                            <svg class="mr-3" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.01 3.16553H0V5.24886H12.01V8.37386L16 4.20719L12.01 0.0405273V3.16553Z" fill="black"></path>
                            </svg>
                            <span class="text-sm font-heading">Back to home</span>
                        </a>
                        <a class="inline-flex items-center text-white hover:underline" href="#">
                            <span class="mr-2 text-sm font-heading">Try again</span>
                            <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.01 3.95383H0V6.04614H12.01V9.1846L16 4.99998L12.01 0.815369V3.95383Z" fill="#FFEC3E"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <?php
    include_once 'footer.php';
    ?>
</div>
</body>
</html>

