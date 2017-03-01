<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>演示：PHP加密解密字符串</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<style>
.demo{width:520px; margin:40px auto 0 auto; min-height:250px;}
.input{padding:3px; line-height:22px; border:1px solid #ccc}
.btn{overflow: hidden;display:inline-block;*display:inline;padding:4px 20px 4px;font-size:14px;line-height:18px;*line-height:20px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px; margin-left:2px}
#result{margin-top:20px; line-height:26px; color:#f30; word-break:break-all}
</style>
<!-- <script type="text/javascript" src="http://libs.useso.com/js/jquery/1.7.2/jquery.min.js"></script> -->
<script type="text/javascript" src="../lib/jquery/jquery-2.1.4.min.js"></script>
<script>
$(function () {
	$("#encode").click(function(){
		post('ENCODE');//加密
	});
	$("#decode").click(function(){
		post('DECODE');//解密
	});
});
function post(act){
	var str = $("#str").val();
	var key = $("#key").val();
	$.post("authcode.php?act="+act,{mystr:str,mykey:key},function(data){
		$("#result").html(data);
	});
}
</script>
</head>

<body>
<div id="header">
   <div id="logo"><h1><a href="http://www.helloweba.com" title="返回helloweba首页">helloweba</a></h1></div>
   <div class="demo_topad"><script src="/js/ad_js/demo_topad.js" type="text/javascript"></script></div>
</div>

<div id="main">
   <h2 class="top_title"><a href="http://www.helloweba.com/view-blog-255.html">PHP加密解密字符串</a></h2>
   <div class="demo">
   		<textarea id="str" class="input" style="width:100%; height:80px">请输入字符串</textarea>
        密钥：<input type="text" class="input" id="key" value="www.helloweba.com">
    	<input type="button" value="加密" class="btn" id="encode">
    	<input type="button" value="解密" class="btn" id="decode">
        <div id="result"></div>
	</div>
 <br/><div class="ad_76090"><script src="/js/ad_js/bd_76090.js" type="text/javascript"></script></div><br/>
</div>

<div id="footer">
    <p>Powered by helloweba.com  允许转载、修改和使用本站的DEMO，但请注明出处：<a href="http://www.helloweba.com">www.helloweba.com</a></p>
</div>
<p id="stat"><script type="text/javascript" src="/js/tongji.js"></script></p>
</body>
</html>
