<?php include "include/header.php" ?>

<body>
    <style>

    </style>
    <!-- :::::::::: Header Section Start :::::::: -->

    <!-- ::::::::::: Header Section End ::::::::: -->


    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="#">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <a href="single.php" class="active">Blog<a>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>

            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Posts Start -->
                <div class="col-md-8">
                    <!-- dynamic post section start  -->
                    <?php
                    if(isset($_POST['searchbtn'])){
                        $search_button=$_POST['search'];
                        $sql = "SELECT * FROM post WHERE post_title LIKE '%$search_button%' OR post_des LIKE '%$search_button%' order by post_id DESC";
                        $student_data = mysqli_query($db, $sql);
                    
                    while ($row = mysqli_fetch_assoc($student_data)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_des = $row['post_des'];
                        $image = $row['image'];
                        $category_id = $row['category_id'];
                        $user_id = $row['user_id'];
                        $tag = $row['tag'];
                        $status = $row['status'];
                        $post_date = $row['post_date'];

                    ?>
                        <!-- Single Item Blog Post Start -->
                        <div class="blog-post">
                            <!-- Blog Banner Image -->
                            <div class="blog-banner">
                                <a href="single.html">
                                    <img src="admin/image/Post/<?php echo $image; ?>">
                                    <!-- Post Category Names -->
                                    <div class="blog-category-name">

                                        <!-- category dynamic post start -->
                                        <?php
                                        $cat_sql = "SELECT * FROM category_table WHERE category_id='$category_id'";
                                        $cat_data = mysqli_query($db, $cat_sql);
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($cat_data)) {
                                            $category_id = $row['category_id'];
                                            $cat_name = $row['cat_name'];
                                        }
                                        ?>
                                        <h6><?php echo $cat_name; ?></h6>
                                        <!-- category dynamic post end -->

                                    </div>
                                </a>
                            </div>
                            <!-- Blog Title and Description -->
                            <div class="blog-description">
                                <a href="#">
                                    <h3 class="post-title"><?php echo $post_title; ?></h3>
                                </a>
                                <p><?php echo substr($post_des, 0, 200) . "...!"; ?></p>
                                <!-- Blog Info, Date and Author -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="blog-info">
                                            <ul>
                                                <!-- date function dynamic start -->
                                                <?php
                                                $date = date_create("2023-11-18");
                                                $date_fuc = date_format($date, "d/m/Y");
                                                $date_sql = "SELECT * FROM post";
                                                $date_data = mysqli_query($db, $date_sql);
                                                $i = 0;
                                                while ($row = mysqli_fetch_assoc($date_data)) {
                                                    $post_date = $row['post_date'];
                                                    $i++;
                                                }
                                                ?>

                                                <li><i class="fa fa-calendar"></i><?php echo $date_fuc ?></li>

                                                <!-- date function dynamic start -->

                                                <!-- Blog Info, Date and Author dynamic start -->
                                                <?php
                                                $user_sql = "SELECT * FROM user_table where user_id='$user_id'";
                                                $user_data = mysqli_query($db, $user_sql);
                                                $i = 0;
                                                while ($row = mysqli_fetch_assoc($user_data)) {
                                                    $user_id = $row['user_id'];
                                                    $user_name = $row['user_name'];

                                                    $i++;
                                                ?>
                                                <?php } ?>
                                                <li><i class="fa fa-user"></i><?php echo $user_name; ?></li>
                                                <!-- Blog Info, Date dynamic start -->

                                                <li><i class="fa fa-heart"></i>(50)</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4 read-more-btn">
                                        <a href="single.php?newpage=<?php echo $post_id ?>" type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item Blog Post End -->
                    <?php }} 
                        elseif(isset($_GET['MetaTag'])){
                            $tag_button=$_GET['MetaTag'];
                            $tag_sql = "SELECT * FROM post WHERE post_title LIKE '%$tag_button%' OR post_des LIKE '%$tag_button%' OR tag LIKE '%$tag_button%' order by post_id DESC";
                            $student_data = mysqli_query($db, $tag_sql);
                        
                        while ($row = mysqli_fetch_assoc($student_data)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_des = $row['post_des'];
                            $image = $row['image'];
                            $category_id = $row['category_id'];
                            $user_id = $row['user_id'];
                            $tag = $row['tag'];
                            $status = $row['status'];
                            $post_date = $row['post_date'];
    
                        ?>
                            <!-- Single Item Blog Post Start -->
                            <div class="blog-post">
                                <!-- Blog Banner Image -->
                                <div class="blog-banner">
                                    <a href="single.html">
                                        <img src="admin/image/Post/<?php echo $image; ?>">
                                        <!-- Post Category Names -->
                                        <div class="blog-category-name">
    
                                            <!-- category dynamic post start -->
                                            <?php
                                            $cat_sql = "SELECT * FROM category_table WHERE category_id='$category_id'";
                                            $cat_data = mysqli_query($db, $cat_sql);
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($cat_data)) {
                                                $category_id = $row['category_id'];
                                                $cat_name = $row['cat_name'];
                                            }
                                            ?>
                                            <h6><?php echo $cat_name; ?></h6>
                                            <!-- category dynamic post end -->
    
                                        </div>
                                    </a>
                                </div>
                                <!-- Blog Title and Description -->
                                <div class="blog-description">
                                    <a href="#">
                                        <h3 class="post-title"><?php echo $post_title; ?></h3>
                                    </a>
                                    <p><?php echo substr($post_des, 0, 200) . "...!"; ?></p>
                                    <!-- Blog Info, Date and Author -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="blog-info">
                                                <ul>
                                                    <!-- date function dynamic start -->
                                                    <?php
                                                    $date = date_create("2023-11-18");
                                                    $date_fuc = date_format($date, "d/m/Y");
                                                    $date_sql = "SELECT * FROM post";
                                                    $date_data = mysqli_query($db, $date_sql);
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_assoc($date_data)) {
                                                        $post_date = $row['post_date'];
                                                        $i++;
                                                    }
                                                    ?>
    
                                                    <li><i class="fa fa-calendar"></i><?php echo $date_fuc ?></li>
    
                                                    <!-- date function dynamic start -->
    
                                                    <!-- Blog Info, Date and Author dynamic start -->
                                                    <?php
                                                    $user_sql = "SELECT * FROM user_table where user_id='$user_id'";
                                                    $user_data = mysqli_query($db, $user_sql);
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_assoc($user_data)) {
                                                        $user_id = $row['user_id'];
                                                        $user_name = $row['user_name'];
    
                                                        $i++;
                                                    ?>
                                                    <?php } ?>
                                                    <li><i class="fa fa-user"></i><?php echo $user_name; ?></li>
                                                    <!-- Blog Info, Date dynamic start -->
    
                                                    <li><i class="fa fa-heart"></i>(50)</li>
                                                </ul>
                                            </div>
                                        </div>
    
                                        <div class="col-md-4 read-more-btn">
                                            <a href="single.php?newpage=<?php echo $post_id ?>" type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item Blog Post End -->
                        <?php }}
                    ?>
                    <!-- dynamic post section end  -->
                    <!-- Blog Paginetion Design Start -->
                    <div class="paginetion">
                        <ul>
                            <!-- Next Button -->
                            <li class="blog-prev">
                                <a href=""><i class="fa fa-long-arrow-left"></i> Previous</a>
                            </li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li class="active"><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href="">5</a></li>
                            <!-- Previous Button -->
                            <li class="blog-next">
                                <a href=""> Next <i class="fa fa-long-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Blog Paginetion Design End -->
                </div>
                
                <!-- Blog Right Sidebar -->
                <?php include "include/sidebar.php"?>
                <!-- Right Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->




    <!-- :::::::::: Footer Buy Now Section Start :::::::: -->
    <section class="buy-now">
        <div class="container">
            <!-- But Now Row Start -->
            <div class="row">
                <!-- Left Side Content -->
                <div class="col-md-9">
                    <h4><span>Blue Chip</span> - Multipurpose Business Corporate Website Template</h4>
                </div>
                <!-- Right Side Button -->
                <div class="col-md-3">
                    <button type="button" class="btn-main"><i class="fa fa-cart-plus"></i> Buy Now</button>
                </div>
            </div>
            <!-- But Now Row End -->
        </div>
    </section>
    <!-- ::::::::::: Footer Buy Now Section End ::::::::: -->


    <!-- :::::::::: Footer Section Start :::::::: -->
    <?php include "include/fotter.php" ?>