<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/themes/blue.min.css" />
<link rel="stylesheet" href="/themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=yes" />
<meta name="format-detection" content="email=no" />
<meta name="description" 
content="扬州大学课程设计选题" />  
<meta name="keywords" 
content="扬州大学课程设计选题"/>  
<title>
<?php echo ($title); ?>|扬州大学课程设计选题系统
</title>
<meta content="扬州大学课程设计选题" name="keywords" />
<!-- meta使用viewport以确保页面可自由缩放 -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- 引入 jQuery Mobile 样式 -->
 <link rel="stylesheet" href="http://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.css">

<!-- 引入 jQuery 库 -->
 <script src="http://apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>

<!-- 引入 jQuery Mobile 库 -->
 <script src="http://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page">
  <div data-role="header"><h1>你好，<?php echo ($username); ?>同学！</h1> 
 <div data-role="navbar">
 <ul>
 <li><a href="/index.php/Student/index/allCourse" data-icon = "grid">全部课题</a></li>
 <li><a href="/index.php/Student/index/userList" data-icon = "user" data-ajax="false">老师分类</a></li>
 <li><a href="/index.php/Student/index/loginOut" data-icon = "back" data-ajax="false">退出系统</a></li>
 </ul>
 </div></div>
 <div data-role="content">


<form method="post" action="/index.php/Student/Index/search">
 <input type="search" name="val" id="search" >
 <INPUT type="submit" data-inline="true" value="搜索课题">
</form>


<ul data-role="listview" data-inset="true">
 <li data-role="list-divider">未被确认的课程设计申请<span class="ui-li-count">共<?php echo ($count1); ?>条</span></li>
<?php if(is_array($NoConfirm)): $i = 0; $__LIST__ = $NoConfirm;if( count($__LIST__)==0 ) : echo "目前没有数据！" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  data-icon="user">
<a href="/index.php/Student/Course/index/id/<?php echo ($vo["course_id"]); ?>"><?php echo ($vo["course_title"]); ?></a> <a href="/index.php/Student/index/UserCourse/id/<?php echo ($vo["user_id"]); ?>"><?php echo ($vo["user_name"]); ?></a>
</li><?php endforeach; endif; else: echo "目前没有数据！" ;endif; ?>
 <li data-role="list-divider">已被确认的课程设计申请<span class="ui-li-count">共<?php echo ($count2); ?>条</span></li>
<?php if(is_array($IsConfirm)): $i = 0; $__LIST__ = $IsConfirm;if( count($__LIST__)==0 ) : echo "目前没有数据！" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  data-icon="user"> <a href="/index.php/Student/Course/index/id/<?php echo ($vo["course_id"]); ?>"><?php echo ($vo["course_title"]); ?></a> <a href="/index.php/Student/index/UserCourse/id/<?php echo ($vo["user_id"]); ?>"><?php echo ($vo["user_name"]); ?></a></li><?php endforeach; endif; else: echo "目前没有数据！" ;endif; ?>
 </ul>
</div>

  <div data-role="footer">
  <h1>课程设计选课系统</h1>
  </div>

</body>
</html>