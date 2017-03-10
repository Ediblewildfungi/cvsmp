<?php

include '../auth/auth.php';
require_once("../auth/config.php");
// 拼接回传代码

function link_database(){
  $link_id=mysql_connect(DBHOST,DBUSER,DBPWD);
  mysql_select_db(DBNAME);
}



function getConnunityCode(){
  $community_isset = isset($_POST['community']) and isset($_POST['community1']) and isset($_POST['community2']) and isset($_POST['community3']);
  $community_isset2 = isset($_POST['community_code']);
  if($community_isset)
  {
    $community_code = $_POST["community"].$_POST["community1"].$_POST["community2"].$_POST["community3"];
  }elseif($community_isset2) {
      $community_code = $_POST['community_code'];

    }
    else {

      $community_code = 0;
    }

  return $community_code;

};

// $community_code = $_POST["community"].$_POST["community1"].$_POST["community2"].$_POST["community3"];
$community_code = getConnunityCode();
$str = $community_code;
if (isset($_POST['user_key'])) {
  $key = $_POST["user_key"];
  // echo "$key";
}else {
  $key = "ejbbvCjK6qNexmD";
}

$act = "ENCODE";

$code = authcode($str,$act,$key,81000);

$community_add = array(
  "community_code" => $community_code,
  "vcode" => $code
);
// json格式输出
echo json_encode($community_add);


// echo "\n";
// $hash = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
// echo $hash."\n";
//
// $gethash = '$2y$10$FQVo2BzZ29ejbbvCjK6qNexmDKnZQD.ty2ey8h30Kmip8jctF.0Zu';
//
// if (password_verify('rasmuslerdorf', $gethash)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }


 ?>
