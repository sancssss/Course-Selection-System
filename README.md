#1.概要：
1)为了方便学生选择申请课程设计，以及老师发布管理课程设计，后端利用THINKPHP MVC结构框架配合MySQL数据库开发此课程设计管理系统的逻辑操作模块，前端利用JQueryMobile框架优化移动设备用户使用的体验。
2)该系统拥有四大模块实现教师，学生，超级管理员，匿名用户之间的交互功能。
3)任意功能模块任意卸载添加互不影响方便后续的开发以及维护。
2.开发技术：
1)开发工具：Sublime Text文本编辑器。
2)平台支持：Windows/PHP5.3 /MySQL5.5.40/Nignx。
3)开发语言：PHP5.3+MySQL5.5.40。
4)开发框架：后端THINKPHP3.2.3，前端JQueryMobile1.4.5。
#2模块：
1.Admin模块(超级管理员可进入):
超管确认未认证老师注册申请。
超管管理全部用户的用户信息。
超管管理全部课程的课程信息.
2.Teacher模块（老师可以进入）:
教师添加课程设计。
教师删除课程设计。
教师修改课程设计。
教师确认学生申请。
教师取消学生申请。
教师首页显示课程设计。
3.Student模块（学生可以进入）:
学生搜索关键字找课程。
学生按老师分类找课程。
学生查看所有课程设计。
学生申请课程设计功能。
学生取消未同意的申请。
3.Index模块（任何人都可以访问）：
同一登录入口按身份自动跳转相应模块。
注册功能(注册老师身份需被后台确认才能用)。
显示最新添加的课程。