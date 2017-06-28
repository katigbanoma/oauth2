<?php
  $uid = $_POST['uid'];
  $cid = $_POST['cid'];
  $auth_code = $_POST['auth_code'];

  if (!$uid) {
    echo 'm';
  }

  if (!$cid) {
    echo 'n';
  }

  if (!$auth_code) {
    echo 'o';
  }

  $token = bin2hex(random_bytes(16));

   if(!$token){
     echo 'n';
   }

   $link = mysqli_connect("localhost", "root", "kini419,247", "my_oauth2_db");
   $sql = "INSERT INTO oauth_access_tokens (access_token, client_id, user_id) VALUES ('$token', '$cid', '$uid')";
   $resp = mysqli_query($link, $sql);

   if(!$resp){
      echo 'p';
    }

    $data = json_encode(array('access_token' => $token));
    header('Content-Type: application/json');
    echo $data;
?>
