<?php
	namespace app\admin\controller;
	use think\controller;
	use app\admin\model\User;
	class Log extends Rule{
		public function loginlog(){
			$user = new User;
			$req = $user->field('u_id,user_name,login_time,ip')->withAttr('pre_time',function($value,$data){
				return date('Y-m-d H:i:s',$value);
			})->where('is_del',0)->select();
			// return $req;
			$this->assign('req',$req);
			return $this->fetch();
		}
	}
?>