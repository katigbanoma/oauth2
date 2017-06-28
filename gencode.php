<?php
  if($_POST['access'] == 'do_not'){
    $error = "<span style='color:red;'>Permission DENIED by USER!</span>";
    header("location: http://localhost:8000?error=$error");
  }
  elseif ($_POST['access'] == 'allow') {
    function generateRandomString($length = 15) {
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < $length; $i++) {
             $randomString .= $characters[rand(0, $charactersLength + 12)];
         }
         return $randomString;
    }

    $auth_code=generateRandomString();

    $cid = $_POST['cid'];
    $csk = $_POST['csk'];
    $rui = $_POST['rui'];
    $bomb = $_POST['bomb'];

  $link = mysqli_connect("localhost", "root", "kini419,247", "my_oauth2_db");
    $sql = "INSERT INTO oauth_authorization_codes (authorization_code, client_id, user_id, redirect_uri) VALUES ('$auth_code', '$cid', '$bomb', '$rui')";
    $resp = mysqli_query($link, $sql);


    if($resp){
      header("location:$rui?auth_code=$auth_code&uid=$bomb&cid=$cid&csk=$csk");
    }
  }

    // function generateRandomString($length = 15) {
    //      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //      $charactersLength = strlen($characters);
    //      $randomString = '';
    //      for ($i = 0; $i < $length; $i++) {
    //          $randomString .= $characters[rand(0, $charactersLength + 12)];
    //      }
    //      return $randomString;
    // }
    //
    //     $auth_code=generateRandomString();
    //
    //     $cid = $_POST['cid'];
    //     $csk = $_POST['csk'];
    //     $rui = $_POST['rui'];
    //     $bomb = $_POST['bomb'];
    //
    //   $link = mysqli_connect("localhost", "root", "kini419,247", "my_oauth2_db");
    //     $sql = "INSERT INTO oauth_authorization_codes (authorization_code, client_id, user_id, redirect_uri) VALUES ('$auth_code', '$cid', '$bomb', '$rui')";
    //     $resp = mysqli_query($link, $sql);
    //
    //
    //     if($resp){
    //       header("location: $rui?auth_code=$auth_code&uid=$bomb&cid=$cid&csk=$csk");
    //     }

 ?>
