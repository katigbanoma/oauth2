<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>your profile</title>
  </head>
  <body>
    <?php
      session_start();
      if ($_SESSION['bomb']) {
        $rui = $_SESSION['rui'];
        $cid = $_SESSION['cid'];
        $csk = $_SESSION['csk'];
        $bomb = $_SESSION['bomb'];

        $link=mysqli_connect('localhost', 'root', 'kini419,247',  'my_oauth2_db');

        $query = "SELECT * FROM oauth_users WHERE id='$kkk'";
        $res=mysqli_query($link, $query);
        $row=mysqli_fetch_assoc($res);

        echo "<form action='gencode.php' method='post'>
          <input type='hidden' name='cid' value='$cid' />
          <input type='hidden' name='csk' value='$csk' />
          <input type='hidden' name='rui' value='$rui' />
          <input type='hidden' name='bomb' value='$bomb' />

          <input type='radio' name='access' value='allow'>Allow
          <input type='radio' name='access' value='do_not'>Do not Allow<br>
          <input type='submit' name='snd'>
        </form>";

        echo "<br><br><br><a href='http://localhost:10000/signout.php'>Sign out</a>";
      }
      else{
        $_SESSION['untl'] = "you need to log in!";
        header("location: htttp://localhost:10000/login.php");
      }
    ?>
  </body>
</html>
