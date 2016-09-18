<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	//字段映射
	protected $_map = array(
        'id' =>'user_number', // 把表单中id映射到数据表的user_number字段
        'name'=>'user_name',
        'password'=>'user_password',
        'is_teacher'=>'user_identityid'
    );

	// 定义自动验证
    protected $_validate    =   array(
        array('user_name','require','姓名必须'),
        array('user_number','require','学号/工号必须'),
        array('user_password','require','密码必须'),
        array('repassword','require','确认密码必须'),
        array('repassword','user_password','确认密码不一致',0,'confirm'), 
        );
    //自动完成
    protected $_auto	=	array(
    	);
    

}
