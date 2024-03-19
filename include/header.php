<?php include "admin/Include/db.php" ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Website Description -->
    <meta name="description" content="Blue Chip: Corporate Multi Purpose Business Template" />
    <meta name="author" content="Blue Chip" />

    <!--  Favicons / Title Bar Icon  -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon/favicon.png" />

    <title>Blue Chip | Blog Right Sidebar</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <!-- Flat Icon CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

    <!-- Fency Box CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">

    <!-- Theme Main Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  </head>
  <body>
  <header>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Bangladesh News</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto">
        <?php 
            $navbar_query="SELECT cat_name AS 'NavCatName', category_id AS 'NavCatId' FROM category_table WHERE status='1' AND is_parent='0' ORDER BY cat_name ASC";
            $nav_result= mysqli_query($db,$navbar_query);
            while($nav_row=mysqli_fetch_assoc($nav_result)){
              extract($nav_row);
              $sub_query="SELECT cat_name AS 'SubCatName', category_id AS 'SubCatId' FROM category_table WHERE is_parent='$NavCatId' AND status='1'";
              $sub_result= mysqli_query($db,$sub_query);
              $sub_count=mysqli_num_rows($sub_result);
            
        ?>
        <?php if($sub_count==0){ ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><?= $NavCatName ?></a>
        </li>
        <?php } else{ ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <?= $NavCatName ?>
          </a>
          <ul class="dropdown-menu">
            <?php
              while($nav_row=mysqli_fetch_assoc($sub_result)){
                extract($nav_row); 
            ?>
            <li><a class="dropdown-item" href="#"><?= $SubCatName?></a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } }?>
      </ul>
    </div>
  </div>
  </nav>
      </div>
    </div>
  </div>
</header>
  </body>





  