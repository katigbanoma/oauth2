<?php
    session_start();
    $cid = $_POST['cid'];
    $csk = $_POST['csk'];
      if(!$cid && !$csk){
        header('HTTP/ 405 Method not allowed');
        http_response_code(405);
      }
    if($cid && $csk){
      $link = mysqli_connect('localhost', 'root', 'kini419,247',  'my_oauth2_db');
      $query = "SELECT * FROM oauth_clients WHERE client_id='$cid'";
      $res = mysqli_query($link, $query);
      $row = mysqli_fetch_assoc($res);
      $rui = $row["redirect_uri"];
      if(!$row){
          echo "Client id does not match any in servers database";
      }

      $_SESSION['cid'] = $cid;
      $_SESSION['rui'] = $rui;
      $_SESSION['csk'] = $csk;

      // check if user is logged in
      if ($_SESSION['bomb']) {
          header("location:http://localhost:10000/main.php");
          die();
      }
      header("location:http://localhost:10000/login.php");
    }
?>
