<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>users</title>
  </head>
  <body>

  </body>
</html>
    <h4><a href="http://localhost:10000">Home</a></h4>
    <h4><a href="login.php">User Login</a></h4>
    <h4><a href="users_reg.php">User Register</a></h4>
    <h4><a href="client_reg.php">Client Register</a></h4>
    <h4><a href="clientlogin.php">Client login to see API btn</a></h4>
<form method="post" action="users_reg.php">
  <h3>User registration:</h3>

      <legend>Register</legend>
      <div>
       <label for="requester_name">Username</label>
       <input type="text" id="requester_name" name="uname">
      </div>
      <div>
       <label for="callback_uri">Password</label>
       <input type="password" id="callback_uri" name="pword">
      </div>
      <div>
       <label for="callback_uri">First-name</label>
       <input type="text" id="callback_uri" name="fname">
      </div>
      <div>
       <label for="callback_uri">Last-name:</label>
       <input type="text" id="callback_uri" name="lname">
      </div>

     <input type="submit" name="sub" value="Register">
    </form>
    <?php
      $link = mysqli_connect("localhost", "root", "kini419,247", "my_oauth2_db");
      if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $uname = mysqli_real_escape_string($link, $_REQUEST['uname']);
      $pword = md5(mysqli_real_escape_string($link, $_REQUEST['pword']));
      $fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
      $lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
      $_SESSION['id'] = $pword;
      $ins = "INSERT INTO oauth_users (username, password, first_name, last_name) VALUES ('$uname', '$pword', '$fname', '$lname')";
      if(mysqli_query($link, $ins)){
      echo "Registration sucessful.";
        //header("Location:show.php");
      } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
      }

      mysqli_close($link);
      ?>
</body>
</html>
