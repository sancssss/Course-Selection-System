<?php
//后台管理首页
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->isLogin();
        $title = '首页';
        $Model = M();
        //未确认身份的用户
        $resultUser =  $Model->query("SELECT user_id,user_name FROM sc_user WHERE user_identityid = 4;");
        $count1 = count($resultUser);
        //最新课程
        $resutlCourse = $Model->query("SELECT course_id,course_title,user_name,course_create_time FROM sc_course,sc_user WHERE sc_course.course_teacherid = sc_user.user_id ORDER BY course_create_time DESC;");
        $count2 = count($resutlCourse);
        $this->assign('count1',$count1);
        $this->assign('count2',$count2);
        $this->assign('title',$title);
        $this->assign('resultUser',$resultUser);
        $this->assign('resutlCourse',$resutlCourse);
        $this->display();

    }



    //是否登录检测&&用户权限检测
    public function isLogin(){
        $user_number = session('user_number');
        $user_identityid = session('user_identityid');
         if(empty($user_number)){
            $this->error('请登录后访问！','/index.php');
        } 
         //身份不为老师
         if(empty($user_identityid) or $user_identityid != 3){
          	$this->error('您的身份无法访问此模块！','/index.php');
         }
    }

    public function loginOut(){
        session(null);
        $this->success("退出登录成功！",'/index.php');
    }
}