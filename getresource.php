<?php

#var_dump($_POST['token']);
if (!$_POST['token']) {
    echo 'error getting token';
}
    $getit = $_POST['token'];
    $link=mysqli_connect('localhost', 'root', 'kini419,247',  'my_oauth2_db');
    if($link){
        $query = "SELECT * FROM oauth_access_tokens WHERE access_token='$getit'";
        $res=mysqli_query($link, $query);
        $row=mysqli_fetch_assoc($res);
        $tokdata = $row['user_id'];
      }

      if($tokdata){
        $query = "SELECT * FROM oauth_users WHERE id='$tokdata'";
        $res=mysqli_query($link, $query);
        $row=mysqli_fetch_assoc($res);
        $udata = $row['username'];
        $fdata = $row['first_name'];
        $ldata = $row['last_name'];
      }


$user_data = json_encode(array('username' => $udata, 'firstname' => $fdata, 'lastname' => $ldata ));
header('Content-Type: application/json');
echo $user_data;
?>
