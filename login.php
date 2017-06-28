<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>OAUTH2 USER login</title>
  </head>
  <body>
    <h4><a href="http://localhost:10000">Home</a></h4>
    <h4><a href="login.php">User Login</a></h4>
    <h4><a href="users_reg.php">User Register</a></h4>
    <h4><a href="client_reg.php">Client Register</a></h4>
    <h4><a href="clientlogin.php">Client login to see API btn</a></h4>
        <h2>OAUTH2 USER Login here:</h2>
        <form action="login.php" method="post">
        <p>
            <label for="firstName">Username:</label>
            <input type="text" name="username">
        </p>
        <p>
            <label for="Password">Password:</label>
            <input type="password" name="password">
        </p>
        <p>
            <input type="submit" name="sub" value="Submit">
        </p>
        </form>
<?php
if($_SESSION['untl']){echo "You need to login with your details";}
if(isset($_SESSION['bomb'])){
  header("location: main.php");
}
  $name = $_REQUEST['username'];
    $pword = md5($_REQUEST['password']);
      $sub = $_REQUEST['sub'];
        if($name && $pword && $sub){
            $link = mysqli_connect('localhost', 'root', 'kini419,247',  'my_oauth2_db');
                $query = "SELECT * FROM oauth_users WHERE username='$name' and password='$pword'";
                $res=mysqli_query($link, $query);
                $rowcount = mysqli_num_rows($res);
                $row=mysqli_fetch_assoc($res);
                $uid = ($row["id"]);
                if($rowcount == 1){
                 $_SESSION['bomb'] = $uid;
                 header("location:main.php");
                }
                else{
                  echo "<span style='color:red;'>Username or Password Incorrect</span>";
                }

             }
         ?>
</body>
</html>
