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
    <h1>修改用户</h1><a href="#" data-role="button" data-rel="back">返回</a>
  </div> 
  <div data-role="content">
<FORM method="post" action="/index.php/Admin/User/update" data-ajax="false">
姓名:<INPUT type="text" name="username" id = "username" placeholder="姓名..." value = "<?php echo ($username); ?>"">
学号/工号:<INPUT type="text" name="usernumber" id = "usernumber" placeholder="学号/工号..." value = "<?php echo ($usernumber); ?>">
新密码:<INPUT type="text" name="password" id = "password" value = "" placeholder="不输入则不修改">
是否教师:
<INPUT type="hidden" name="id" value="<?php echo ($id); ?>">
<select name = "is_teacher">
  <option value="1">否</option>
  <option value="2">是</option>
</select>
<INPUT type="submit" value="提交">
</FORM><a href="/index.php/Admin/User/deleteIt/id/<?php echo ($id); ?>" data-ajax="false" class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-right">删除</a>
</div>
  <div data-role="footer">
  <h1>课程设计选课系统-后台</h1>
  </div>
</div> 

</body>
</html>