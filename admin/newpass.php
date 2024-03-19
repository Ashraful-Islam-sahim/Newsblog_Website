<?php include "Include/db.php"; ?>
<?php 
 ob_start();
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Recover Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <?php
        //  if($do=='edit'){

        if (isset($_SESSION['email'])) {
          $update_info = $_SESSION['email'];

          $sql_update = "SELECT* FROM user_table WHERE user_id='$update_info'";
          $edit = mysqli_query($db, $sql_update);
          while ($row = mysqli_fetch_assoc($edit)) {

            $password = $row['password'];
            $status = $row['status'];
          }
        }

        ?>

        
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="re_type_pass" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="updated" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<?php
        if (isset($_POST['updated'])) {

          $password=sha1($_POST['password']);
          $re_type_pass=sha1($_POST['re_type_pass']);

          if ($password == $re_type_pass) {

            $update_sql="UPDATE user_table SET password='$password',re_type_pass='$re_type_pass', WHERE user_id='$update_info'";

            $Update_entry = mysqli_query($db, $update_sql);
            if ($Update_entry) {
              header("Location:index.php");
            }elseif($user_pass != $user_repass){
              echo 'confirm password invalid';
            }
             else {
              die("Mysqli Error" . mysqli_error($conn));
            }
          }
        }

        ?>

      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
 <?php ob_end_flush() ?>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
