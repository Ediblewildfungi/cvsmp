<?php

# $link_id = mysql_connect($DBHOST,$DBUSER,$DBPWD);
require_once("../auth/config.php");

function link_database(){
  $link_id=mysql_connect(DBHOST,DBUSER,DBPWD);
  mysql_select_db(DBNAME);
}

function checkCookieAndSession (){
  $username = $_COOKIE['username'];
  if(isset($_COOKIE['username'])){
    return  "1";
  //  echo '<script>console.log("登录1")</script>';

  }else {
    # code...
    echo "<script>location.href='login.html';</script>";
    return  "0";
  //  echo '<script>console.log("登录2")</script>';
    # echo "<script>location.href='login.html';</script>";

  }
}
checkCookieAndSession();
if (checkCookieAndSession()==1) {
  link_database();
  $username = $_COOKIE['username'];
  $sql = "select * from user where USERNAME = '$username'";
  $name2 = mysql_query($sql);
  $row = mysql_fetch_array($name2);

  $userid = $row["UID"] ;
  $userkey = $row["USER_KEY"] ;
  $user_group = $row["USER_GROUP"] ;

  $sql = "select * from user_info where UID = '$userid'";
  $name2 = mysql_query($sql);
  $row = mysql_fetch_array($name2);
  $address = $row["ADDRESS"] ;
  $user_times = $row["USER_CONF1"] ;

  mysql_close();
}
//echo checkCookieAndSession();


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>访客管理系统</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="Mosaddek" name="author" />
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
  <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/ytcall.css" rel="stylesheet" />
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/style-default.css" rel="stylesheet" id="style_color" />
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"></head>
<body class="fixed-top">
  <div id="header" class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
        <div class="sidebar-toggle-box hidden-phone">
          <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a class="brand" href="index.php">
          <img src="img/logo.png" alt="Metro Lab" />
        </a>
        <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="arrow"></span>
        </a>
        <div id="top_menu" class="nav notify-row">
          <ul class="nav top-menu">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-tasks"></i>
                <span class="badge badge-important">6</span>
              </a>
              <ul class="dropdown-menu extended tasks-bar">
                <li><p>你有6条任务</p></li>
                <li>
                  <a href="#">
                    <div class="task-info">
                      <div class="desc">控制台</div>
                      <div class="percent">44%</div>
                    </div>
                    <div class="progress progress-striped active no-margin-bot">
                      <div class="bar" style="width: 44%;"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="task-info">
                      <div class="desc">数据库更新</div>
                      <div class="percent">65%</div>
                    </div>
                    <div class="progress progress-striped progress-success active no-margin-bot">
                      <div class="bar" style="width: 65%;"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="task-info">
                      <div class="desc">手机开发进度</div>
                      <div class="percent">87%</div>
                    </div>
                    <div class="progress progress-striped progress-info active no-margin-bot">
                      <div class="bar" style="width: 87%;"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="task-info">
                      <div class="desc">手机App进度</div>
                      <div class="percent">33%</div>
                    </div>
                    <div class="progress progress-striped progress-warning active no-margin-bot">
                      <div class="bar" style="width: 33%;"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="task-info">
                      <div class="desc">控制台</div>
                      <div class="percent">90%</div>
                    </div>
                    <div class="progress progress-striped progress-danger active no-margin-bot">
                      <div class="bar" style="width: 90%;"></div>
                    </div>
                  </a>
                </li>
                <li class="external"><a href="#">查看所有任务</a></li>
              </ul>
            </li>
            <li class="dropdown" id="header_inbox_bar">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-envelope-alt"></i>
                <span class="badge badge-important">5</span>
              </a>
              <ul class="dropdown-menu extended inbox">
                <li><p>你有5条消息</p></li>
                <li>
                  <a href="#">
                    <span class="photo">
                      <img src="./img/avatar-mini.png" alt="avatar" />
                    </span>
                    <span class="subject">
                      <span class="from">Jonathan Smith</span>
                      <span class="time">Just now</span>
                    </span>
                    <span class="message">Hello, 这是个消息列子.</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="photo">
                      <img src="./img/avatar-mini.png" alt="avatar" />
                    </span>
                    <span class="subject">
                      <span class="from">系统管理员</span>
                      <span class="time">10 mins</span>
                    </span>
                    <span class="message">Hi, 最近咋样?</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="photo">
                      <img src="./img/avatar-mini.png" alt="avatar" />
                    </span>
                    <span class="subject">
                      <span class="from">Jason Stathum</span>
                      <span class="time">3 hrs</span>
                    </span>
                    <span class="message">This is awesome dashboard.</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="photo">
                      <img src="./img/avatar-mini.png" alt="avatar" />
                    </span>
                    <span class="subject">
                      <span class="from">Jondi Rose</span>
                      <span class="time">Just now</span>
                    </span>
                    <span class="message">Hello, this is metrolab</span>
                  </a>
                </li>
                <li><a href="#">See all messages</a></li>
              </ul>
            </li>
            <li class="dropdown" id="header_notification_bar">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-bell-alt"></i>
                <span class="badge badge-warning">7</span>
              </a>
              <ul class="dropdown-menu extended notification">
                <li><p>你有7条提示信息</p></li>
                <li>
                  <a href="#">
                    <span class="label label-important">
                      <i class="icon-bolt"></i>
                    </span>
                    Server #3 overloaded.
                    <span class="small italic">34 mins</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="label label-warning">
                      <i class="icon-bell"></i>
                    </span>
                    Server #10 not respoding.
                    <span class="small italic">1 Hours</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="label label-important">
                      <i class="icon-bolt"></i>
                    </span>
                    Database overloaded 24%.
                    <span class="small italic">4 hrs</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="label label-success">
                      <i class="icon-plus"></i>
                    </span>
                    New user registered.
                    <span class="small italic">Just now</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="label label-info">
                      <i class="icon-bullhorn"></i>
                    </span>
                    Application error.
                    <span class="small italic">10 mins</span>
                  </a>
                </li>
                <li><a href="#">See all notifications</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="top-nav ">
          <ul class="nav pull-right top-menu" >
            <li class="dropdown mtop5">
              <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                <i class="icon-comments-alt"></i>
              </a>
            </li>
            <li class="dropdown mtop5">
              <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                <i class="icon-headphones"></i>
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="img/avatar1_small.jpg" alt="">
                <span class="username"><?php echo $_COOKIE['username']; ?></span> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class="icon-user"></i>我的资料</a></li>
                <li><a href="#"><i class="icon-cog"></i>我的设置</a></li>
                <li><a href="login.html"><i class="icon-key"></i>退出</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="container" class="row-fluid">
    <div class="sidebar-scroll">
      <div id="sidebar" class="nav-collapse collapse">
        <div class="navbar-inverse">
          <form class="navbar-search visible-phone">
            <input type="text" class="search-query" placeholder="Search" />
          </form>
        </div>
        <ul class="sidebar-menu">
          <li class="sub-menu active"><a class="" href="index.php"><i class="icon-dashboard"></i><span>控制台</span></a></li>
          <li class="sub-menu"><a href="javascript:;" class=""><i class="icon-book"></i><span>UI 组件</span><span class="arrow"></span></a>
            <ul class="sub">
              <li><a class="" href="general.html">通用</a></li>
              <li><a class="" href="button.html">按钮</a></li>
              <li><a class="" href="slider.html">滑动</a></li>
              <li><a class="" href="metro_view.html">Metro风格</a></li>
              <li><a class="" href="tabs_accordion.html">Tab选项卡 & 手风琴</a></li>
              <li><a class="" href="typography.html">文字排版</a></li>
              <li><a class="" href="tree_view.html">树菜单</a></li>
              <li><a class="" href="nestable.html">嵌套列表</a></li>
            </ul>
          </li>
          <li class="sub-menu"><a href="javascript:;" class=""><i class="icon-cogs"></i><span>插件</span><span class="arrow"></span></a>
            <ul class="sub">
              <li><a class="" href="calendar.html">日历</a></li>
              <li><a class="" href="grids.html">网格</a></li>
              <li><a class="" href="chartjs.html">图表统计</a></li>
              <li><a class="" href="flot_chart.html">Flot图表</a></li>
              <li><a class="" href="gallery.html">相册</a></li>
            </ul>
          </li>
          <li class="sub-menu"><a href="javascript:;" class=""><i class="icon-tasks"></i><span>表单</span><span class="arrow"></span></a>
            <ul class="sub">
              <li><a class="" href="form_layout.html">表单布局</a></li>
              <li><a class="" href="form_component.html">表单组件</a></li>
              <li><a class="" href="form_wizard.html">表单提示</a></li>
              <li><a class="" href="form_validation.html">表单验证</a></li>
              <li><a class="" href="dropzone.html">文件上传</a></li>
            </ul>
          </li>
          <li class="sub-menu"><a href="javascript:;" class=""><i class="icon-th"></i><span>数据表格</span><span class="arrow"></span></a>
            <ul class="sub">
              <li><a class="" href="basic_table.html">简单表格</a></li>
              <li><a class="" href="dynamic_table.html">动态表格</a></li>
              <li><a class="" href="editable_table.html">可编辑表格</a></li>
            </ul>
          </li>
          <li class="sub-menu"><a href="javascript:;" class=""><i class="icon-fire"></i><span>Icon图标</span><span class="arrow"></span></a>
            <ul class="sub">
              <li><a class="" href="font_awesome.html">FontAwesome图标</a></li>
              <li><a class="" href="glyphicons.html">Glyphicons图标</a></li>
            </ul>
          </li>
          <li class="sub-menu"><a class="" href="javascript:;"><i class="icon-trophy"></i><span>代码片段</span><span class="arrow"></span></a>
            <ul class="sub">
              <li><a href="general_portlet.html" class="">通用片段</a></li>
              <li><a href="draggable_portlet.html" class="">可拖拽片段</a></li>
            </ul>
          </li>
          <li class="sub-menu"><a class="" href="javascript:;"><i class="icon-map-marker"></i><span>地图</span><span class="arrow"></span></a>
            <ul class="sub">
              <li><a href="vector_map.html" class="">Vector地图</a></li>
              <li><a href="google_map.html" class="">Google地图</a></li>
            </ul>
          </li>
          <li class="sub-menu"><a href="javascript:;" class=""><i class="icon-file-alt"></i><span>基本页面</span><span class="arrow"></span></a>
            <ul class="sub">
              <li><a class="" href="blank.html">空白页面</a></li>
              <li><a class="" href="blog.html">博客</a></li>
              <li><a class="" href="timeline.html">时间轴</a></li>
              <li><a class="" href="profile.html">个人资料</a></li>
              <li><a class="" href="about_us.html">关于我们</a></li>
              <li><a class="" href="contact_us.html">联系我们</a></li>
            </ul>
          </li>
          <li class="sub-menu"><a href="javascript:;" class=""><i class="icon-glass"></i><span>其他</span><span class="arrow"></span></a>
            <ul class="sub">
              <li><a class="" href="lock.html">锁屏</a></li>
              <li><a class="" href="invoice.html">购物单</a></li>
              <li><a class="" href="pricing_tables.html">价目单</a></li>
              <li><a class="" href="search_result.html">搜索展示</a></li>
              <li><a class="" href="faq.html">帮助页面</a></li>
              <li><a class="" href="404.html">404错误页面</a></li>
              <li><a class="" href="500.html">500错误页面</a></li>
            </ul>
          </li>
          <li><a class="" href="login.html"><i class="icon-user"></i><span>登录页面</span></a></li>
        </ul>
      </div>
    </div>
    <div id="main-content">
      <div class="container-fluid">
        <!-- <div style="display: block; height: 1000px;" id="gidgroupworkpages" name="tabDiv"><iframe style="width: 100%; height: 100%" id="gidgroupworkpagesFrame" frameSpacing="0" marginHeight="0" src="http://www.baidu.com/" frameBorder="no" name="gidgroupworkpagesFrame" marginWidth="0"></iframe></div> -->
        <?php

        // $username = $_POST['username'];
        // $user_password = $_POST['user_password'];
        // echo "欢迎"."\n" ;
        // echo $username."\n" ;
        // echo "登录本系统"."\n" ;
        //echo $_COOKIE["username"];


         ?>
         <!-- BEGIN PAGE HEADER-->
         <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN THEME CUSTOMIZER-->
                <div id="theme-change" class="hidden-phone">
                    <i class="icon-cogs"></i>
                     <span class="settings">
                         <span class="text">Theme Color:</span>
                         <span class="colors">
                             <span class="color-default" data-style="default"></span>
                             <span class="color-green" data-style="green"></span>
                             <span class="color-gray" data-style="gray"></span>
                             <span class="color-purple" data-style="purple"></span>
                             <span class="color-red" data-style="red"></span>
                         </span>
                     </span>
                </div>
                <!-- END THEME CUSTOMIZER-->
               <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                  控制台
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">访客管理系统</a>
                        <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="#">控制台</a>
                        <span class="divider">/</span>
                    </li>
                    <li class="active">
                        访客管理
                    </li>
                    <!-- <li class="pull-right search-wrap">
                        <form action="search_result.html" class="hidden-phone">
                            <div class="input-append search-input-area">
                                <input class="" id="appendedInputButton" type="text">
                                <button class="btn" type="button"><i class="icon-search"></i> </button>
                            </div>
                        </form>
                    </li> -->
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
         </div>
         <!-- END PAGE HEADER-->
         <!-- BEGIN 界面1 PORTLET-->
         <div class="widget orange">
             <div class="widget-title">
                 <h4><i class="icon-info"></i> 注意事项</h4>
                 <span class="tools">
                 <a href="javascript:;" class="icon-chevron-down"></a>
                 <a href="javascript:;" class="icon-remove"></a>
                 </span>
             </div>
             <div class="widget-body">
                 <div class="alert alert-success">
                     <button class="close" data-dismiss="alert">×</button>
                     <strong>登录成功!</strong> <?php echo $_COOKIE["username"]; ?>，欢迎光临访客管理系统！
                 </div>
                 <div class="alert">
                     <button class="close" data-dismiss="alert">×</button>
                     <strong>注意!</strong> 管理员登记过程请注意规范！
                 </div>




             </div>
         </div>
         <!-- END 界面1 PORTLET-->

         <div class="row-fluid">
             <div class="span12">
                 <!-- BEGIN SAMPLE FORMPORTLET-->
                 <div class="widget green">
                     <div class="widget-title">
                         <h4><i class="icon-unlock-alt"></i> 生成来访者key</h4>
                         <span class="tools">
                         <a href="javascript:;" class="icon-chevron-down"></a>
                         <a href="javascript:;" class="icon-remove"></a>
                         </span>
                     </div>
                     <div class="widget-body">
                         <!-- BEGIN FORM-->
                         <form id="get-visitor-key" action="../request/getpost.php"  class="form-horizontal" method="post">

                             <div class="control-group">
                                 <label class="control-label">您的姓名</label>
                                 <div class="controls">
                                     <input type="text" placeholder="<?php  echo $_COOKIE["username"]; ?>" class="input-large" readonly="readonly"/>

                                 </div>
                             </div>
                             <div class="control-group">
                                 <label  class="control-label">您的地址码</label>
                                 <div class="controls">
                                     <input id="community_code" name="community_code" type="text" value="<?php echo "$address"; ?>" class="input-xlarge" readonly="readonly"/>

                                 </div>
                             </div>
                             <div class="control-group">
                                 <label class="control-label">您的原始key</label>
                                 <div class="controls">
                                     <input type="text" id="user_key" name="user_key" value="<?php echo "$userkey"; ?> " class="input-xxlarge" readonly="readonly"/>
                                     <span class="help-inline">*您的私有密钥</span>
                                 </div>
                             </div>
                             <div class="control-group">
                                 <label id="test01"  class="control-label">您生成的访客key</label>
                                 <div class="controls">
                                     <input id="visitor_key" type="text" placeholder="请点击提交来生成" class="input-xxlarge" />

                                     <!-- <input type="text" id="visitor_key" value="Mickey Mouse"> -->
                                     <span class="help-inline">您本周还有 <?php echo "$user_times"; ?> 次 生成机会</span>
                                 </div>
                             </div>
                             <div class="alert alert-info">
                                 <button class="close" data-dismiss="alert">×</button>
                                 <strong>提示</strong> 请点击提交来生成访客key，以便用于分享。
                             </div>
                             <!-- <div class="alert alert-error">
                                 <button class="close" data-dismiss="alert">×</button>
                                 <strong>警告!</strong> 您输入的信息有误。
                             </div> -->
                             <div id="visirot-QR-code" class="visirot-QR-code"></div>
                             <div class="form-actions">
                                 <button id="get-visitor-key-button" type="button" class="btn blue"><i class="icon-ok"></i> 提交</button>
                                 <button type="submit" class="btn"><i class=" icon-remove"></i> send</button>
                             </div>
                         </form>
                         <!-- END FORM-->
                     </div>
                 </div>
                 <!-- END SAMPLE FORM PORTLET-->
             </div>
         </div>
        <!--  管理员可见 部分 START-->
        <?php if( $user_group == 0 ) : ?>
         <div class="row-fluid">
             <div class="span12">
                 <!-- BEGIN SAMPLE FORMPORTLET-->
                 <div class="widget green">
                     <div class="widget-title">
                         <h4><i class=" icon-key"></i> 登记新用户</h4>
                         <span class="tools">
                         <a href="javascript:;" class="icon-chevron-down"></a>
                         <a href="javascript:;" class="icon-remove"></a>
                         </span>
                     </div>
                     <div class="widget-body">
                         <!-- BEGIN FORM-->
                         <form action="#" class="form-horizontal">

                             <div class="control-group">
                                 <label class="control-label">姓名</label>
                                 <div class="controls">
                                     <input type="text" placeholder="输新入住用户的姓名。" class="input-large" />
                                     <span class="help-inline">*输新入住用户的姓名。</span>
                                 </div>
                             </div>
                             <div class="control-group">
                                 <label class="control-label">设置密码</label>
                                 <div class="controls">
                                     <input type="text" placeholder="输新入住用户的初始密码。" class="input-xlarge" />
                                     <span class="help-inline">*输新入住用户的初始密码。</span>
                                 </div>
                             </div>
                             <div class="control-group">
                                 <label class="control-label">授权码</label>
                                 <div class="controls">
                                     <input type="text" placeholder="输入管理员的授权码" class="input-xxlarge" />
                                     <span class="help-inline">*输入管理员的授权码。</span>
                                 </div>
                             </div>
                             <div class="control-group">
                                 <label class="control-label">指定入住用户的小区</label>
                                 <div class="controls">
                                     <select class="input-large m-wrap" tabindex="1">
                                         <option value="Category 1">某某大学</option>
                                         <option value="Category 2">某某新区</option>
                                         <option value="Category 3">某某花园</option>
                                         <option value="Category 4">某某学院</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="alert alert-error">
                                 <button class="close" data-dismiss="alert">×</button>
                                 <strong>警告!</strong> 您输入的授权码有误。
                             </div>
                             <div class="form-actions">
                                 <button type="submit" class="btn blue"><i class="icon-ok"></i> 提交</button>
                                 <button type="button" class="btn"><i class=" icon-remove"></i> x</button>
                             </div>
                         </form>
                         <!-- END FORM-->
                     </div>
                 </div>
                 <!-- END SAMPLE FORM PORTLET-->
             </div>
         </div>
        <?php endif; ?>
       <!-- 管理员可见 部分  END-->

      </div>

  </div>
  <!-- <div id="footer">
    <div class="obtnbox">
      <a class="obtn xfi_1" href="#">图</a>
      <a class="obtn xfi_2 active" href="#">图</a>
      <a class="obtn xfi_3" href="#">图</a>
      <a class="obtn xfi_4" href="#">图</a>
      <a class="obtn xfi_5" href="#">图</a>
      <a class="obtn xfi_6" href="#">图</a>
    </div>
    <div class="operbox">
      <a href="#" class="xh_prev">左</a>
      <a href="#" class="xh_next">右</a>
      <div class="xh_scroll">
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem active" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
        <a class="oitem" href="#"><i class="xic">&times;</i>个人信息</a>
      </div>
    </div>
  </div> -->

  <!-- BEGIN JAVASCRIPTS -->
  <!-- Load javascripts at bottom, this will reduce page load time -->
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>

  <!-- ie8 fixes -->
  <!--[if lt IE 9]>
  <script src="js/excanvas.js"></script>
  <script src="js/respond.js"></script>
  <![endif]-->

  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/chart-master/Chart.js"></script>
  <script src="js/jquery.scrollTo.min.js"></script>

  <!--common script for all pages-->
  <script src="js/common-scripts.js"></script>
  <script type="text/javascript">
   //$(document).ready(
  //   function(){
  //      $("#get-visitor-key-button").click(function(){
  //
  //          $.post("../request/getpost.php",
  //          {
  //             community_code:"0n0.moex1101",
  //             user-key:"Duckburg",
  //           },
  //          function(data,status){
  //            alert("数据：" + data + "\n状态：" + status);
  //          });
  //
  //         //  $.post("../request/getpost.php", $("#get-visitor-key").serialize());
  //         //  $.post("../request/getpost.php", function(data) {
  //         //    alert("Data Loaded: " + data);
  //         //  });
  //          $("#visirot-QR-code").html("<img src='http://qr.liantu.com/api.php?bg=ffffff&fg=92b37b&gc=1751a9&el=l&w=200&m=10&text=sacxac-xsaE'/>");
  //          $("#visitor_key").val("DollyDuck");
  //      })
  //
  //);
  //
  //

        $(document).ready(function(){
          $("#get-visitor-key-button").click(function(){
            var communitycode = $("#community_code").val();
            var userkey = $("#user_key").val();

            $.post("../request/newgetpost.php",
            {
              community_code:communitycode,
              user_key:userkey,

              null:"Duckburg",
            },
            function(data,status){
              alert("数据：" + data + "\n状态：" + status);
              var parsedJson = $.parseJSON(data);
              //document.getElementById("fname").innerHTML=obj.employees[1].firstName
              $("#visitor_key").val(parsedJson.vcode);
            });
          });
        });

  </script>
  <!--script for this page only-->
  <!-- END JAVASCRIPTS -->
</body>
</html>
