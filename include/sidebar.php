<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="col-md-4">

<!-- Latest News -->
<div class="widget">
    <h4>Latest News</h4>
    <div class="title-border"></div>

    <!-- Sidebar Latest News Slider Start -->
    <div class="sidebar-latest-news owl-carousel owl-theme">

        <!-- First Latest News Start -->
        <?php
        $sql = "SELECT * FROM post order by post_id DESC";
        $student_data = mysqli_query($db, $sql);
        $i = 0;
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
            $i++;
        ?>
            <div class="item">
                <div class="latest-news">
                    <!-- Latest News Slider Image -->
                    <div class="latest-news-image">
                        <a href="#scrol">
                            <img src="admin/image/Post/<?php echo $image; ?>">
                        </a>
                    </div>
                    <!-- Latest News Slider Heading -->
                    <h5><?php echo $post_title; ?></h5>
                    <!-- Latest News Slider Paragraph -->
                    <p><?php echo substr($post_des, 0, 200) . "...!"; ?></p>
                </div>
            </div>
            <!-- First Latest News End -->
        <?php } ?>
    </div>
    <!-- Sidebar Latest News Slider End -->
</div>
<!-- Search Bar Start -->
<div class="widget">
    <!-- Search Bar -->
    <h4>Blog Search</h4>
    <div class="title-border"></div>
    <div class="search-bar">
        <!-- Search Form Start -->
        <form action="search.php" method="POST">
            <div class="form-group">
                <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input">
                <i class="fa fa-paper-plane-o"></i>
                <button class="btn btn-primary mt-2 btn-main" type="submit" name="searchbtn">Search Here</button>
            </div>
        </form>
        <!-- Search Form End -->
    </div>
</div>
<!-- Search Bar End -->

<!-- Recent Post -->
<div class="widget">
    <h4>Recent Posts</h4>
    <div class="title-border"></div>
    <!-- Recent Post Item Content Start -->
    <?php
    $date = date_create("2023-11-18");
    $date_fuc = date_format($date, "d/m/Y");
    $sql = "SELECT * FROM post order by post_id DESC;";
    $student_data = mysqli_query($db, $sql);
    $i = 0;
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
        $i++;
    ?>
        <div class="recent-post">
            <div class="recent-post-item">
                <div class="row">
                    <!-- Item Image -->
                    <div class="col-md-4">
                        <img src="admin/image/Post/<?php echo $image; ?>">
                    </div>
                    <!-- Item Tite -->
                    <div class="col-md-8 no-padding">
                        <h5><a href="single.php"><?php echo $post_title; ?></a></h5>
                        <ul>
                            <li><i class="fa fa-clock-o"></i><?php echo $date_fuc; ?></li>

                            <li><i class="fa fa-comment-o"></i>15</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Recent Post Item Content End -->
        </div>
    <?php } ?>
</div>
<!-- All Category -->
<div class="widget">
    <h4>Blog Categories</h4>
    <div class="title-border"></div>
    <!-- Blog Category Start -->
    <div class="blog-categories">
        <ul>
            <?php
            $cat_sql = "SELECT * FROM category_table order by category_id DESC";
            $cat_data = mysqli_query($db, $cat_sql);
            $i = 0;
            while ($row = mysqli_fetch_assoc($cat_data)) {
                $category_id = $row['category_id'];
                $cat_name = $row['cat_name'];
                $is_parent = $row['is_parent'];
            ?>
                <!-- Category Item -->
                <li>
                    <i class="fa fa-check"></i>
                    <a href="search.php?MetaTag=<?php echo $cat_name ?>"><?php echo $cat_name; ?></a>
                    <?php 
                         $sql = "SELECT * FROM post where category_id='$category_id'";
                         $student_data = mysqli_query($db, $sql);
                         $post_count=mysqli_num_rows($student_data);
                    ?>
                    <span><b><?php echo $post_count ?></b></span>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- Blog Category End -->
</div>
<!-- Recent Comments -->
<div class="widget">
    <h4>Recent Comments</h4>
    <div class="title-border"></div>
    <div class="recent-comments">
    <?php 
                  $sql= "SELECT * FROM comment order by comment_id  DESC";
                  $student_data= mysqli_query($db,$sql);
                  $i=0;
                  while($row = mysqli_fetch_assoc($student_data)){
                    $comment_id =$row['comment_id'];
                      $cuser_name=$row['cuser_name'];
                      $cuser_mail=$row['cuser_mail'];
                      $subject=$row['subject'];
                      $coment=$row['coment'];
                      $status=$row['status'];
                      $cdate=$row['cdate'];
                      
                      $i++;
                  
              ?>
        <!-- Recent Comments Item Start -->
        <div class="recent-comments-item">
            <div class="row">
                <!-- Comments Thumbnails -->
                <div class="col-md-4">
                    <i class="fa fa-comments-o"></i>
                </div>
                <!-- Comments Content -->
                
                <div class="col-md-8 no-padding">
                    <h5><?php echo $cuser_name ?></h5>
                    <!-- Comments Date -->
                    <ul>
                        <li>
                            <i class="fa fa-clock-o"></i><?php echo $cdate ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<!-- Meta Tag -->
<div class="widget">
    <h4>Tags</h4>

    <div class="title-border"></div>
    <!-- Meta Tag List Start -->
    <div class="meta-tags">
    <?php
            $tag_sql="SELECT * FROM post ORDER BY post_id DESC";
            $students=mysqli_query($db,$tag_sql);
            while($row=mysqli_fetch_assoc($students)){
            $tag=$row['tag'];
            $meta_tags = explode(' ', $tag);
            foreach($meta_tags as $tag){ ?>
            <a href="search.php?MetaTag=<?php echo $tag ?>"><span><?php echo $tag ?></span></a>
            <!-- Meta Tag List End -->
        <?php }} ?>
    </div>
</div>
<div class="n-btn">
    <a id="scrol" href="" style="
            padding: 10px 15px;
            border-radius: 10px;
            background-color: #2f5888;
            color: #fff;
    "><i class="fa-solid fa-angle-up"></i></a>
</div>
</div>