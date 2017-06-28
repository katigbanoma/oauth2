<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>OAUTH2 Client login</title>
  </head>
  <body>
    <h4><a href="http://localhost:10000">Home</a></h4>
    <h4><a href="login.php">User Login</a></h4>
    <h4><a href="users_reg.php">User Register</a></h4>
    <h4><a href="client_reg.php">Client Register</a></h4>
    <h4><a href="clientlogin.php">Client login to see API btn</a></h4>
    <h2>Client Login here:</h2>
        <form action="clientlogin.php" method="post">
        <p>
            <label for="firstName">Username:</label>
            <input type="text" name="cusername">
        </p>
        <p>
            <label for="Password">Password:</label>
            <input type="password" name="cpassword">
        </p>
        <p>
            <input type="submit" name="sub" value="Submit">
        </p>
        </form>
      <?php
        $name = htmlspecialchars($_POST['cusername']);
          $pword = md5($_POST['cpassword']);
            $sub = $_POST['sub'];
              if($name && $pword){
                //echo $name.'<br>'.$pword;
                $link = mysqli_connect('localhost', 'root', 'kini419,247',  'my_oauth2_db');
                    $query = "SELECT * FROM oauth_clients WHERE username='$name' and password='$pword'";
                    $res=mysqli_query($link, $query);
                    $rowcount = mysqli_num_rows($res);
                    $row=mysqli_fetch_assoc($res);
                    $cccid = ($row["username"]);
                    if($rowcount == 1){
                     $_SESSION['cuser'] = $cccid;
                     header("location:clientshow.php");
                    }
                    else{
                      echo "<span style='color:red;'>Username or Password Incorrect</span>";
                    }
                }

      ?>
</body>
</html>
