
<!-- header include -->
<?php include "Include/header.php" ?>
<!-- header include end -->

  <!-- Navbar include -->
<?php include "Include/navbar.php"?>
  <!-- Navbar inclue end -->

  <!-- menu aside include -->
<?php include "Include/menu.php"?>
  <!-- menu aside inclue end -->
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span class="m-0 text-dark">Dashboard</span>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
            $do=isset($_GET['do']) ? $_GET['do']:'Manage';
// manage data...............................................
if($do=='Manage'){

           
  ?>
  <div class="col-md-12">
      <table class="table text-center mytable">
          <thead>
              <tr>
              <th scope="col">SI</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Category</th>
              <th scope="col">Author</th>
              <th scope="col">Tag</th> 
              <th scope="col">Status</th> 
              <th scope="col">Post Date</th> 
              <th scope="col">Action</th> 
              </tr>
          </thead>
          <tbody>
              <?php 
                  $sql= "SELECT * FROM post order by post_id DESC";
                  $student_data= mysqli_query($db,$sql);
                  $i=0;
                  while($row = mysqli_fetch_assoc($student_data)){
                    $post_id=$row['post_id'];
                      $post_title=$row['post_title'];
                      $post_des=$row['post_des'];
                      $image=$row['image'];
                      $category_id=$row['category_id'];
                      $user_id=$row['user_id'];
                      $tag=$row['tag'];
                      $status=$row['status'];
                      $post_date=$row['post_date'];
                      
                      $i++;
                  
              ?>
              <tr>
              <th scope="row"><?php echo $i ?></th>
              <td><?php echo $post_title ?></td>
              <td><?php echo $post_des?></td>
              <td><img class="rounded -circle myimg" src="image/Post/<?php echo $image ?>"></td>
              <!-- Regerantial intrigation category table and user table goes to post table -->
              <!-- category table -->
              <td><?php 
                if($category_id==0){
                  echo 'No Category';
                }
                else{
                  $sql="SELECT * FROM category_table WHERE category_id='$category_id'";
                  $all_product= mysqli_query($db,$sql);
                  while($row = mysqli_fetch_assoc($all_product)){
                        $category_id =$row['category_id'];
                        $cat_name=$row['cat_name'];

                  }
                  echo $cat_name;
                }
              ?></td>
              <!-- user or author table -->
              <td><?php 
                if($user_id==0){
                  echo 'No Users';
                }
                else{
                  $sql="SELECT * FROM user_table WHERE user_id='$user_id'";
                  $all_product= mysqli_query($db,$sql);
                  while($row = mysqli_fetch_assoc($all_product)){
                        $user_id =$row['user_id'];
                        $user_name=$row['user_name'];

                  }
                  echo $user_name;
                }
              ?></td>
              <!-- Regerantial intrigation category table and user table goes to post table End -->

              <td><?php echo $tag ?></td>

              <td><?php
                    if($status==1){?>
                        <span class="badge badge-success">Published</span><?php
                    }
                    else{?>
                    <span class="badge badge-danger">Draft</span><?php
                    }
                    echo '' ?></td>
                  <td><?php echo $post_date ?></td>
              <td>
                  <div class="icon">  
                      <a href="Post.php?do=Edit&update=<?php echo $post_id ?>"><i class="fa-sharp fa-solid fa-pen-to-square fa-lg" style="color:#252525;"></i></a>
                      <a href="Post.php?do=Delete&delete=<?php echo $post_id ?>"><i class="fa-solid fa-trash  fa-lg" style="color: #252525;"></i></a>
                  </div>
              </td>
              </tr>
              <?php } 
              ?>
          </tbody>
      </table>
      <?php }
