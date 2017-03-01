<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>请求一个二维码</title>
  </head>
  <body>
    <div class="">
      <form class="login" action="getpost.php" method="post">

      <select name="community">
          <option value ="0n0.moe">喵喵大学喵学院</option>
          <option value ="nyaa">喵喵家园</option>
          <option value="test">测试小区</option>
          <option value="daodi">_(:з」∠)_社区</option>
      </select>
      <select name="community1">
          <option value ="x">西区</option>
          <option value ="d">东区</option>
          <option value="z">中区</option>
      </select>
      <textarea name="community2" id="str" class="input" >1</textarea>
      号楼
      <textarea name="community3" id="str" class="input" >101</textarea>
      <button type="submit" class="btn btn-default">生成访客用专属码</button>
      </form>
    </div>
  </body>
</html>
