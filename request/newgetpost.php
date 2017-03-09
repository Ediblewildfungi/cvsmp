<?php
require_once("../auth/config.php");

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

function generate_key( $length = 16 ) {
    // 密码字符集，可任意添加你需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    $password = '';
    for ( $i = 0; $i < $length; $i++ )
    {
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
         $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        //$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }

    return $password;
}

$community_code = getConnunityCode();
// echo "$community_code";
 $str = $community_code;
 if (isset($_POST['user_key'])) {
   $key = $_POST["user_key"];
   // echo "$key";
 }else {
   $key = "NoKeyNexmD";
 }
link_database();
$sql = "select * from user where USER_KEY = '$key'";
$name2 = mysql_query($sql);
$row = mysql_fetch_array($name2);
$username = $row['USERNAME'];
$userid = $row['UID'];
$db_community_code = $row['ADDRESS'];
$row = mysql_fetch_array($name2);
if(""!=$key){
  if ($db_community_code == $community_code){
      $visitor_key = generate_key(32);
      $visitor_key_hash = password_hash("$visitor_key", PASSWORD_DEFAULT);
      $create_time = date("y-m-d h:i:s");
      $end_time = date('y-m-d h:i:s', strtotime('+7 days'));
      $add_visitor_key = mysql_query("INSERT INTO verify (UID, VERIFY_KEY, START_TIME,END_TIME) VALUES ('$userid', '$visitor_key_hash', '$create_time','$end_time')");
      $verify_id = mysql_insert_id();
      $string1 = json_encode(array("code"=>1, "des"=>"success","vid"=>"$verify_id","vcode"=>"$visitor_key"));
      echo($string1);
      // echo('<script>console.log("登录成功")</script>');
      // session_start();
      // echo "欢迎来自".$username."的访客";
      // echo "您的访客码：".$visitor_key."\n";

  }else {
    $logfalse = json_encode(array("code"=>0, "des"=>"false","vid"=>"0","vcode"=>"0"));
     echo($logfalse);
    // echo('<script>console.log("登录失败")</script>');
    // echo "登录失败！（请求的参数有误！）";
  }
}else{
  $logfalse = json_encode(array("code"=>0, "des"=>"false","vid"=>"0","vcode"=>"0"));
  echo($logfalse);
  // echo('<script>console.log("email为空登录失败")</script>');
  // echo "登录失败！（用户名或密码不正确，请返回重新登录。）";
}



 ?>
