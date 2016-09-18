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
  <div data-role="header">
  <a href="/index.php/Teacher/index/index" class="ui-btn ui-icon-home ui-btn-icon-left">中心</a>
    <h1>申请处理</h1><a href="#" data-role="button" data-rel="back">返回</a>
  </div>
 <div data-role="content">


<div class="ui-corner-all custom-corners">
  <div class="ui-bar ui-bar-a">
    <h3>题目：<?php echo ($t_title); ?></h3>
  </div>
  <div class="ui-body ui-body-a">
    <p>内容：<?php echo ($content); ?><br/>
申请人:<?php echo ($user); ?></p>
  </div>
</div>


<?php if($isConfirm == 0): ?><a href="/index.php/Teacher/Course/confirmIt/userid/<?php echo ($s_user_id); ?>/courseid/<?php echo ($course_id); ?>" class="ui-btn ui-btn-inline ui-icon-plus ui-btn-icon-right" data-ajax="false"><?php echo ($confirmIt); ?></a> 
<?php else: ?><a href="/index.php/Teacher/Course/cancelApply/userid/<?php echo ($s_user_id); ?>/courseid/{$.course_id}"  class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-right"data-ajax="false"><?php echo ($cancelIt); ?></a><?php endif; ?>
 </div>
  <div data-role="footer">
  <h1>课程设计选课系统</h1>
  </div>
</div> 

</body>
</html>