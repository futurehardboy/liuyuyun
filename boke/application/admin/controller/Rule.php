<?php
	namespace app\admin\controller;
	use think\Controller;
	use think\facade\Session;
	use think\Db;
	use app\admin\controller\Common;
	class Rule extends Common{
		static public function rules($code = 1,$msg = '',$data = [],$httpCode = 200){
			$return_data = [
				'code' => $code,
				'msg' => $msg,
				'data' => $data,
			];
			if(!empty($msg)){
				$return_data['msg'] = $msg;
			}
			else if(isset(Code::$return_data[$code])){
				$return_data['msg'] = Code::$return_data[$code];
			};
			
			return json($return_data,$httpCode);
		}
		protected function initialize()
	    {
	        $username = Session::get('name');//登陆者名称
			$this->assign('username',$username);//登陆者名称
			$res = Db::table('user')->where('user_name',$username)->select();
			if(!isset($username) || $username != $res[0]['user_name']){
				 
				exit();
			}
	    }
		
	}
?>
