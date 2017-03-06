<?php
if($_POST)
{
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$gender=$_POST['gender'];
mysql_query("SQL insert statement.......");
echo "welcome".$name;
}else { }

?>
