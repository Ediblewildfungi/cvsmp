<?php
require_once("include.php");
//检测用户cookie

function checkCookieAndSession (){
  $username = $_COOKIE['username'];
  if(isset($_COOKIE['username'])){
    return  "1";

  //  echo '<script>console.log("登录1")</script>';

  }else {
    # code...
    echo "<script>location.href='login.html';</script>";
    return  "0";
  //  echo '<script>console.log("登录2")</script>';
    # echo "<script>location.href='login.html';</script>";

  }
}

checkCookieAndSession();



 ?>
