<?php
namespace Admin\Controller;
use Think\Controller;
class CourseController extends Controller {
    public function index($id){
        $this->isLogin();
        $title = '修改课题';
        $Model = M();
        $result = $Model->query("SELECT * FROM sc_course WHERE course_id = %d",$id);
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
        $Course = M();
        $data['id'] = I('post.id');
        $data['title'] = I('post.title');
        $data['content'] = I('post.content');

        //时间更新操作由触发器完成
        $result = $Course->execute("UPDATE sc_course SET course_title='%s',course_content='%s' WHERE course_id = %d",$data['title'],$data['content'],$data['id']);
        if(!empty($result)){
            $this->success('更新成功！');
        }else{

            $this->error('更新失败');
        }

    }
    //全部课程
 	public function CourseList(){
        $this->isLogin();
        $title = '全部课题';
        $Model = M();
        $allCourse = $Model->query("SELECT course_id,course_title,user_name FROM sc_user,sc_course WHERE sc_user.user_id = sc_course.course_teacherid");
        $count = count($allCourse);
        $this->assign('count',$count);
        $this->assign('allCourse',$allCourse);
        $this->assign('title',$title);
        $this->display();
    }   


   //删除课程操作
    public function deleteIt($id){
        $this->isLogin();
        $Model = M();
        //TODO
        //非法访问提示优化未做
        $result = $Model->execute("DELETE FROM sc_course WHERE course_id=%id",$id);
        if($result){
            $this->success('删除成功！','/index.php/Teacher/Course/allCourse');
        }
    }


    public function isLogin(){
        $user_number = session('user_number');
        $user_identityid = session('user_identityid');
         if(empty($user_number)){
            $this->error('请登录后访问！','/index.php');
        } 
         //身份不为管理
         if(empty($user_identityid) or $user_identityid != 3){
          	$this->error('您的身份无法访问此模块！','/index.php');
         }
    }      
}