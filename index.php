<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>OAUTH2 Server</title>
  </head>
  <body>
    <h3>Welcome to OAUTH2!</h3>
    <h4><a href="http://localhost:10000">Home</a></h4>
    <h4><a href="login.php">User Login</a></h4>
    <h4><a href="users_reg.php">User Register</a></h4>
    <h4><a href="client_reg.php">Client Register</a></h4>
    <h4><a href="clientlogin.php">Client login to see API btn</a></h4>
    <?php
    if(isset($_SESSION['bomb'])){
      header("location: main.php");
    }
    /*if($_POST['csk'] && $_POST['cid']){
      $link = mysqli_connect('localhost', 'root', 'kini419,247',  'my_oauth2_db');
      $query = "SELECT * FROM oauth_clients WHERE client_secret='$_POST[csk]'";

       $res=mysqli_query($link, $query);

       $rowcount = mysqli_num_rows($res);

      if($rowcount == 1){
        #echo "done";
        #header("location:".$redirect_url);
        #$_SESSION['rui']$_POST['redirect_url'];
        $_SESSION['csk']=$_POST['csk'];
        $_SESSION['cid']=$_POST['cid'];
        $_SESSION['redirect_url']=$_POST['ruri'];
        header("location:user.php");
      }#else{
        #header("location:http://localhost:8000");
      #}
    }*/
    ?>
  </body>
</html>
