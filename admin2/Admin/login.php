<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

        <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Admin Login</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="username" required>
        <input type="password" class="input-block-level" placeholder="Password"  name="password" required>
        
        <input type="submit" class="btn btn btn-large btn-primary"  value="Sign In" name="submit">
        
        <?php 
        session_start();
        if(isset($_POST['submit']))
        {
            $un = $_POST['username'];
            $pass = $_POST['password'];
            
            if($un == "Admin" && $pass == "Admin" )
            {
                $_SESSION['un'] = $un;
                header('Location:master.php');
            }
            else
            {
                echo "<script>alert('Invalid Username or Password')</script>"; 
            }
        }
        
        ?>
        
        
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>