﻿<?php
require_once("../auth/config.php");
require_once("./include/include.php");
require_once("./include/checkCookieAndSession.php");

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
 ?>
 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>小区访客管理系统 动态表格 - 功能测试</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />

    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="index.php">
                   <img src="img/logo.png" alt="小区访客系统管理员" />
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <div id="top_menu" class="nav notify-row">
                   <!-- BEGIN NOTIFICATION -->
                   <ul class="nav top-menu">
                       <!-- BEGIN SETTINGS -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <i class="icon-tasks"></i>
                               <span class="badge badge-important">6</span>
                           </a>
                           <ul class="dropdown-menu extended tasks-bar">
                               <li>
                                   <p>You have 6 pending tasks</p>
                               </li>
                               <li>
                                   <a href="#">
                                       <div class="task-info">
                                         <div class="desc">Dashboard v1.3</div>
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
                                           <div class="desc">Database Update</div>
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
                                           <div class="desc">Iphone Development</div>
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
                                           <div class="desc">Mobile App</div>
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
                                           <div class="desc">Dashboard v1.3</div>
                                           <div class="percent">90%</div>
                                       </div>
                                       <div class="progress progress-striped progress-danger active no-margin-bot">
                                           <div class="bar" style="width: 90%;"></div>
                                       </div>
                                   </a>
                               </li>
                               <li class="external">
                                   <a href="#">See All Tasks</a>
                               </li>
                           </ul>
                       </li>
                       <!-- END SETTINGS -->
                       <!-- BEGIN INBOX DROPDOWN -->
                       <li class="dropdown" id="header_inbox_bar">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <i class="icon-envelope-alt"></i>
                               <span class="badge badge-important">5</span>
                           </a>
                           <ul class="dropdown-menu extended inbox">
                               <li>
                                   <p>You have 5 new messages</p>
                               </li>
                               <li>
                                   <a href="#">
                                       <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Jonathan Smith</span>
									<span class="time">Just now</span>
									</span>
									<span class="message">
									    Hello, this is an example msg.
									</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="#">
                                       <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Jhon Doe</span>
									<span class="time">10 mins</span>
									</span>
									<span class="message">
									 Hi, Jhon Doe Bhai how are you ?
									</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="#">
                                       <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Jason Stathum</span>
									<span class="time">3 hrs</span>
									</span>
									<span class="message">
									    This is awesome dashboard.
									</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="#">
                                       <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Jondi Rose</span>
									<span class="time">Just now</span>
									</span>
									<span class="message">
									    Hello, this is metrolab
									</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="#">See all messages</a>
                               </li>
                           </ul>
                       </li>
                       <!-- END INBOX DROPDOWN -->
                       <!-- BEGIN NOTIFICATION DROPDOWN -->
                       <li class="dropdown" id="header_notification_bar">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                               <i class="icon-bell-alt"></i>
                               <span class="badge badge-warning">7</span>
                           </a>
                           <ul class="dropdown-menu extended notification">
                               <li>
                                   <p>You have 7 new notifications</p>
                               </li>
                               <li>
                                   <a href="#">
                                       <span class="label label-important"><i class="icon-bolt"></i></span>
                                       Server #3 overloaded.
                                       <span class="small italic">34 mins</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="#">
                                       <span class="label label-warning"><i class="icon-bell"></i></span>
                                       Server #10 not respoding.
                                       <span class="small italic">1 Hours</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="#">
                                       <span class="label label-important"><i class="icon-bolt"></i></span>
                                       Database overloaded 24%.
                                       <span class="small italic">4 hrs</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="#">
                                       <span class="label label-success"><i class="icon-plus"></i></span>
                                       New user registered.
                                       <span class="small italic">Just now</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="#">
                                       <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                       Application error.
                                       <span class="small italic">10 mins</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="#">See all notifications</a>
                               </li>
                           </ul>
                       </li>
                       <!-- END NOTIFICATION DROPDOWN -->

                   </ul>
               </div>
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->
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
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="img/avatar1_small.jpg" alt="">
                               <span class="username">Jhon Doe</span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                               <li><a href="#"><i class="icon-cog"></i> My Settings</a></li>
                               <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
          <div id="sidebar" class="nav-collapse collapse">

              <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
              <div class="navbar-inverse">
                  <form class="navbar-search visible-phone">
                      <input type="text" class="search-query" placeholder="Search" />
                  </form>
              </div>
              <!-- END RESPONSIVE QUICK SEARCH FORM -->
              <!-- BEGIN SIDEBAR MENU -->
              <ul class="sidebar-menu">
                  <li class="sub-menu">
                      <a class="" href="index.php">
                          <i class="icon-dashboard"></i>
                          <span>控制台</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>UI Elements</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">General</a></li>
                          <li><a class="" href="button.html">Buttons</a></li>
                          <li><a class="" href="slider.html">Sliders</a></li>
                          <li><a class="" href="metro_view.html">Metro View</a></li>
                          <li><a class="" href="tabs_accordion.html">Tabs & Accordions</a></li>
                          <li><a class="" href="typography.html">Typography</a></li>
                          <li><a class="" href="tree_view.html">Tree View</a></li>
                          <li><a class="" href="nestable.html">Nestable List</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-cogs"></i>
                          <span>Components</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="calendar.html">Calendar</a></li>
                          <li><a class="" href="grids.html">Grids</a></li>
                          <li><a class="" href="chartjs.html">Chart Js</a></li>
                          <li><a class="" href="flot_chart.html">Flot Charts</a></li>
                          <li><a class="" href="gallery.html"> Gallery</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>Form Stuff</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="form_layout.html">Form Layouts</a></li>
                          <li><a class="" href="form_component.html">Form Components</a></li>
                          <li><a class="" href="form_wizard.html">Form Wizard</a></li>
                          <li><a class="" href="form_validation.html">Form Validation</a></li>
                          <li><a class="" href="dropzone.html">Dropzone File Upload </a></li>
                      </ul>
                  </li>
                  <li class="sub-menu active">
                      <a href="javascript:;" class="">
                          <i class="icon-th"></i>
                          <span>访客数据</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.html">社区数据</a></li>
                          <li class="active"><a class="" href="dynamic_table.php">实时数据</a></li>
                          <li><a class="" href="editable_table.html">用户数据</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-fire"></i>
                          <span>Icons</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="font_awesome.html">Font Awesome</a></li>
                          <li><a class="" href="glyphicons.html">Glyphicons</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon-trophy"></i>
                          <span>Portlets</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a href="general_portlet.html" class=""> General Portlet</a></li>
                          <li><a href="draggable_portlet.html" class="">Draggable Portlet</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon-map-marker"></i>
                          <span>Maps</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a href="vector_map.html" class="">Vector Maps</a></li>
                          <li><a href="google_map.html" class="">Google Map</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-file-alt"></i>
                          <span>社区动态</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="blog.html">社区新闻</a></li>
                          <li><a class="" href="timeline.html">时间轴</a></li>
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="about_us.html">About Us</a></li>
                          <li><a class="" href="contact_us.html">Contact Us</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-glass"></i>
                          <span>Extra</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="lock.html">Lock Screen</a></li>
                          <li><a class="" href="invoice.html">Invoice</a></li>
                          <li><a class="" href="pricing_tables.html">Pricing Tables</a></li>
                          <li><a class="" href="search_result.html">Search Result</a></li>
                          <li><a class="" href="faq.html">FAQ</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                          <li><a class="" href="500.html">500 Error</a></li>
                      </ul>
                  </li>

                  <li>
                      <a class="" href="login.html">
                          <i class="icon-user"></i>
                          <span>Login Page</span>
                      </a>
                  </li>
              </ul>
              <!-- END SIDEBAR MENU -->
          </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
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
                     实时数据
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">访客管理系统 </a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">访客数据</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                            实时数据
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN ADVANCED TABLE widget-->
            <?php if( $user_group == 0 || $user_group == 1) : ?>
            <div class="row-fluid">
                <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> 使用情况</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                      <?php
                      link_database();
                      $sql="select * from verify";
                      $result=mysql_query($sql);
                      ?>

                       <table class="table table-striped table-bordered" id="sample_1">
                           <thead>
                           <tr>
                               <th style="width:6px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                               <th>VID</th>
                               <th class="hidden-phone">UID</th>
                               <th class="hidden-phone">KEY【已被加密】</th>
                               <th class="hidden-phone">生效时间</th>
                               <th class="hidden-phone">失效时间/被使用时间</th>
                               <th class="hidden-phone">状态</th>
                           </tr>
                           </thead>
                           <tbody>
                             <?php
                             while($row=mysql_fetch_array($result))  //遍历SQL语句执行结果把值赋给数组
                             {
                              echo '<tr class="odd gradeX">';
                              echo '<td><input type="checkbox" class="checkboxes" value="1" /></td>';
                              echo "<td>".$row["VERIFY_ID"]."</td>";
                              echo "<td>".$row["UID"]." </td>";
                              echo "<td>".$row["VERIFY_KEY"]." </td>";
                              echo '<td><span class="label label-success">'.$row["START_TIME"]."</span></td>";
                              echo '<td><span class="label label-success">'.$row["END_TIME"]." </span></td>";
                              if ($row["STATUS"] == 0) {
                                echo '<td><span class="label label-warning">未使用 </span></td>';
                              }else {
                                echo '<td><span class="label label-inverse">已失效 </span></td>';
                              }
                              // echo "<td>".$row["STATUS"]." </td>";
                              echo "</tr>";
                             }

                              ?>
                           </tbody>
                       </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>
            <?php endif; ?>
            <!-- END ADVANCED TABLE widget-->




            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> 使用情况</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                       <table class="table table-striped table-bordered" id="sample_1">
                           <thead>
                           <tr>
                               <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                               <th>Username</th>
                               <th class="hidden-phone">Email</th>
                               <th class="hidden-phone">Points</th>
                               <th class="hidden-phone">Joined</th>
                               <th class="hidden-phone"></th>
                           </tr>
                           </thead>
                           <tbody>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>Jhone doe</td>
                               <td class="hidden-phone"><a href="mailto:jhone-doe@gmail.com">jhone-doe@gmail.com</a></td>
                               <td class="hidden-phone">10</td>
                               <td class="center hidden-phone">02.03.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>gada</td>
                               <td class="hidden-phone"><a href="mailto:gada-lal@gmail.com">gada-lal@gmail.com</a></td>
                               <td class="hidden-phone">34</td>
                               <td class="center hidden-phone">08.03.2013</td>
                               <td class="hidden-phone"><span class="label label-warning">Suspended</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>soa bal</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@yahoo.com">soa bal@yahoo.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">1.12.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>ram sag</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">soa bal@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">7.2.2013</td>
                               <td class="hidden-phone"><span class="label label-inverse">Blocked</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>durlab</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">test@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">03.07.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>durlab</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">05.04.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>sumon</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">05.04.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>bombi</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">05.04.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>ABC ho</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">05.04.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>test</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">05.04.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>soa bal</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">soa bal@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">03.07.2013</td>
                               <td class="hidden-phone"><span class="label label-inverse">Blocked</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>test</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">test@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">03.07.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>goop</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">05.04.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>sumon</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">01.07.2013</td>
                               <td class="hidden-phone"><span class="label label-inverse">Blocked</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>woeri</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">09.10.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>soa bal</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">soa bal@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">9.12.2013</td>
                               <td class="hidden-phone"><span class="label label-inverse">Blocked</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>woeri</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">test@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">14.12.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>uirer</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">13.11.2013</td>
                               <td class="hidden-phone"><span class="label label-warning">Suspended</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>samsu</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">17.11.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>dipsdf</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">05.04.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>soa bal</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">soa bal@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">03.07.2013</td>
                               <td class="hidden-phone"><span class="label label-inverse">Blocked</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>hilor</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">test@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">03.07.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>test</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">19.12.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>botu</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">17.12.2013</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           <tr class="odd gradeX">
                               <td><input type="checkbox" class="checkboxes" value="1" /></td>
                               <td>sumon</td>
                               <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                               <td class="hidden-phone">33</td>
                               <td class="center hidden-phone">15.11.2011</td>
                               <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                           </tr>
                           </tbody>
                       </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->





         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; 小区访客系统管理员 Dashboard.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->
   <script src="js/dynamic-table.js"></script>

   <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>