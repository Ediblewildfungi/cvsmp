<?php
require_once("../auth/config.php");
function link_database(){
  $link_id=mysql_connect(DBHOST,DBUSER,DBPWD);
  mysql_select_db(DBNAME);
}

function whereCommunityForm ($code){
    $miao1 = "0n0.moe"; //喵喵大学
    $miao2 = "nyaa";    //喵喵家园
    $miao3 = "test" ;    //测试小区
    $miao4 = "daodi";   //_(:з」∠)_社区
   if(count(explode($miao1,$code))>1){
     echo "欢迎光临喵喵大学喵喵学院" ;
     return "0n0.moe";
   }if(count(explode($miao2,$code))>1){
     echo "欢迎光临喵喵家园" ;
     return "nyaa";
   }if(count(explode($miao3,$code))>1){
     echo "欢迎光临测试小区" ;
     return "test";
   }if(count(explode($miao4,$code))>1){
     echo "欢迎光临_(:з」∠)_社区" ;
     return"daodi";
   }
}

function verfityCode(){
  $verfiy_coede = $_POST["verfiy_code"];
  $verfiy_id = $_POST["verfiy_id"];
  link_database();
  $sql = "select * from verify where VERIFY_ID = '$verfiy_id'";
  $name2 = mysql_query($sql);
  $row = mysql_fetch_array($name2);
  if (isset($row['VERIFY_KEY']) ) {
    $visitor_key_hash = $row['VERIFY_KEY'];
    $status = $row['STATUS'];
    $uid = $row['UID'];
    if (password_verify($verfiy_coede, $visitor_key_hash) && $status=="0") {
        // mysql_query("DELETE FROM verify WHERE VERIFY_ID='$verfiy_id'");
        $use_time = date("y-m-d h:i:s");
        mysql_query("UPDATE verify SET STATUS = '1'
        WHERE VERIFY_ID = '$verfiy_id' ");
        mysql_query("UPDATE verify SET END_TIME = '$use_time'
        WHERE VERIFY_ID = '$verfiy_id' ");
        $sql = "select * from user where UID = '$uid'";
        $name2 = mysql_query($sql);
        $row = mysql_fetch_array($name2);
        $address = $row['ADDRESS'];


        // 姓名
        $sql = "select * from user_info where UID = '$uid'";
        $name2 = mysql_query($sql);
        $row = mysql_fetch_array($name2);
        $user_fullname = $row['FULL_NAME'];
        $user_community = $row['COMMUNITY'];
        $user_building = $row['BUILDING'];
        $user_room = $row['ROOM'];
        //小区
        $sql = "select * from community where community_code = '$user_community'";
        $name2 = mysql_query($sql);
        $row = mysql_fetch_array($name2);
        $user_community_chs = $row['community_name'];

        $logsuccess = json_encode(array("code"=>1, "des"=>"success","fullname"=>"$user_fullname","address"=>"$address","community"=>"$user_community_chs","building"=>"$user_building","room"=>"$user_room"));
        echo($logsuccess);

    } else {
        $logfalse = json_encode(array("code"=>0, "des"=>"false","address"=>"0"));
        echo($logfalse);
    }
  }else {
        $logfalse = json_encode(array("code"=>0, "des"=>"false","address"=>"0"));
        echo($logfalse);
  }

}

if (isset($_POST["verfiy_code"])&&isset($_POST["verfiy_id"])) {
  verfityCode();
}else{
  $logfalse = json_encode(array("code"=>0, "des"=>"false","address"=>"0"));
  echo($logfalse);
}


 ?>
