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
<?php echo ($title); ?>|系统后台
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
  <a href="/index.php/Admin/index/index" class="ui-btn ui-icon-home ui-btn-icon-left">中心</a>
    <h1>修改课题</h1><a href="#" data-role="button" data-rel="back">返回</a>
  </div> 
  <div data-role="content">
<FORM method="post" action="/index.php/Admin/Course/update" data-ajax="false">
标题：<INPUT type="text" name="title" value="<?php echo ($t_title); ?>"><br/>
内容：<TEXTAREA name="content" rows="5" cols="45"><?php echo ($content); ?></TEXTAREA><br/>
<INPUT type="hidden" name="id" value="<?php echo ($id); ?>">
<INPUT type="submit" value="提交" data-inline="true">
</FORM><a href="/index.php/Admin/Course/deleteIt/id/<?php echo ($id); ?>" data-ajax="false">删除</a>
</br>
上次修改时间：<?php echo ($time); ?>
</div>
  <div data-role="footer">
  <h1>课程设计选课系统</h1>
  </div>
</div> 

</body>
</html>