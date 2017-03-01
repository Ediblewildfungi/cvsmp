<?php

include '../auth/auth.php';

$verfiy_coede = $_POST["verfiy_coede"];

$str  = $verfiy_coede;
$key  = "y1ubASctsW8CsOkmYALaW";
$act  = "DECODE";
$code = authcode($str,$act,$key,100);

if ($code==null) {
  echo "验证失败或密钥过期，请重新获取" ;
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

$communitycode = whereCommunityForm ($code);
$code_strlen = strlen($communitycode);
//echo $communitycode;
echo '<br>';

$code_substr = substr($code,$code_strlen);

echo substr($code_substr,0,2);

echo '单元楼';

echo substr($code_substr,2);

echo '的访客，欢迎您';



$community_add = array(
  "community" => $code,
  "authcode"  => $verfiy_coede,
  "welcome"   =>"欢迎来访"
);
// json格式输出
echo json_encode($community_add);




 ?>
