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


      <?php
      $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
?>
<?php
if($do=='Manage'){

           
  ?>
  <div class="col-md-12">
      <table class="table text-center mytable">
          <thead>
              <tr>
              <th scope="col">SI</th>
              <th scope="col">Cmt_User_Name</th>
              <th scope="col">Cmt_User_Email</th>
              <th scope="col">Subject</th>
              <th scope="col">Comments</th>
              <th scope="col">Status</th>
              <th scope="col">Date</th> 
              <th scope="col">Action</th> 
              </tr>
          </thead>
          <tbody>
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
              <tr>
              <th scope="row"><?php echo $i ?></th>
              <td><?php echo $cuser_name ?></td>
              <td><?php echo $cuser_mail?></td>
              <td><?php echo $subject ?></td>
              <td><?php echo $coment ?></td>

              <td><?php
                    if($status==1){?>
                        <span class="badge badge-success">Published</span><?php
                    }
                    else{?>
                    <span class="badge badge-danger">Draft</span><?php
                    }
                    echo '' ?></td>
                  <td><?php echo $cdate ?></td>
              <td>
                  <div class="icon">  
                      <a href="comment.php?do=Edit&update=<?php echo $comment_id ?>"><i class="fa-sharp fa-solid fa-pen-to-square fa-lg" style="color:#252525;"></i></a>
                      <a href="comment.php?do=Delete&delete=<?php echo $comment_id ?>"><i class="fa-solid fa-trash  fa-lg" style="color: #252525;"></i></a>
                  </div>
              </td>
              </tr>
              <?php }
              ?>
          </tbody>
      </table>
      <?php } 
    elseif($do == 'Edit'){
        if(isset($_GET['update'])){
            $updateID=$_GET['update'];
            $sql="SELECT * FROM comment WHERE comment_id='$updateID' ";
            $allstd=mysqli_query($db,$sql);
            while($row=mysqli_fetch_assoc($allstd)){
      
                $comment_id =$row['comment_id'];
                // $cuser_name=$row['cuser_name'];
                // $cuser_mail=$row['cuser_mail'];
                // $subject=$row['subject'];
                // $coment=$row['coment'];
                $status=$row['status'];
                // $cdate=$row['cdate'];

             }
        }
            ?>
              <div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="from" method="POST" action="" enctype="multipart/form-data">
                <!-- subcategory table -->
                <div class="mb-3">
                  <label >Status</label>
                  <select name="status" class="form-control" value="<?php echo $status; ?>">
                      <option selected>Please Select User Account Status</option>
                      <option value="0">Draft</option>
                      <option value="1">Published</option>
                  
                  </select>
              </div>
  
                <button type="submit" name="updated" class="btn btn-dark mybtn">Update</button>
            </form>
                  <?php
                    if (isset($_POST['updated'])) {
                        $status = $_POST['status'];
              
                        $update_sql = "UPDATE comment SET status='$status' WHERE comment_id='$updateID'";
              
                        $Update_entry = mysqli_query($db, $update_sql);
              
                        if ($Update_entry) {
                          header("Location:comment.php?do=Manage");
                              exit();
                         
                        } else {
                          die("Mysqli Error" . mysqli_error($db));
                        }
                    }
                }
    elseif($do == 'Delete'){
        if(isset($_GET['delete'])){
            $deleteID=$_GET['delete'];
            $soft_delete = "UPDATE comment SET status='0' WHERE comment_id='$deleteID'";
            $sql=mysqli_query($db,$soft_delete);
            if($sql){
                header("location:comment.php?do=Manage");
            }
            else{
                echo die("Database Connected Error".mysqli_error($db));
            }
        }} ?>      
                  
        </div>
    </div>
  </div>
