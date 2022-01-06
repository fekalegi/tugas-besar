<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogs </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Krona+One&family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="css/tailwind/tailwind.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/icon.jpg">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="js/main.js"></script>

    <script>
        function search() {
            $param = document.getElementById('post-param').value;
            location.href = "blog.php?parameter=" + $param;
        }
    </script>
</head>
<body class="antialiased bg-body text-body font-body">
<div class="">


    <?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', true);
    //Initiate Class User to get table data
    include "handler/findPosts.php";
    $post = new Posts();
    include "header.php";

    if (isset($_GET['page'])) {
        $postid = $_GET['page'];
        $content = $post->getByID($postid);
        if ($content != null) {
            $arr = json_decode($content);
            foreach ($arr as $key) {
                ?>
                <section class="relative py-24 bg-black overflow-hidden"><img
                            class="absolute top-0 left-0 mt-64 lg:mt-0 object-contain"
                            src="boldui-assets/elements/shadow-team-light-blue.svg" alt="">
                    <div class="relative container mx-auto px-4">
                        <div class="flex flex-wrap items-center justify-center -mx-4">

                            <div class="w-full lg:w-auto text-center mx-auto">
                                <h1 class="font-semibold text-blue-400"><?php echo $key->title ?></h1>
                                <div class="mt-8 max-w-md mx-auto">
                                    <img class="h-96 mx-auto rounded-md"
                                         src="../../webadmin/contents/forms/userProfiles/<?php echo $key->header_image ?>"
                                         alt="">
                                    <p class="mb-10 text-sm text-white"> <?php echo $key->created_date ?> | author : <?php echo $key->author ?></p>
                                    <p class="mb-10 text-lg text-white"></p>



                                    <div class="mt-8 max-w-md mx-auto text-white"><?php echo htmlspecialchars_decode($key->body) ?></div>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <?php
            }
        }
        ?>

        <?php
    } else {


        //Pagination
        $records = $post->getPagination();
        $total_records = json_decode($records);
        $total_records = $total_records->total_records;
        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }
        $total_records_per_page = 5;
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        $second_last = $total_no_of_pages - 1; // total pages minus 1
        $offset = ($page_no - 1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";

        ?>
        <section class="py-24 bg-black overflow-hidden">
            <?php
            if (isset($_GET['parameter'])) {
                $parameter = $_GET['parameter'];
            } else {
                $parameter = null;
            }

            $result = $post->getAll($total_records_per_page, $offset, $parameter);
            if ($result != null) {
                $arr = json_decode($result);
                ?>
                <div class="container mx-auto px-4">
                    <!--Check if user has logged in-->
                    <?php
                    if (isset($_SESSION['username'])) {
                        ?>
                        <div class="flex flex-wrap justify-between items-center mb-4">
                            <a href="post.php">
                                <button type="button"
                                        class="inline-flex text-black w-full md:w-auto items-center justify-center py-2 px-6 rounded-md bg-gray-300 hover:text-white hover:bg-red-400 duration-200 ">
                                    <i class="bi bi-search"> + Create New Post</i>
                                </button>
                            </a>
                        </div>
                        <?php
                    }
                    ?>


                    <div class="flex flex-wrap justify-between items-center mb-16">
                        <div class="max-w-xl mb-6 md:mb-0">
                            <input type="text" id="post-param" placeholder="Search ..."
                                   class="inline-flex w-full md:w-auto items-center justify-center py-4 px-6 rounded-full bg-yellow-300 hover:bg-yellow-400 duration-200">
                        </div>
                        <button onclick="search()" type="button" id="btnSearch" name="btn-search-post"
                                class="btn-search-post inline-flex w-full md:w-auto items-center justify-center py-4 px-6 rounded-full bg-gray-300 hover:bg-yellow-400 duration-200">
                            <i class="bi bi-search">Search</i>
                        </button>
                    </div>
                    <div class="flex flex-wrap -mx-4">
                        <?php
                        foreach ($arr as $key) {
                            ?>
                            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-6">
                                <a class="block h-full p-10 border hover:border-gray-600"
                                   href="blog.php?page=<?php echo $key->id ?>">
                                    <div class="mx-auto">
                                        <img class="h-full w-full"
                                             src="../../webadmin/contents/forms/userProfiles/<?php echo $key->header_image ?>"
                                             alt="">
                                    </div>
                                    <span class="font-semibold text-xs text-blue-500"><?php echo $key->created_date ?>
                                <h5 class="font-semibold text-xs text-white">author : <?php echo $key->author ?></h5>
                                </span>
                                    <h3 class="mb-5 mt-2 text-2xl text-white font-heading"><?php echo $key->title ?></h3>
                                </a>
                            </div>
                            <?php
                        } ?>
                    </div>
                </div>
                <div class="pt-6"></div>
                <div class="px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="text-white">
                        <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
                    </div>
                    <div>
                        <nav aria-label="Page navigation example"
                             class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                            <ul class="pagination">
                                <?php
                                if ($total_no_of_pages <= 10) {
                                    if ($page_no <= 1) {
                                        echo "<li class='page-item disabled'><a class='page-link'>Previous</a> </li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=$previous_page'>Previous</a></li>";
                                    }
                                    for ($counter = 1;
                                         $counter <= $total_no_of_pages;
                                         $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                        } else {
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                    if ($page_no >= $total_no_of_pages) {
                                        echo "<li class='page-item disabled'><a class='page-link'>Next</a> </li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=$next_page'>Next</a></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap justify-between items-center mb-16">
                        <div class="max-w-xl mb-6 md:mb-0">
                            <input type="text" id="post-param" placeholder="Search ..."
                                   class="inline-flex w-full md:w-auto items-center justify-center py-4 px-6 rounded-full bg-yellow-300 hover:bg-yellow-400 duration-200">
                        </div>
                        <button onclick="search()" type="button" id="btnSearch" name="btn-search-post"
                                class="btn-search-post inline-flex w-full md:w-auto items-center justify-center py-4 px-6 rounded-full bg-gray-300 hover:bg-yellow-400 duration-200">
                            <i class="bi bi-search">Search</i>
                        </button>
                    </div>
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-6">
                            <a class="block h-full p-10 border hover:border-gray-600"
                               href="blog.php">
                                <div class="mx-auto">
                                    <img class="h-full w-full"
                                         src="../../assets/no-image.jpg"
                                         alt="">
                                </div>
                                <span class="font-semibold text-xs text-blue-500"></span>
                                <h3 class="mb-5 mt-2 text-2xl text-white font-heading">404 Not Found</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <?php

            }
            ?>
        </section>
        <?php
    }

    ?>

    <?php
    include_once 'footer.php' ?>

</div>
</body>
</html>

