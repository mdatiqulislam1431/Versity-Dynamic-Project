
<?php 
 
 include '../library/session.php';
    Session::checkLogin();

  include '../library/config.php';
  include '../library/database.php'; 
  include '../library/helper.php';  

  $db = new Database();
  $fm = new Format();

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Varsity Admin</title>
  </head>
<?php 
        $n = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $email = $fm -> validation($_POST['email']);
      $password = $fm -> validation(md5($_POST['password']));

      $email = mysqli_real_escape_string($db->link, $email);
      $password = mysqli_real_escape_string($db->link, $password);

      $query = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password'";
      $result = $db->select($query);
      if($result){
        $value = mysqli_fetch_array($result);
        $row = mysqli_num_rows($result);
        if($row > 0){

          Session::set("login", true);
          Session::set("email", $value['email']);
          Session::set("id", $value['id']);
          header("Location:index.php");
          
        }else{
          $n = "<span style ='color: red; font-size=18px; '>No Result Found !!</span>";
        } 
        }else{
          $n = "<span style ='color: red; font-size=18px;'>Username or Password Not Matched !! please try again</span>";
      }
    }
  ?>



  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Varsity</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="page-login.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
           <p style="text-align: center;"><?php echo $n; ?></p>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" name="email" type="email" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>