<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$newInfo = "课题列表";
    	$title = "首页";
        //判断身份以及自动跳转
        $is_Login = session('user_identityid');
    	$Model = M();
    	$result = $Model->query("SELECT course_id,course_title,user_name,course_create_time FROM sc_course,sc_user WHERE sc_course.course_teacherid = sc_user.user_id ORDER BY course_create_time DESC;");//得到课程号，课程名，老师,时间
        //课程数量  
        $count = $Model->query("SELECT count(*) FROM sc_course");
        $this->assign('loginTag',$is_Login);
        $this->assign('count',$count[0]['count(*)']);
    	$this->assign('resultArr',$result);
        $this->assign('new_info',$newInfo);
        $this->assign('title',$title);
        $this->display();
    }

    public function courseInfo($id=1){
    	$courseInfo = "课程详情";
    	$title = "课程详情";
    	$Model = M();
    	$result = $Model->query("select course_title,user_name,course_content,course_create_time from sc_course,sc_user where sc_course.course_teacherid = sc_user.user_id and sc_course.course_id=".$id.";");
    	if(!$result){
    		$this->error('此id无对应数据！');
    	}
    	$this->assign('courseInfo',$result);
    	$this->assign('course_info',$courseInfo);
    	$this->assign('title',$title);
    	$this->display();
    }

}