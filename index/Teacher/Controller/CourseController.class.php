<?php
//课程详情显示与修改
namespace Teacher\Controller;
use Think\Controller;
class CourseController extends Controller {
    //课程详情显示与修改
    public function index($id){
        $this->isLogin();
        $title = '修改课题';
        $userid = session('user_id');
        $Model = M();
        $result = $Model->query("SELECT * FROM sc_course WHERE course_teacherid = ".$userid." AND course_id = ".$id);
        if(empty($result)){
            $this->error("无该课程信息！");
        }
        $this->assign('title',$title);
        $this->assign('t_title',$result[0]['course_title']);
        $this->assign('time',$result[0]['course_create_time']);
        $this->assign('content',$result[0]['course_content']);
        $this->assign('id',$result[0]['course_id']);
        $this->display();
    }

    //更新课题操作
    public function update(){
        $this->isLogin();
        $userid = session('user_id');
        $Course = M();
        $data['id'] = I('post.id');
        $data['title'] = I('post.title');
        $data['content'] = I('post.content');

        //时间更新操作由触发器完成
        
        $result = $Course->execute("UPDATE sc_course SET course_title = '". $data['title']."',course_content = '".$data['content']."' WHERE course_teacherid=".$userid." AND course_id = ".$data['id'].";");
        if(!empty($result)){
            $this->success('更新成功！');
        }else{

            $this->error('更新失败');
        }

    }
    //添加课程页面
    public function addCourse(){
        $this->isLogin();
        $title = '添加课程';

        $this->assign('title',$title);
        $this->display();
    }


    //添加课程
    public function add(){
        $this->isLogin();
         $userid = session('user_id');
         $Course = M();
         $data['title'] = I('post.title');
         $data['content'] = I('post.content');
         //插入时自增行用NULL代替
         $result = $Course->execute("INSERT INTO sc_course VALUES(NULL,'".$data['title']."','".$data['content']."','".$userid."','')");
         if(!empty($result)){
            $this->success('添加成功！','/index.php/Teacher/Course/allCourse');
        }else{

            $this->error('添加失败');
        }
    }
    //删除课程操作
    public function deleteIt($id){
        $this->isLogin();
        $userid = session('user_id');
        $Model = M();
        //TODO
        //非法访问提示优化未做
        $result = $Model->execute("DELETE FROM sc_course WHERE course_id=".$id." AND "."course_teacherid = ".$userid);
        if($result){
            $this->success('删除成功！','/index.php/Teacher/Course/allCourse');
        }
    }

    //是否登录检测
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
    //申请的通过与未通过的用户页面
    public function userList(){
        $userid = session('user_id');
        $title = '申请管理';
        $this->isLogin();
        $this->title = '用户申请列表';
        $Model = M();
        //未确认的
        $resultNoConfirm = $Model->query("SELECT s_user_id,course_id,user_name,course_title FROM `sc_view_no_confirm_1` WHERE sc_isconfirm = 0 AND user_id =".$userid);
        //已确认的
        $resultIsConfirm =  $Model->query("SELECT s_user_id,course_id,user_name,course_title FROM `sc_view_no_confirm_1` WHERE sc_isconfirm = 1 AND user_id =".$userid);

     $this->assign('NoConfirm',$resultNoConfirm);
     $this->assign('IsConfirm',$resultIsConfirm);
     $this->assign('title',$title);
     $this->display();

    }

    //取消其申请操作
    public function cancelApply($userid,$courseid){
        $this->isLogin();
        $user_id = session('user_id');
        $Model = M();
        //检查是否有该申请
        $resultCheck = $Model->query("SELECT s_user_id,course_id,user_name,course_title FROM `sc_view_no_confirm_1` WHERE sc_isconfirm = 1 AND user_id =".$user_id." AND s_user_id =".$userid." AND course_id = ".$courseid);
        if(!empty($resultCheck)){
            $resultIsConfirm =  $Model->execute("UPDATE sc_course_user SET sc_isconfirm = 0 WHERE sc_userid=".$userid." AND sc_courseid=".$courseid);
            if($resultIsConfirm){
                $this->success('取消申请成功','/index.php/Teacher/Course/userList');
            }
        }else{
            $this->error('错误操作','/index.php/Teacher/Course/userList');
        }       

    }

    //确认其申请操作
    public function confirmIt($userid,$courseid){
        $this->isLogin();
        $user_id = session('user_id');
        $Model = M();
        $resultNoConfirm = $Model->query("SELECT s_user_id,course_id,user_name,course_title FROM `sc_view_no_confirm_1` WHERE sc_isconfirm = 0 AND user_id =".$user_id." AND s_user_id =".$userid." AND course_id = ".$courseid);
        if(!empty($resultNoConfirm)){
            $Model->execute("UPDATE sc_course_user SET sc_isconfirm = 1 WHERE sc_userid= ".$userid." AND sc_courseid = ".$courseid);
            $this->success('确认成功','/index.php/Teacher/Course/userList');
        }else{
            $this->error('错误操作','/index.php/Teacher/Course/userList');
        }
    }
    //用户申请课程详情页面
    public function userApply($userid,$courseid){
        $this->isLogin();
        $title = '申请详情';
        $Model = M();
        $user_id = session('user_id');
        $result = $Model->query("SELECT s_user_id,course_id,user_name,course_title,sc_isconfirm FROM `sc_view_no_confirm_1` WHERE  user_id =".$user_id." AND s_user_id =".$userid." AND course_id = ".$courseid);
        $course_content = $Model->query("SELECT course_content FROM sc_course WHERE course_id = ".$courseid);
        $isConfirm = $result[0]['sc_isconfirm'];
        $this->assign('t_title',$result[0]['course_title']);
        $this->assign('content',$course_content[0]['course_content']);
        $this->assign('user',$result[0]['user_name']);
        $this->assign('s_user_id',$result[0]['s_user_id']);
        $this->assign('course_id',$result[0]['course_id']);
        $this->assign('title',$title);
        $this->assign('isConfirm',$isConfirm);
        $this->assign('confirmIt','确认');
        $this->assign('cancelIt','取消');
        $this->display();

    }

    public function allCourse(){
        $this->isLogin();
        $title = '我的全部课题';
        $Model = M();
        $user_number = session('user_number');
        $MyCourse = $Model->query("SELECT course_id,course_title FROM sc_user,sc_course WHERE sc_user.user_id = sc_course.course_teacherid AND user_number = ".$user_number);
        $this->assign('myCourse',$MyCourse);
        $this->assign('title',$title);
        $this->display();
    }
     
}