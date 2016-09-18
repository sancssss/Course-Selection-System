<?php
//用户界面
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index($id){
       $this->isLogin();
       $title = '用户详情';
       $Model = M();
       $result = $Model->query("SELECT * FROM sc_user WHERE user_id = %d",$id);
       if(empty($result)){
       	$this->error('没有该用户信息！');
       }
       $this->assign('is_teacher',$result[0]['is_teacher']);
       $this->assign('username',$result[0]['user_name']);
       $this->assign('usernumber',$result[0]['user_number']);
       $this->assign('id',$result[0]['user_id']);
       $this->assign('title',$title);
       $this->display();
    }

    //更新用户操作
    public function update(){
    	$this->isLogin();
    	$username = I('post.username');
    	$usernumber = I('post.usernumber');
    	$password = I('post.password');
    	$useridentityid= I('post.is_teacher');
    	$id = I('post.id');
    	$Model = M();
    	if(empty($password)){
    		$Model->execute("UPDATE sc_user SET user_number = %d,user_name = '%s',user_identityid = %d WHERE user_id = %d",$usernumber,$username,$useridentityid,$id);
    		$this->success('修改成功！');
    	}else{
    		$Model->execute("UPDATE sc_user SET user_number = %d,user_name = '%s',user_identityid = %d, user_password = '%s' WHERE user_id = %d",$usernumber,$username,$useridentityid,md5($password),$id);
    		$this->success('修改成功！');
    	}
    }
    //显示用户列表
    public function userList($isConfrim){
    	$this->isLogin();
    	$Model = M();
    	if($isConfrim == 0){
    		$result = $Model->query("SELECT * FROM sc_user WHERE user_number != 10000");
    		$title = '全部用户列表';
    	}else if($isConfrim == 1){
    		$result = $Model->query("SELECT * FROM sc_user WHERE user_number != 10000 AND user_identityid = 4");
    		$title = '未确认身份的用户';
    	}else{
    		$result = $Model->query("SELECT * FROM sc_user WHERE user_number != 10000");
    		$title = '全部用户列表';
    	}
    	$count = count($result);
    	$this->assign('result',$result);
    	$this->assign('title',$title);
    	$this->assign('count',$count);
    	$this->display();
    }

    //用户确认操作
    public function addTeacher($id){
    	$this->isLogin();
    	$Model = M();
    	$checkIt = $Model->query("SELECT user_identityid FROM sc_user WHERE user_id = %d",$id);
    	if($checkIt[0]['user_identityid'] != 4){
    		$this->error('已经确认过身份！请不要重复确认');
    	}else{
    		$Model->execute("UPDATE sc_user SET user_identityid = 2 WHERE user_id = %d",$id);
    		$this->success('确认成功');
    	}
    }

    //删除用户
    public function deleteIt($id){
        $this->isLogin();
        $Model = M();
        //TODO
        //非法访问提示优化未做
        $result = $Model->execute("DELETE FROM sc_user WHERE user_id=%d",$id);
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
         //身份不为老师
         if(empty($user_identityid) or $user_identityid != 3){
          	$this->error('您的身份无法访问此模块！','/index.php');
         }
    }     
}