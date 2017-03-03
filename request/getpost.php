<?php

include '../auth/auth.php';
require_once("../auth/config.php");
// 拼接回传代码

function link_database(){
  $link_id=mysql_connect(DBHOST,DBUSER,DBPWD);
  mysql_select_db(DBNAME);



}

$community = $_POST["community"].$_POST["community1"].$_POST["community2"].$_POST["community3"];
$str = $community;
$key = "y1ubASctsW8CsOkmYALaW";
$act = "ENCODE";

$code = authcode($str,$act,$key,81000);

$community_add = array(
  "community" => $community,
  "authcode" => $code
);
// json格式输出
echo json_encode($community_add);
echo "\n";
$hash = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
echo $hash."\n";

$gethash = '$2y$10$FQVo2BzZ29ejbbvCjK6qNexmDKnZQD.ty2ey8h30Kmip8jctF.0Zu';

if (password_verify('rasmuslerdorf', $gethash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <img src="http://qr.liantu.com/api.php?bg=ffffff&fg=92b37b&gc=1751a9&el=l&w=200&m=10&text=<?php echo $code;  ?>"/>
  </body>
</html>
