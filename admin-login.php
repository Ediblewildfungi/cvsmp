<?php
require_once("./auth/config.php");
require_once("./c-admin/include/include.php");

$status = 0;
$user_status = isset($_POST["username"]) && isset($_POST["userpwd"]);

if ($user_status) {
  if ($_POST["username"] != "" && $_POST["userpwd"] != "") {
    $status = 1;
  }
  if ($status==1) {
    link_database();

    $username = $_POST["username"];
    $user_password = $_POST["userpwd"];

    // $sql = "select * from user where USERNAME = '$username'";
    $sql ="select * from user where (USERNAME = '$username' or EMAIL = '$username') limit 1";

    $name2 = mysql_query($sql);
    $row = mysql_fetch_array($name2);
    $user_password_hash = $row["USE_PWD"];
    $user_group = $row["USER_GROUP"];

    if (""!=$username) {
      if (password_verify($user_password,$user_password_hash)) {
        if ($user_group==0||$user_group==1) {
          $info = json_encode(array("code"=>1, "des"=>"success"));
          echo($info);
        }
        if ($user_group > 1) {
          $err = json_encode(array("code"=>2, "des"=>"flase","err"=>"account is not a common user, maybe you shoud use the admin client"));
          echo($err);
        }

      }else {
        $info = json_encode(array("code"=>0, "des"=>"flase","err"=>"auth error"));
        echo($info);
      }
    }
  }else {
    $info = json_encode(array("code"=>0, "des"=>"flase","err"=>"AI:are you kidding me? = =?"));
    echo($info);
  }
}
 ?>
<?php if( $user_status != 1 ) :  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <title>用户登录 - 小区访客系统</title>
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="./css/common.css"  charset="utf-8">
    <link rel="stylesheet" href="./css/index.css"  charset="utf-8">
    <script type="text/javascript" src="./lib/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="./lib/bootstrap/js/bootstrap.js"></script>
    <style media="screen">
    .index-title{
      top: 25%;
      text-shadow: 1px 1px 8px #c73500;
      color: #FFF;
    }
    .index-title2{
      top: 25%;
      text-shadow: 1px 1px 8px #c73500;
      color: #FFF;
      width: auto;

    }
    .indext-p{

      text-shadow: 1px 1px 8px #c73500;
      color: #FFF;
      width: auto;
      background-color: rgba(0, 0, 0, 0.29);
    }
    .button-center{
      width: 80%;
      margin:0 auto;
    }
    </style>
  </head>
  <body>
    <h1 class="text-center index-title">管理验证</h1>
    <h3 class="text-center index-title2">访客管理系统</h3>

      <div class="container login-container">
      <div class="login-main">
        <form class="login" action="./admin-login.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail">账号</label>
            <input name="username"  class="form-control" id="exampleInputEmail1" placeholder="用户名或邮箱地址">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">密码</label>
            <input name="userpwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入您您的密码">
          </div>
          <div class="button-center">
            <button type="submit" class="btn btn-primary btn-lg btn-block">验证</button>
          </div>



        </form>
      </div>
    </div>
    <div class="indext-p">
      <p class="text-center" >尊敬的管理员</p>
      <p class="text-center" >您需要输入相关信息才能进行下一步操作</p>
      <p class="text-center" >请按照管理员帐户使用规范进行操作。</p>
    </div>
    <p class="text-center"> Copyright © Jianghonghui,All Rights Reserved. </p>
  </body>
</html>
<?php endif; ?>
