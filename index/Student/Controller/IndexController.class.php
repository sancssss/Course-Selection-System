<?php
namespace Student\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
   	 $title = "个人中心";
     $this->isLogin();
     $user_number = session('user_number');
     $Model = M();
     //查询待确认与未确认的课题申请
     $resultNoConfirm = $Model->query("SELECT user_name,course_title,course_id,user_id FROM sc_course,sc_user WHERE sc_course.course_teacherid = sc_user.user_id AND course_id IN (SELECT sc_courseid FROM sc_user,sc_course_user WHERE sc_user.user_id = sc_course_user.sc_userid AND sc_course_user.sc_isconfirm = 0 AND sc_user.user_number =".$user_number.")");
     $count1 = count($resultNoConfirm);
     $resultIsConfirm = $Model->query("SELECT user_name,course_title,course_id,user_id FROM sc_course,sc_user WHERE sc_course.course_teacherid = sc_user.user_id AND course_id IN (SELECT sc_courseid FROM sc_user,sc_course_user WHERE sc_user.user_id = sc_course_user.sc_userid AND sc_course_user.sc_isconfirm = 1 AND sc_user.user_number =".$user_number.")");
     $count2 = count($resultIsConfirm);
     $username = $Model->query("SELECT user_name FROM sc_user WHERE user_number = ".$user_number);
     $this->assign('username',$username[0]['user_name']);
     $this->assign('NoConfirm',$resultNoConfirm);
     $this->assign('IsConfirm',$resultIsConfirm);
     $this->assign('count1',$count1);
     $this->assign('count2',$count2);
     $this->assign('title',$title);
     $this->display();
 	}

 	public function allCourse(){
 		$title = "全部课题";
 		$this->isLogin();
 		$Model = M();
 		$resultAllCourse = $Model->query("SELECT course_id,course_title,user_name FROM sc_course,sc_user WHERE sc_course.course_teacherid = sc_user.user_id;");
        $count = count($resultAllCourse);
 		$this->assign('allCourse',$resultAllCourse);
 		$this->assign('title',$title);
        $this->assign('count',$count);
 		$this->display();
 	}

    public function userList(){
        $this->isLogin();
        $title = '老师列表';
        $Model = M();
        $result = $Model->query("SELECT sc_user.user_name,sc_user.user_id,COUNT(course_id) AS count  FROM sc_course,sc_user WHERE sc_course.course_teacherid = sc_user.user_id GROUP BY sc_user.user_id");
        $count = count($result);
        $this->assign('count',$count);
        $this->assign('result',$result);
        $this->assign('title',$title);
        $this->display();
    } 

 	//通过出题教师分类查看课题
 	public function userCourse($id){
 		$this->isLogin();
 		$Model = M();
 		$resultUserCourse = $Model->query("SELECT course_id,course_title,user_name,user_id FROM sc_course,sc_user WHERE sc_course.course_teacherid = sc_user.user_id AND user_id=".$id.";");
 		$this->assign('userCourse',$resultUserCourse);
 		$this->assign('title',$resultUserCourse[0]['user_name']."的课题");
 		$this->display();
 	}
 	//标题搜索
 	public function search(){
 		$Model = M();
 		$val = I('post.val');
 		if(!empty($val)){
 			$result = $Model->query("SELECT course_id,course_title FROM sc_course WHERE course_title LIKE '%".$val."%'");
 			$count = $Model->query("SELECT COUNT(*) FROM sc_course WHERE course_title LIKE '%".$val."%'");
 		}
 		$this->assign('title','搜索结果共');
 		$this->assign('count',$count[0]['count(*)']);
 		$this->assign('result',$result);
 		$this->display();
 	}

 	public function isLogin(){
 		$user_number = session('user_number');
     	//未登录跳转
     	if(empty($user_number)){
     		$this->error('请登录后访问！','/index.php');
     	}
 	}

 	public function loginOut(){
 		session(null);
 		$this->success("退出登录成功！",'/index.php');
 	}
}