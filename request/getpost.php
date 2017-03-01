<?php

include '../auth/auth.php';

// 拼接回传代码
$community = $_POST["community"].$_POST["community1"].$_POST["community2"].$_POST["community3"];

$str = $community;
$key = "y1ubASctsW8CsOkmYALaW";
$act = "ENCODE";

$code = authcode($str,$act,$key,81000);

$community_add = array(
  "community" => $community,
  "authcode" => $code
);
// json格式输出
echo json_encode($community_add);

 ?>
