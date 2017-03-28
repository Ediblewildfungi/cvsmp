<?php
//数据库配置全局常量
define("DBHOST","hdm-133.hichina.com");
define("DBUSER","hdm1330491");
define("DBPWD","SFEskftjy84168WTPe");
define("DBNAME","hdm1330491_db");

//设置时区
date_default_timezone_set('Asia/Shanghai');



function link_database(){
  $link_id=mysql_connect(DBHOST,DBUSER,DBPWD);
  mysql_select_db(DBNAME);
}


function link_seccess_test_echo(){
  link_database();
  $sql="select * from kami_data_test";
  $result=mysql_query($sql);

  while($row=mysql_fetch_array($result))  //遍历SQL语句执行结果把值赋给数组
  {
   echo "<p>";
   echo $row["id"];
   echo "|";
   echo $row["data"];
   echo "</p>";
  }
  mysql_close();

}

function link_seccess_test($i){
  $data = $i;
  link_database();
  $sql="select * from kami_data_test";
  $result=mysql_query($sql);
  $add_visitor_key = mysql_query("INSERT INTO kami_data_test (data) VALUES ('$data')");
  mysql_close();

}





 ?>
