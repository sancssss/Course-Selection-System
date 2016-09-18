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
<h1>注册账号</h1>
 </div> 
 <div data-role="content">
<FORM method="post" action="/index.php/Home/User/register" data-ajax="false">
<label for="name" class="ui-hidden-accessible">姓名</label>
<label for="id" class="ui-hidden-accessible">ID</label>
<label for="password" class="ui-hidden-accessible">姓名</label>
<label for="repassword" class="ui-hidden-accessible">密码</label>
姓名:<INPUT type="text" name="name" id = "name" placeholder="姓名...">
学号/工号:<INPUT type="text" name="id" id = "id" placeholder="学号/工号...">
密码:<INPUT type="text" name="password" id = "password" placeholder="密码...">
确认密码:<INPUT type="text" name="repassword" id = "repassword" placeholder="确认密码...">
是否教师:<select name = "is_teacher">
  <option value="1">是</option>
  <option value="0">否</option>
</select>
<INPUT type="submit" value="注册">
</FORM>
</div>
  <div data-role="footer">
  <h1>课程设计选课系统</h1>
  </div>
</div> 

</body>
</html>