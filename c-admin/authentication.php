<?php

require_once("../auth/config.php");
require_once("/include/include.php");
// 链接数据库

// 检测cookie
function checkCookieAndSession (){
  if(isset($_COOKIE['username'])&&isset($_COOKOE['password'])){
  }else {
    # code...
    echo "<script>location.href='login.html';</script>";
  }
}
link_database();
$username = $_POST['username'];
$user_password = $_POST['user_password'];
$sql = "select * from user where USERNAME = '$username'";
$name2 = mysql_query($sql);
$row = mysql_fetch_array($name2);
$user_password_hash = $row["USE_PWD"];

if(""!=$username){
  if (password_verify($user_password, $user_password_hash)){
      $string1 = json_encode(array("code"=>1, "des"=>"success"));
      echo($string1);
      echo('<script>console.log("登录成功")</script>');
      session_start();
      echo "欢迎".$username."进入系统";

      //此处编写创建cookie以及session代码
      session_destroy();
      session_start();
      setcookie("username", $username, time()+3600);
      setcookie("password", $user_password, time()+3600);
      echo $_COOKIE["username"];
      echo "<script>location.href='index.php';</script>";

  }else {
    $logfalse = json_encode(array("code"=>0, "des"=>"false"));
    echo($logfalse);
    echo('<script>console.log("登录失败")</script>');
    echo "登录失败！（用户名或密码不正确，请返回重新登录。）";
  }
}else{
  $logfalse = json_encode(array("code"=>0, "des"=>"false"));
  echo($logfalse);
  echo('<script>console.log("email为空登录失败")</script>');
  echo "登录失败！（用户名或密码不正确，请返回重新登录。）";
}




 ?>
