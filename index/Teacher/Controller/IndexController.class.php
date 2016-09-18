<?php
//教师端首页数据获取
namespace Teacher\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $title = "个人中心";
     $this->isLogin();
     $user_number = session('user_number');
     $user_id = session('user_id');
     $Model = M();
     $resultMyCourse = $Model->query("SELECT course_id,course_title FROM sc_user,sc_course WHERE sc_user.user_id = sc_course.course_teacherid AND user_number = ".$user_number." ORDER BY course_create_time DESC" );
     $count1 = count($resultMyCourse);
     $resultNoConfirm = $Model->query("SELECT s_user_id,course_id,user_name,course_title FROM `sc_view_no_confirm_1` WHERE sc_isconfirm = 0 AND user_id =".$user_id);
     $count2 = count($resultNoConfirm);
     $username = $Model->query("SELECT user_name FROM sc_user WHERE user_number = ".$user_number);
     $this->assign('username',$username[0]['user_name']);
     $this->assign('NoConfirm',$resultNoConfirm);
     $this->assign('myCourse',$resultMyCourse);
     $this->assign('count1',$count1);
     $this->assign('count2',$count2);
     $this->assign('title',$title);
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
         if(empty($user_identityid) or $user_identityid != 2){
          	$this->error('您的身份无法访问此模块！','/index.php');
         }
    }

    public function loginOut(){
        session(null);
        $this->success("退出登录成功！",'/index.php');
    }
}