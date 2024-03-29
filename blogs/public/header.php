<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
if (isset($_SESSION['username'])) {
    if (isset($_SESSION['avatar'])){
        $avatar = $_SESSION['avatar'];
    }
    else {
        $avatar = "no-image.jpg";
    }
    ?>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <section class="bg-black">
        <nav class="relative z-10 flex px-16 justify-between bg-transparent border-b">
            <div class="pr-14 py-8 lg:border-r">
                <a class="inline-block text-xl text-white font-medium font-heading" href="index.php">
                    <img class="h-8" width="auto" src="../../assets/icon-white.png" alt=""></a>
            </div>
            <button class="navbar-burger lg:hidden self-center">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="6" width="24" height="2" fill="white"></rect>
                    <rect y="11" width="24" height="2" fill="white"></rect>
                    <rect y="16" width="24" height="2" fill="white"></rect>
                </svg>
            </button>
            <div class="hidden lg:block py-8 lg:absolute lg:top-1/2 lg:left-1/2 lg:transform lg:-translate-y-1/2 lg:-translate-x-1/2">
                <ul class="flex justify-center">
                    <li class="mr-12"><a class="text-gray-500 hover:text-gray-400" href="index.php">Home</a></li>
                    <li class="mr-12"><a class="text-gray-500 hover:text-gray-400" href="index.php?halaman=blog">Blogs</a></li>
                    <li class="mr-12"><a class="text-gray-500 hover:text-gray-400" href="index.php?halaman=about">About</a></li>
                </ul>
            </div>
            <div class="hidden lg:flex items-center pl-16 py-8 border-l">
                <div class="ml-3 relative">
                    <div><a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button type="button"
                                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                     src="../../webadmin/contents/forms/userProfiles/<?php echo $avatar ?>"
                                     alt="">
                            </button>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="account.php">Account Settings</a>
                            <a class="dropdown-item" href="post.php">Create Post</a>
                            <a class="dropdown-item" href="handler/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>


        </nav>
    </section>
    <?php
} else {
    ?>
    <section class="bg-black overflow-hidden">
        <nav class="relative z-10 flex px-16 justify-between bg-transparent border-b">
            <div class="pr-14 py-8 lg:border-r">
                <a class="inline-block text-xl text-white font-medium font-heading" href="#">
                    <img class="h-8" width="auto" src="../../assets/icon-white.png" alt=""></a>
            </div>
            <button class="navbar-burger lg:hidden self-center">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="6" width="24" height="2" fill="white"></rect>
                    <rect y="11" width="24" height="2" fill="white"></rect>
                    <rect y="16" width="24" height="2" fill="white"></rect>
                </svg>
            </button>
            <div class="hidden lg:block py-8 lg:absolute lg:top-1/2 lg:left-1/2 lg:transform lg:-translate-y-1/2 lg:-translate-x-1/2">
                <ul class="flex justify-center">
                    <li class="mr-12"><a class="text-gray-500 hover:text-gray-400" href="index.php">Home</a></li>
                    <li class="mr-12"><a class="text-gray-500 hover:text-gray-400" href="blog.php">Blogs</a></li>
                    <li class="mr-12"><a class="text-gray-500 hover:text-gray-400" href="about.php">About</a></li>
                </ul>
            </div>
            <div class="hidden lg:flex items-center pl-16 py-8 border-l">
                <div class="flex items-center">
                    <a class="inline-block text-sm text-white hover:underline font-heading" href="sign-in.php">Login</a>
                    <span class="mx-2 text-white">/</span>
                    <a class="inline-block text-sm text-white hover:underline font-heading" href="sign-up.php">Sign
                        Up</a>
                </div>
            </div>
        </nav>
    </section>

    <div class="hidden navbar-menu fixed top-0 left-0 bottom-0 w-5/6 max-w-sm z-50">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="relative flex flex-col py-8 px-10 w-full h-full bg-black border-r overflow-y-auto"><a
                    class="inline-block text-xl text-white font-medium font-heading mb-16 md:mb-32" href="#">
                <img class="h-8" width="auto" src="boldui-assets/logo/logo-boldui-light.svg" alt=""></a>
            <ul class="mb-32">
                <li class="mb-10">
                    <a class="flex items-center" href="#">
                        <span class="mr-3 text-lg text-white">Home</span>
                        <path d="M12.01 3.48047H0V5.57278H12.01V8.71124L16 4.52663L12.01 0.34201V3.48047Z"
                              fill="#FFEC3E"></path>
                    </a>
                </li>
                <li class="mb-10">
                    <a class="flex items-center" href="#">
                        <span class="mr-3 text-lg text-white">Blogs</span>
                        <path d="M12.01 3.48047H0V5.57278H12.01V8.71124L16 4.52663L12.01 0.34201V3.48047Z"
                              fill="#FFEC3E"></path>
                    </a>
                </li>
                <li class="mb-10">
                    <a class="flex items-center" href="#">
                        <span class="mr-3 text-lg text-white">About</span>
                        <path d="M12.01 3.48047H0V5.57278H12.01V8.71124L16 4.52663L12.01 0.34201V3.48047Z"
                              fill="#FFEC3E"></path>
                    </a>
                </li>
                <li>
                    <a class="flex items-center" href="#">
                        <span class="mr-3 text-lg text-white">Contact</span>
                        <path d="M12.01 3.48047H0V5.57278H12.01V8.71124L16 4.52663L12.01 0.34201V3.48047Z"
                              fill="#FFEC3E"></path>
                    </a>
                </li>
            </ul>
            <a class="flex mb-8 items-center justify-center py-4 px-6 rounded-full bg-yellow-300 hover:bg-yellow-400 transform duration-200"
               href="#">
                <svg class="mr-3" width="16" height="9" viewbox="0 0 16 9" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.01 3.16553H0V5.24886H12.01V8.37386L16 4.20719L12.01 0.0405273V3.16553Z"
                          fill="black"></path>
                </svg>
                <span class="text-sm font-medium uppercase tracking-wider">Sign Up</span>
            </a>
            <a class="flex mb-10 items-center text-white hover:underline" href="#">
                <span class="mr-2 text-sm">Log In</span>
                <svg width="16" height="10" viewbox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.01 3.95383H0V6.04614H12.01V9.1846L16 4.99998L12.01 0.815369V3.95383Z"
                          fill="#FFEC3E"></path>
                </svg>
            </a>
            <p class="text-sm text-gray-500">All rights reserved © BoldUI 2021</p>
        </nav>
    </div>

    <?php
}
?>
