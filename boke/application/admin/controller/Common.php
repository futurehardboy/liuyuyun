<?php
	namespace app\admin\controller;
	use think\Controller;
	use think\facade\Session;
	use think\Db;
	class Common extends Controller{
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
		
	}
?>
