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
  <div data-role="header">
<?php if($loginTag == 1): ?><a href="/index.php/Student/index/index" class="ui-btn ui-icon-home ui-btn-icon-left">中心</a><a href="/index.php/Student/index/loginOut" data-icon = "back" data-ajax="false">退出</a>   <h1>课程设计选课系统</h1>
<?php elseif($loginTag == 2): ?><a href="/index.php/Teacher/index/index" class="ui-btn ui-icon-home ui-btn-icon-left">中心</a><a href="/index.php/Teacher/index/loginOut" data-icon = "back" data-ajax="false" >退出</a> <h1>课程设计选课系统</h1>
<?php else: ?> <a href="index.php/Home/User/loginIndex">登录</a><a href="index.php/Home/User/index">注册</a>
    <h1><?php echo ($is_Login); ?>课程设计选课系统</h1><?php endif; ?>
  </div>

 <div data-role="content">
 <ul data-role="listview" data-inset="true">
 <li data-role="list-divider">最新发布<?php echo ($new_info); ?><span class="ui-li-count">共<?php echo ($count); ?>条</span></li>
<?php if(is_array($resultArr)): $i = 0; $__LIST__ = array_slice($resultArr,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
<a href="index.php/Home/index/courseInfo/id/<?php echo ($vo["course_id"]); ?>">《<?php echo ($vo["course_title"]); ?>》</a><p class="ui-li-aside"><?php echo ($vo["user_name"]); ?></p>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if($loginTag != (1 or 2)): ?><li>登录查看更多！</li><?php endif; ?>
 </ul>
  </div>

  <div data-role="footer">
  <h1>课程设计选课系统</h1>
  </div>
</div> 

</body>
</html>