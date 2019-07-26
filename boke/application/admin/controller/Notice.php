<?php
	namespace app\admin\controller;
	use think\Controller;
	use app\admin\model\Inner;
	class Notice extends Rule{
		public function notice(){
			$inner = Inner::withAttr('inner_create_time',function($value,$data){
				return  date('Y-m-d H:i:s',$value);
			})->where('is_del',0)->select();
			$this->assign('inner',$inner);
			return $this->fetch();
		}
	}
?>