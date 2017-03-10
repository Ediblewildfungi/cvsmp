<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>身份验证</title>
   </head>
   <body>
    <form class="login" action="getpost.php" method="post">
       <textarea name="verfiy_coede"  class="input" >请输入身份验证码</textarea>
       <textarea name="verfiy_key"  class="input" >请输入身份验证key</textarea>
       <button type="submit" class="btn btn-default">点我验证我的身份！</button>
    </form>
    <form class="login" action="newgetpost.php" method="post">
       <textarea name="verfiy_code"  class="input" >请输入身份验证码</textarea>
       <textarea name="verfiy_id"  class="input" >请输入VID</textarea>
       <button type="submit" class="btn btn-default">点我验证我的身份！</button>
    </form>
   </body>
 </html>
