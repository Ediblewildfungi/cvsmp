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
  $verfiy_coede = $_POST["verfiy_coede"];
  $verfiy_id = $_POST["verfiy_id"];
  link_database();
  $sql = "select * from verify where VERIFY_ID = '$verfiy_id'";
  $name2 = mysql_query($sql);
  $row = mysql_fetch_array($name2);
  if (isset($row['VERIFY_KEY']) ) {
    $visitor_key_hash = $row['VERIFY_KEY'];
    if (password_verify($verfiy_coede, $visitor_key_hash)) {
        mysql_query("DELETE FROM verify WHERE VERIFY_ID='$verfiy_id'");
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    }
  }else {
    echo 'Invalid password.';
  }




}
verfityCode();











 ?>
