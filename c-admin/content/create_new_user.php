<?php
require_once("../../auth/config.php");
require_once(".../include/include.php");




// $status = isset($_POST['fullname']) && isset($_POST['set_userkey']) && isset($_POST['set_community_code']) && isset($_POST['community_building']);
$status = 1;
if ($_POST['fullname']==""||$_POST['set_userkey']==""||$_POST['set_community_code']==""||$_POST['community_building']==""||$community_room = $_POST['community_room']=="") {
  $status = 0;
}

if ($status != 0) {
  $fullname = $_POST['fullname'];
  $userkey =$_POST['set_userkey'];
  $community_code =$_POST['set_community_code'];
  $community_building = $_POST['community_building'];
  $community_room = $_POST['community_room'];
  $community = $community_code.$community_building.$community_room;
  $create_time = date("y-m-d h:i:s");

  //echo $community;
  $user_default_pwd = password_hash("$community", PASSWORD_DEFAULT);
  link_database();
  $sql_check = "SELECT * FROM user WHERE username = '$community' ";
  $sql_check_query = mysql_query($sql_check);
  $sql_check_status = mysql_num_rows($sql_check_query);
  if ($sql_check_status) {
    $info = json_encode(array("code"=>2, "des"=>"false"));
    echo $info;

  }else {
    # code...
    $info = json_encode(array("code"=>1, "des"=>"success","fullname"=>"$fullname","userkey"=>"$userkey","community_id"=>"$community_code","community_building"=>"$community_building","community_room"=>"$community_room"));
    echo $info;
    $sql = "SELECT * FROM community WHERE community_code = '$community_code'";
    $name2 = mysql_query($sql);
    $row = mysql_fetch_array($name2);
    $community_id = $row["community_id"];
    //echo $community_id;
    $add_user = mysql_query("INSERT INTO user ( USERNAME, USE_PWD,USER_KEY,ADDRESS,community_id,CREATE_TIME,USER_GROUP) VALUES ('$community', '$user_default_pwd', '$userkey','$community','$community_id','$create_time','2')");
    $userid = mysql_insert_id();

    $add_user_info = mysql_query("INSERT INTO user_info (UID, ADDRESS, FULL_NAME,USER_CONF1) VALUES ('$userid', '$community', '$fullname','30')");
    mysql_close();
  }

}else {

  $info = json_encode(array("code"=>0, "des"=>"flase"));
  echo $info;
}




 ?>
