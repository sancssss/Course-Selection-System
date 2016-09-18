<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
  <div data-role="header"><h1>你好，<?php echo ($username); ?></h1> 
 <div data-role="navbar">
 <ul>
 <li><a href="/index.php/Teacher/Course/addCourse" data-icon = "plus">发布课题</a></li>
 <li><a href="/index.php/Teacher/Course/userList" data-icon = "bars">申请列表</a></li>
 <li><a href="/index.php/Teacher/Course/allCourse" data-icon = "grid">全部课题</a></li>
 <li><a href="/index.php/Teacher/index/loginOut" data-icon = "back" data-ajax="false">退出登录</a></li>
 </ul>
 </div></div>
 <div data-role="content">


<ul data-role="listview" data-inset="true">
 <li data-role="list-divider">我发布的课题 <span class="ui-li-count">共<?php echo ($count1); ?>条</span></li>
<?php if(is_array($myCourse)): $i = 0; $__LIST__ = array_slice($myCourse,0,8,true);if( count($__LIST__)==0 ) : echo "目前没有数据！" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  data-icon="false">
<a href="/index.php/Teacher/Course/index/id/<?php echo ($vo["course_id"]); ?>"><?php echo ($vo["course_title"]); ?></a><?php endforeach; endif; else: echo "目前没有数据！" ;endif; ?>
</li>
<li><a href="/index.php/Teacher/Course/allCourse" data-icon = "grid">全部课题</a></li>
</volist>
 <li data-role="list-divider">待处理的课题申请 <span class="ui-li-count">共<?php echo ($count2); ?>条</span></li>
<?php if(is_array($NoConfirm)): $i = 0; $__LIST__ = array_slice($NoConfirm,0,8,true);if( count($__LIST__)==0 ) : echo "目前没有数据！" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  data-icon="false"> <a href="/index.php/Teacher/Course/userApply/userid/<?php echo ($vo["s_user_id"]); ?>/courseid/<?php echo ($vo["course_id"]); ?>"><?php echo ($vo["user_name"]); ?></a>  <p class="ui-li-aside">申请 《<?php echo ($vo["course_title"]); ?>》</p></li><?php endforeach; endif; else: echo "目前没有数据！" ;endif; ?>
<li><a href="/index.php/Teacher/Course/userList" data-icon = "bars">全部申请</a></li>
 </ul>
</div>

  <div data-role="footer">
  <h1>课程设计选课系统</h1>
  </div>

</body>
</html>