<?php
require_once("../../auth/config.php");
require_once("../include/include.php");

$q = isset($_GET["q"]) ? $_GET["q"]: '';

if(empty($q)) {
    echo "请选择";
    exit;
}

link_database();

// 设置编码，防止中文乱码


$sql = "SELECT * FROM community WHERE community_code = '$q'";
$name2 = mysql_query($sql);
$row = mysql_fetch_array($name2);
$building_number = $row["building"] + 1;

//echo "$row[building]" ;

for ($i=1; $i  < $building_number; $i++) {
  $bn = str_pad($i,2,"0",STR_PAD_LEFT);
  echo "<option value='".$bn."'>".$bn."</option>";
}


mysql_close();



 ?>
