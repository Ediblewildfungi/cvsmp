<?php
require_once("./auth/config.php");
require_once("./c-admin/include/include.php");


 ?>


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
    <h1 class="text-center index-title">用户登记</h1>
    <h3 class="text-center index-title2">访客管理系统</h3>

      <div class="container login-container">
      <div class="login-main">
        <form class="login" action="./c-admin/content/create_new_user.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail">姓名</label>
            <input name="fullname"  class="form-control" id="exampleInputEmail1" placeholder="君の名は？">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail">邮箱</label>
            <input name="user_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="邮箱地址">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">密码</label>
            <input name="set_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入您您的密码">
          </div>
          <div class="form-group">
              <label class="control-label">设置用户key</label>
              <div class="controls">
                  <input id="set_userkey" name="set_userkey" type="text" placeholder="请点击随机生成" class="form-control" />

                  <button id="set_userkey_button" type="button" class="btn"><i class="icon-sort-by-attributes"></i>随机生成</button>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label">指定入住用户的小区</label>
              <div class="controls">
                  <select id="set_community_code" name="set_community_code" class="input-large m-wrap" tabindex="1" onchange="changeCommunity(this.value)">
                    <option  value="">请选择社区</option>
                    <?php
                    link_database();
                    $sql="select * from community";
                    $result=mysql_query($sql);
                    while($row=mysql_fetch_array($result))  //遍历SQL语句执行结果把值赋给数组
                    {
                     echo '<option value="'.$row["community_code"].'">';
                     echo $row["community_name"];
                     echo "</option>";
                    }
                    mysql_close();
                     ?>
                      <?php
                      link_database();
                      //$sql="select * from community";
                      //$sql = "select * from verify where VERIFY_ID = '$verfiy_id'";
                      $sql = "select * from user where USERNAME = '$username'";
                      $name2 = mysql_query($sql);
                      $row = mysql_fetch_array($name2);
                      $cid = $row['community_id'];
                      $sql = "select * from community where community_id = '$cid'";
                      $name2 = mysql_query($sql);
                      $row = mysql_fetch_array($name2);
                      $community_name = $row['community_name'];
                      //$result=mysql_query($sql);

                       echo '<option value="'.$row["community_code"].'">';
                       echo $row["community_name"];
                       echo "</option>";

                      mysql_close();
                       ?>
                  </select>

                  <select id="community_building" name="community_building" class="input-large m-wrap" tabindex="1">

                     <option  value="">请选择社区</option>

                  </select>
                  <input id="community_room" name="community_room" type="text" placeholder="101" class="form-control" />
              </div>

          </div>




          <div class="button-center">
            <button type="submit" class="btn btn-primary btn-lg btn-block">注册</button>
          </div>
        </form>
      </div>
    </div>
    <div class="indext-p">
      <p class="text-center" >尊敬的访客用户</p>
      <p class="text-center" >您需要输入相关信息才能进行下一步操作</p>
      <p class="text-center" >如有疑问请联系工作人员。</p>
    </div>
    <p class="text-center"> Copyright © Jianghonghui,All Rights Reserved. </p>
  </body>
</html>

<script>
//单元楼数量
function changeCommunity(str)
{
  if (str=="")
  {
      document.getElementById("txtHint").innerHTML="";
      return;
  }
  if (window.XMLHttpRequest)
  {
      // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
      xmlhttp=new XMLHttpRequest();
  }
  else
  {
      // IE6, IE5 浏览器执行代码
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          document.getElementById("community_building").innerHTML=xmlhttp.responseText;
      }
  }
  xmlhttp.open("GET","./c-admin/content/get_community_name.php?q="+str,true);
  xmlhttp.send();
}

//随机字符串
function _getRandomString(len) {
    len = len || 32;
    var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678'; // 默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1
    var maxPos = $chars.length;
    var pwd = '';
    for (i = 0; i < len; i++) {
        pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
    }
    return pwd;
}
//点击生成key时
$(document).ready(function(){
  $("#set_userkey_button").click(function(){
    //var set_userkey = ;
    $("#set_userkey").val(_getRandomString(16));
  });
});
</script>
