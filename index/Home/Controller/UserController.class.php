<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    //注册界面
    public function index(){
        $title = "注册";
        $this->assign('title',$title);
    	$this->display();
    }
    //注册操作
    public function register(){
       //echo(I('post.is_teacher'));
        $User = D("User");//实例化模型类
        $Check = M();//实例化查询模型检查重复
        $data['id'] = I('post.id');
        $data['name'] = I('post.name');
        $data['password'] = I('post.password');
        $data['is_teacher'] = I('post.is_teacher');
        $data['repassword'] = I('post.repassword');
        $userCreate = $User->create($data);
        //利用学号查询检查唯一性
        $userNumbersql = $Check->query("SELECT * FROM sc_user where user_number = ".$data['id']);
        //var_dump($userNumbersql);
        //工号唯一性解决
        if(!empty($userNumbersql)){
            $this->error("注册失败,此学号已经注册过！");
        }
        if($userCreate){
            $User->user_password = md5($User->user_password);//D模型对应模型类所对应的字段映射
            if($User->user_identityid == 1){
                //第一次注册，4为未处理教师申请信息
                $User->user_identityid = 4;
            }else{
                //否者为普通学生注册
                $User->user_identityid = 1;
            }
            //取得数据库操作是否成功
            $result = $User->add();
            if($result){
                 $this->success("注册成功");
            }else{
                $this->error("注册失败检查输入格式是否正确！");
            }
        }else{
            $this->error($User->getError());
        }
    }
    //登录界面
    public function loginIndex(){
        $title = "登录";


        $this->assign('title',$title);
        $this->display();
    }
    //登录操作
    public function login(){
        $Model = M();
        $userNumber = I('post.id');
        $password = I('post.password');
        if(empty($userNumber) || empty($password)){
            $this->error('请输入完整！');
        }
        $result = $Model->query("SELECT user_number,user_password FROM sc_user WHERE user_number =".$userNumber);
        if($result[0]['user_password'] == md5($password)){
            //检查身份查询
            $result = $Model->query("SELECT user_identityid,user_id FROM sc_user WHERE user_number =".$userNumber);
            $checkIdentity = $result[0]['user_identityid'];
            $user_id = $result[0]['user_id'];
            //准备设置session
            $setSession = array('name'=>'session_id','expire'=>3600);
            session($setSession);
            //记录user_number与user_identityid到session
            session('user_number', $userNumber);
            session('user_identityid',$checkIdentity);
            session('user_id',$user_id);
            //根据身份跳转
            switch ($checkIdentity) {
                //学生身份
                case 1:
                    $this->success("学生登录成功",'/index.php/Student/index/index');
                    break;
                //教师身份
                case 2;
                    $this->success("教师登录成功",'/index.php/Teacher/index/index');
                     break;
                //超级用户身份
                case 3:
                    $this->success("超级用户登录成功",'/index.php/Admin/index/index');
                     break;
                //未验证身份
                default:
                    $this->success("您的身份未验证，请联系后台管理员！",'/index.php');
            }
            
        }else{
            $this->error("密码错误登陆失败");
        }
    }

}