//add data...................................................
elseif($do =='Add'){ ?>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form class="from" method="POST" Action="Post.php?do=Insert" enctype="multipart/form-data">

          <div class="mb-3">
              <label for="input1" class="form-label">Title</label>
              <input type="text" name="post_title" required class="form-control" id="input1">
          </div>
          <div class="mb-3">
              <label for="input1" class="form-label">Description</label>
              <input type="text" name="post_des" required class="form-control" id="input1">
          </div>

          <div class="mb-3">
              <label for="formFile" class="form-label"></label>
              <input class="form-control" name="image" required type="file" id="formFile">
          </div>
          <!-- refarential intrigation category table and user table  -->
          <div class="mb-3">
                <label >Category</label>
                <select name="category_id" class="form-control">
                    <option>Please Select Your Category</option>
                    <?php 
                        $sql="SELECT * FROM category_table";
                        $all_product= mysqli_query($db,$sql);
                        while($row = mysqli_fetch_assoc($all_product)){
                              $category_id =$row['category_id'];
                              $cat_name=$row['cat_name'];
      
                        
                    ?>
                    <option value="<?php echo $category_id?>"><?php echo $cat_name?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- user data add -->
          <div class="mb-3">
                <label >Author</label>
                <select name="user_id" class="form-control">
                    <option>Please Select Your Category</option>
                    <?php 
                        $sql="SELECT * FROM user_table";
                        $all_product= mysqli_query($db,$sql);
                        while($row = mysqli_fetch_assoc($all_product)){
                              $user_id =$row['user_id'];
                              $user_name=$row['user_name'];
      
                        
                    ?>
                    <option value="<?php echo $user_id?>"><?php echo $user_name?></option>
                    <?php } ?>
                </select>
            </div>
          <!-- refarential intrigation category table and user table end  -->
          <div class="mb-3">
              <label for="input1" class="form-label">Tags</label>
              <input type="text" name="tag"  class="form-control" id="input1">
          </div>
            <!-- post status -->
          <div class="mb-3">
                  <label >Status</label>
                  <select name="status" class="form-control">
                      <option selected>Please Select User Account Status</option>
                      <option value="0">Draft</option>
                      <option value="1">Published</option>
                  
                  </select>
              </div>
            <!-- post status end -->
            <div class="mb-3">
              <label for="input1" class="form-label">Post Date</label>
              <input type="date" name="post_date" class="form-control" id="input1">
          </div>
          <button type="submit" name="submit" class="btn btn-dark mybtn">Publish</button>

        </form>
       </div>
      </div>

    <?php 
}

    // insert data
    elseif($do == 'Insert'){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $post_title=$_POST['post_title'];
      $post_des=$_POST['post_des'];
      $image=$_POST['image'];
      $category_id=$_POST['category_id'];
      $user_id=$_POST['user_id'];
      $tag=$_POST['tag'];
      $status=$_POST['status'];
      $post_date=$_POST['post_date'];
        //image validation...................................................................?

      $ImageName=$_FILES['image']['name'];
      $ImageSize=$_FILES['image']['size'];
      $ImageTmp=$_FILES['image']['tmp_name'];


      $Expolded=explode('.',$_FILES['image']['name']);
      $last_dot_element=end($Expolded);
      $Image_Extention=strtolower($last_dot_element);
      $Image_Allowed_Extention=array("jpg","jpeg","png");

      $formerrors=array();
      if(!empty($ImageName)){
          if(!empty($ImageName) && !in_array($Image_Extention, $Image_Allowed_Extention)){
              $formerrors='Invalid Image Format';
          }
          if(!empty($ImageSize) && $ImageSize>2097152){
              $formerrors='Invalid is Too large! Allowed Image size is 2MB';
              ?>
              <i class="fa-regular fa-face-sad-cry fa-fade micon" style="color: #ffffff;"></i>
         <h1>OOPS!!</h1>
         <h5><?php echo $formerrors;?></h5>
          <button type="submit" class="btn btn-dark mybtn1"><a href="Post.php?do=Add">TryAgain</a></button>
         <?php
          }
      }
      // if(!empty($formerrors)){
      //     header("Location:Post.php?do=Add");
      //     exit();
      // }
      if(empty($formerrors)){
          $image=rand(0,999).'_'.$ImageName;
          //upload image to is own folder
          move_uploaded_file($ImageTmp,"image\\Post\\".$image);
      $sql="INSERT INTO `post` (`post_title`,`post_des`,`image`,`category_id`,`user_id`,`tag`,`status`,`post_date`) VALUES ('$post_title','$post_des','$image','$category_id','$user_id','$tag','$status',now() )";
   
      $std_data=mysqli_query($db,$sql);
      if($std_data){
          header("location:Post.php?do=Manage");
      }

      else{
          echo die("Database Connected Error".mysqli_error($db));
      }}}
   }

