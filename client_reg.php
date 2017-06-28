  <?php
  function generateRandomString($length = 30) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
  }
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>OAUTH2 Client Registration</title>
  </head>
  <body>
    <h4><a href="http://localhost:10000">Home</a></h4>
    <h4><a href="login.php">User Login</a></h4>
    <h4><a href="users_reg.php">User Register</a></h4>
    <h4><a href="client_reg.php">Client Register</a></h4>
    <h4><a href="clientlogin.php">Client login to see API btn</a></h4>
        <h2>Client registration here:</h2>
    <form method="post" action="client_reg.php">
      <p>Client username:
      <input type="text" name="username" >
      </p>
      <p>Client redirect_url:
      <input type="text" name="redirect_uri" >
      </p>
      <p>Client password:
      <input type="password" name="password" >
      </p>
      <p><input type="submit" name="submit" value="submit"></p>
    </form>

    <?php
      $link = mysqli_connect("localhost", "root", "kini419,247", "my_oauth2_db");

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $cuname = mysqli_real_escape_string($link, $_REQUEST['username']);
      $credirecturi = str_replace(' ', '',mysqli_real_escape_string($link, $_REQUEST['redirect_uri']));
      $cpass = md5($_REQUEST['password']);
      $cid = generateRandomString();
      $csk = md5(microtime().rand());
      $ins = "INSERT INTO oauth_clients (client_id, client_secret, redirect_uri, username, password) VALUES ('$cid', '$csk', '$credirecturi', '$cuname', '$cpass')";


      if(mysqli_query($link, $ins)){
      echo "Registration sucessful LOGIN to see your wawu.";
      // echo "<form action='http://localhost:10000/phpchkauth.php' method='post'>
      //       <input type='hidden' name="cid" value='J2SMb8DYzyZzJ4e0C2j21Yg7zvDzlH' /><br>
      //       <input type='hidden' name='csk' value='f0cf78c1125cba92a314fa94783f91cc'>
      //       <button>OAUTH2 Connection</button>
      //       </form>";
      }

      else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
      }

      mysqli_close($link);
      ?>


  </body>
</html>
