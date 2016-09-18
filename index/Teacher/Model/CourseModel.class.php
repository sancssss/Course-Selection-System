<?php
namespace Course\Model;
use Think\Model;
class CourseModel extends Model{
	//字段映射
	protected $_map = array(
        'title' =>'course_title', // 把表单中title映射到数据表的course_title字段
        'content'=>'course_content',
        'id'=>'course_id',
    );

	// 定义自动验证
    protected $_validate    =   array(
   
        );
    //自动完成
    protected $_auto	=	array(
    	);
    

}