elseif($do == 'Edit'){
  if(isset($_GET['update'])){
      $updateID=$_GET['update'];
      $sql="SELECT * FROM post WHERE post_id='$updateID' ";
      $allstd=mysqli_query($db,$sql);
      while($row=mysqli_fetch_assoc($allstd)){

          $id=$row['post_id'];
          $post_title=$row['post_title'];
          $post_des=$row['post_des'];
          $image=$row['image'];
          $category_id=$row['category_id'];
          $user_id=$row['user_id'];
          $tag=$row['tag'];
          $status=$row['status'];
          $post_date=$row['post_date'];
                  ?>


        <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <form class="from" method="POST" action="" enctype="multipart/form-data">

                  <div class="mb-3">
                      <label for="input1" class="form-label">Title</label>
                      <input type="text" name="post_title" required class="form-control" id="input1" value="<?php echo $post_title; ?>">
                  </div>
                  <div class="mb-3">
                      <label for="input1" class="form-label">Description</label>
                      <input type="text" name="post_des" required class="form-control" id="input1" value="<?php echo $post_des; ?>">
                  </div>

                  <div class="mb-3">
                        <?php 
                            if(!empty($image)){
                                ?>
                                <img class="mb-3" height="auto" width="100px" style="border-radius: 10px;" src="image/Post/<?php echo $image?>">
                                <?php }
                                else{
                                    ?><span><?php echo "No Image Uploaded";?></span>
                                    <?php
                                }
                            ?>
                            <label for="formFile" class="form-label"></label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                  <!-- refarential intrigation category table and user table  -->
                  <div class="mb-3">
                        <label >Category</label>
                        <select name="category_id" class="form-control" value="<?php echo $category_id; ?>">
                            <option>Please Select Your Category</option>
                            <?php 
                                $sql="SELECT * FROM category_table";
                                $all_product= mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($all_product)){
                                      $category_id =$row['category_id'];
                                      $cat_name=$row['cat_name'];
              
                                
                            ?>
                            <option value="<?php echo $category_id?>"><?php echo $cat_name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- user data add -->
                  <div class="mb-3">
                        <label >Author</label>
                        <select name="user_id" class="form-control" value="<?php echo $user_id; ?>">
                            <option>Please Select Your Category</option>
                            <?php 
                                $sql="SELECT * FROM user_table";
                                $all_product= mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($all_product)){
                                      $user_id =$row['user_id'];
                                      $user_name=$row['user_name'];
              
                                
                            ?>
                            <option value="<?php echo $user_id?>"><?php echo $user_name?></option>
                            <?php } ?>
                        </select>
                    </div>
                  <!-- refarential intrigation category table and user table end  -->
                  <div class="mb-3">
                      <label for="input1" class="form-label">Tags</label>
                      <input type="text" name="tag" required class="form-control" id="input1" value="<?php echo $tag; ?>">
                  </div>
                    <!-- post status -->
                  <div class="mb-3">
                          <label >Status</label>
                          <select name="status" class="form-control" value="<?php echo $status; ?>">
                              <option selected>Please Select User Account Status</option>
                              <option value="0">Draft</option>
                              <option value="1">Published</option>
                          
                          </select>
                      </div>
                    <!-- post status end -->
                    <div class="mb-3">
                      <label for="input1" class="form-label">Post Date</label>
                      <input type="date" name="post_date" required class="form-control" id="input1" value="<?php echo $post_date; ?>">
                  </div>
                  <button type="submit" name="updated" class="btn btn-dark mybtn">Update</button>

                </form>
              </div>
              </div>
        </div>
      <?php }

                  if(isset($_POST['updated'])){
                    $post_title=$_POST['post_title'];
                    $post_des=$_POST['post_des'];
                    $image=$_POST['image'];
                    $category_id=$_POST['category_id'];
                    $user_id=$_POST['user_id'];
                    $tag=$_POST['tag'];
                    $status=$_POST['status'];
                    $post_date=$_POST['post_date'];
  //image validation...................................................................?
  
                      $ImageName=$_FILES['image']['name'];
                      $ImageSize=$_FILES['image']['size'];
                      $ImageTmp=$_FILES['image']['tmp_name'];
  
  
                      $Expolded=explode('.',$_FILES['image']['name']);
                      $last_dot_element=end($Expolded);
                      $Image_Extention=strtolower($last_dot_element);
                      $Image_Allowed_Extention=array("jpg","jpeg","png");
  
                      $formerrors=array();
                  if(!empty($ImageName)){
                          if(!empty($ImageName) && !in_array($Image_Extention, $Image_Allowed_Extention)){
                              $formerrors='Invalid Image Format';
                          }
                          if(!empty($ImageSize) && $ImageSize>2097152){
                              $formerrors='Invalid is Too large! Allowed Image size is 2MB';
                          }
                      }
                  if(!empty($formerrors)){
                          header("Location:index.php?do=Edit&update=$updateID");
                          exit();
                      }
              //         if(empty($formerrors)){
              //             $image=rand(0,999).'_'.$ImageName;
              //             //upload image to is own folder
              //             move_uploaded_file($ImageTmp,"image\\".$image);
              // }
              
                  if(!empty($ImageName)){
                      //Delete the existing image while update the new image
                      $DeleteImageSql= "SELECT * FROM post WHERE post_id='$updateID'";
                      $data=mysqli_query($db,$DeleteImageSql);
                      while($row=mysqli_fetch_assoc($data)){
                          $ExistingImage=$row['image'];
                          unlink('image/Post/'.$ExistingImage);
                          //change the image  name random number
                          $image=rand(0,999).'_'.$ImageName;
                          //upload image to is own folder
                          move_uploaded_file($ImageTmp,"image\\Post\\".$image);
                          $sql="UPDATE post SET post_title='$post_title',post_des='$post_des',image='$image',category_id='$category_id',user_id='$user_id',tag='$tag',status='$status',post_date='$post_date' WHERE post_id='$updateID'";
                          $AddUser=mysqli_query($db,$sql);
                          if($AddUser){
                              header("Location:Post.php?do=Manage");
                              exit();
                          }
                          else{
                              echo die("mysqli_query Error".mysqli_error($db));
                          }
                  }
              }
              elseif(empty($ImageName)){
                $sql="UPDATE post SET post_title='$post_title',post_des='$post_des',image='$image',category_id='$category_id',user_id='$user_id',tag='$tag',status='$status',post_date='$post_date' WHERE post_id='$updateID'";
                   $AddUser=mysqli_query($db,$sql);
                          if($AddUser){
                              header("Location:Post.php?do=Manage");
                              exit();
                          }
                          else{
                              echo die("mysqli_query Error".mysqli_error($db));
                          }
              }
          }
      }
    }
// delete data...............................................
elseif($do == 'Delete'){
  if(isset($_GET['delete'])){
      $deleteID=$_GET['delete'];
      //delete image sql
      $DeleteImage= "SELECT * FROM post WHERE post_id='$deleteID'";
      $sqlimg=mysqli_query($db,$DeleteImage);
      while($row=mysqli_fetch_assoc($sqlimg)){
          $ExistingImage=$row['image'];
          unlink('image/Post/'.$ExistingImage);
      $DeleteDepartment="DELETE FROM post WHERE post_id='$deleteID'";
      $sql=mysqli_query($db,$DeleteDepartment);
      if($sql){
          header("location:Post.php?do=Manage");
      }
      else{
          echo die("Database Connected Error".mysqli_error($db));
      }
  }}} ?>

    <!-- <?php  ?> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
