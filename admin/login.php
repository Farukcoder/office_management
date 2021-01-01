<?php
require_once "../includes/head.php";
require_once "../dbcon.php";
session_start();
if (isset($_SESSION['is_logged'])) {
  header('location:deshboard.php');
}
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_num_rows($result);
  if ($row == 1) {
    $_SESSION['success'] = true;
    $_SESSION['is_logged'] = true;
    header('location:deshboard.php');
  } else {
    $_SESSION['error'] = true;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Office Managment</title>


  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- icheck bootstrap -->
  <!-- <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../dist/css/adminlte.min.css"> -->
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Admin</b>LTE</a>
    </div>
    <?php
    if (isset($_SESSION['success'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>login successfully!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    } else {
      if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>username and password invalid!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
      }
    }
    ?>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"></p>

        <form id="validate_form" action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="username" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <?php if (isset($_SESSION['success'])) : ?>
    <script>
      $(document).ready(function() {
        setTimeout(function() {
          window.open('deshboard.php');
        }, 1600);
      })
    </script>
  <?php endif; ?>



</body>

</html>
<?php
require_once "../includes/foot.php";
unset($_SESSION['error']);
unset($_SESSION['success']);
?>