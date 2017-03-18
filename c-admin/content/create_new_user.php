<?php
require_once("../../auth/config.php");
require_once("../include/include.php");



$status = isset($_POST['fullname']) and isset($_POST['set-userkey']) and isset($_POST['community_id']) and isset($_POST['community_building']);


if ($status) {
  $fullname = $_POST['fullname'];
  $userkey =$_POST['set-userkey'];
  $community_id =$_POST['set_community_code'];
  $community_building = $_POST['community_building'];
  $community_room = $_POST['community_room'];

  $create_time = date("y-m-d h:i:s");

  $string1 = json_encode(array("code"=>1, "des"=>"success","vid"=>"$verify_id","vcode"=>"$visitor_key"));
  echo $fullname = $string1;
  //link_database();
  //$add_visitor_key = mysql_query("INSERT INTO user ( USERNAME, USE_PWD,USER_KEY,community_id,CREATE_TIME) VALUES ('$userid', '$visitor_key_hash', '$create_time','$end_time','$status','$create_time')");


  //$add_visitor_key = mysql_query("INSERT INTO user_info (UID, VERIFY_KEY, START_TIME,END_TIME,STATUS) VALUES ('$userid', '$visitor_key_hash', '$create_time','$end_time','$status')");


}else {

  echo "数据有误，添加失败！";
}




 ?>
