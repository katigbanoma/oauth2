<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Client API button</title>
  </head>
  <body>

    <?php
      if(!$_SESSION['cuser']){
        // echo "Invalid user name or password";
        header("location: index.php");
      }else{
        echo "Confidential Information for ";
        echo "<span style='color:blue; text-transform:uppercase;'>" .$_SESSION['cuser'] ."</span>";
        echo " only ! copy and paste to your file.<br>";
        $link = mysqli_connect('localhost', 'root', 'kini419,247', 'my_oauth2_db');
        $query = "SELECT * FROM oauth_clients WHERE username='$_SESSION[cuser]'";
        $res = mysqli_query($link, $query);
        $newres = mysqli_fetch_assoc($res);
        $cid = $newres['client_id'];
        $csk = $newres['client_secret'];
        echo "<textarea rows='5' cols='62'>";
        echo "<form action='http:localhost:10000/phpchkauth.php' method='post'>";
        echo "<input type='hidden' name='cid' value='$cid'>";
        echo "<input type='hidden' name='csk' value='$csk'>";
        echo "<button>OAUTH2 Connection</button>";
        echo "</form>";
        echo "</textarea>";
      }
     ?>
     <br />
     <a href="signout.php">Sign out</a>
  </body>
</html>
