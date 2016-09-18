<?php
//显示课程详情，取消未同意课程
namespace Student\Controller;
use Think\Controller;
class CourseController extends Controller {
    //课程详情显示
    public function index($id = 1){
        $this->isLogin();
        $sc_userid = session('user_id');
        $Model = M();
        $result = $Model->query("SELECT course_title,user_name,course_create_time,course_content,course_id FROM sc_course,sc_user WHERE sc_course.course_teacherid = sc_user.user_id AND sc_course.course_id = ".$id.";");
        //验证是否被同意
        $isConfirmResult = $Model->query("SELECT * FROM sc_course_user WHERE sc_courseid = ".$id." AND sc_userid = ".$sc_userid);
        $isConfirm = $isConfirmResult[0]['sc_isconfirm'];
        if(empty($isConfirmResult)){
            //未申请过课
            $isConfirm = 3;
        }
        $this->assign('isConfirm',$isConfirm);
        $this->assign('selecturl','申请此课');
        $this->assign('cancelurl','取消申请');
        $this->assign('title',$result[0]['course_title']);
        $this->assign('username',$result[0]['user_name']);
        $this->assign('time',$result[0]['course_create_time']);
        $this->assign('content',$result[0]['course_content']);
        $this->assign('id',$result[0]['course_id']);
        $this->display();
    }
    //取消未同意的申请
    public function cancelIt($id){
        $this->isLogin();
        $sc_userid = session('user_id');
        $Model = M();
        //检查课程
        $checkIt = $Model->query("SELECT * FROM sc_course_user WHERE sc_courseid = ".$id." AND sc_userid = ".$sc_userid);
        if(empty($checkIt)){
            $this->error("无此选课");
        }else{
             if($checkIt[0]['sc_isconfirm'] == 1){
                $this->error("该课已经被同意申请无法取消！");
            }
            $result = $Model->execute("DELETE FROM sc_course_user WHERE sc_courseid = ".$id);
            if($result){
                $this->success('取消成功','/index.php/Student/index/index');
            }
        }

    }
    //添加课程
    public function selectIt($id){
        $this->isLogin();
        $Model = M();
        $sc_userid = session('user_id');
        $isSelected = $Model->query("SELECT * FROM sc_course_user WHERE sc_courseid =".$id." AND sc_userid = ".$sc_userid);
        if(empty($isSelected)){
             $result = $Model->execute("INSERT INTO sc_course_user VALUES('".$sc_userid."','".$id."','0');");
             $this->success('课程添加成功！','/index.php/Student/index/index');
        }else{
             $this->error('你已经申请过该课程','/index.php/Student/index/index');
        }
       

    }
    //是否登录检测
    public function isLogin(){
        $user_number = session('user_number');
         if(empty($user_number)){
            $this->error('请登录后访问！','/index.php');
        }
    }
     
}