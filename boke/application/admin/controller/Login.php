<?php
	namespace app\admin\controller;
	use think\Controller;
	use think\Db;
	use think\facade\Session;
	use think\Cache;
	use think\Ruquest;
	use Redis;
	use app\admin\controller\Common;
	use \Firebase\JWT\JWT;
	use think\facade\Cookie;
	class Login extends Common{
		public function index(){
			// echo '1';
			
			return $this->fetch();
		}
		public function islogin(){

			$num = input('post.');
			// dump($res);
			$username = $num['username'];
			$userPwd = $num['userPwd'];

			$res = Db::table('user')->where('user_name',$username)->select();
			if (empty($res)){
				//账号不存在
				return self::rules(0,'用户不存在',[-111]);//失败
			}else{
				if ($res[0]['password']!=md5($userPwd)){
					//密码错误
					return self::rules(0,'密码错误',[-111]);//失败
				}else{
					//成功
					Session::set('name',$username);
					// $time = time();
					// $data=['login_time'=>time()]
					$request = request();
					$ip=$request->ip();
					$pre_time = Db::table('user')->where('user_name',$username)->field('login_time')->find();
					$uid = Db::table('user')->where('user_name',$username)->field('u_id')->find();
					$token = $this->getToken($uid);
					Cookie::set('token',$token,100000);
					Redis::
					// return $token;
					// return dump($pre_time);
					Db::table('user')
					->where('user_name',$username)
					->update(['pre_time'=>$pre_time['login_time'],'login_time'=>time(),'ip'=>$ip]);
				    return self::rules(1,'登陆成功',[0]);
				}
			}
		}
		//登录次数
		public function login_num(){
			$redis = new Redis();
			$redis->connect('127.0.0.1',6379);
			$n = $redis->incr(Session::get('name'));
			return $n;
		}
		public function getToken($uid){
			$type = config('jwt_type');
	        $key = config('jwt_key');
	        $token = array(
	            "iss" => "hahaha",//该JWT的签发者，用于后面的解密操作
	            "iat" => time(),//创建时间
	            "exp" => time()+7200//什么时候过期
	        );
	        $jwt = JWT::encode($token, $key);
	        return $jwt;
		}
	}
?>