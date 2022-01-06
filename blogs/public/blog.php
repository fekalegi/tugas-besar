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
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-tailwind.png">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/main.js"></script>
</head>
<body class="antialiased bg-body text-body font-body">
<div class="">
    <?php

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', true);
    //Initiate Class User to get table data
    include "handler/findPosts.php";
    $post = new Posts();

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

    <?php
    include "header.php";
    ?>

    <section class="py-24 bg-black overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center mb-16">
                <div class="max-w-xl mb-6 md:mb-0">
                    <input type="text" id="user-param" placeholder="Search ..."
                           class="inline-flex w-full md:w-auto items-center justify-center py-4 px-6 rounded-full bg-yellow-300 hover:bg-yellow-400 duration-200">
                </div>
                <button type="button" id="btnSearch" name="btn-search-user"
                        class="inline-flex w-full md:w-auto items-center justify-center py-4 px-6 rounded-full bg-yellow-300 hover:bg-yellow-400 duration-200">
                    <i class="bi bi-search">Search</i>
                </button>
                <?php
                if (isset($_GET['parameter'])) {
                    $parameter = $_GET['parameter'];
                } else {
                    $parameter = null;
                }

                $result = $post->getAll($total_records_per_page, $offset, $parameter);
                $arr = json_decode($result);
                ?>
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
                            <span class="font-semibold text-xs text-blue-500"><?php echo $key->created_date ?></span>
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
    </section>

    <?php
    include_once 'footer.php'?>

</div>
</body>
</html>

