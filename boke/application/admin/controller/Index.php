<?php
	namespace app\admin\controller;
	use think\Controller;
	use app\admin\model\Article;
	use app\admin\model\Comment;
	use app\admin\model\Link;
	use think\facade\Session;
	use think\Request;
	use think\Db;
	class Index extends Rule{
		public function main(){
			$art_num = count(Article::where('is_del',0)->select());//文章数
			$art_com_num = count(Comment::where('is_del',0)->select());//评论数
			$art_link_num = count(Link::where('is_del',0)->select());//友链数
			$username = Session::get('name');//登陆者名称
			$login_pe = new Login;
			$login_time = Db::table('user')->field('login_time')->where('user_name',$username)->find();
			$login_time = date('Y-m-d H:i:s',$login_time['login_time']);//登陆时间
			$Request = request();
			$r_ip = $Request->ip();//访问ip
			$login_num = $login_pe->login_num();//登陆者登录次数
			$user_num = count(Db::table('user')->field('user_name')->where('is_del',0)->select());
			$Browser = $this->getBrowser();//访问者浏览器
			$system = $this->GetOS();//访问者操作系统类型
			// $version=apache_get_version(); //获取获取Apache版本 
			$php_v = PHP_VERSION;
			// $mysql_v = mysql_get_server_info();
			$now_time = date('Y-m-d H:i:s');//当前时间
			//个人信息部分
			$truename = Db::table('user')->field('truename')->where('user_name',$username)->find();
			$phone = Db::table('user')->field('phone')->where('user_name',$username)->find();
			// dump($truename);
			$this->assign('artical_num',$art_num);//文章数
			$this->assign('art_com_num',$art_com_num);//评论数
			$this->assign('art_link_num',$art_link_num);//友链数
			$this->assign('username',$username);//登陆者名称
			$this->assign('login_num',$login_num);//登陆者登录次数
			$this->assign('login_time',$login_time);//登陆时间
			$this->assign('r_ip',$r_ip);//访问ip
			$this->assign('user_num',$user_num);//访问ip
			$this->assign('Browser',$Browser);//访问者浏览器
			$this->assign('system',$system);//访问者操作系统类型
			// $this->assign('v_apacha',$v_apacha);//获取Apache版本 
			$this->assign('php_v',$php_v);//获取Apache版本 
			$this->assign('now_time',$now_time);//获取Apache版本 
			//个人信息部分
			//
			$this->assign('truename',$truename['truename']);
			$this->assign('phone',$phone['phone']);
			return $this->fetch();   
		}
		//获取客户端浏览器名称
		public function getBrowser() {
	        $user_OSagent = $_SERVER['HTTP_USER_AGENT'];
	        if (strpos($user_OSagent, "Maxthon") && strpos($user_OSagent, "MSIE")) {
	            $visitor_browser = "Maxthon(Microsoft IE)";
	        } elseif (strpos($user_OSagent, "Maxthon 2.0")) {
	            $visitor_browser = "Maxthon 2.0";
	        } elseif (strpos($user_OSagent, "Maxthon")) {
	            $visitor_browser = "Maxthon";
	        } elseif (strpos($user_OSagent, "Edge")) {
	            $visitor_browser = "Edge";
	        } elseif (strpos($user_OSagent, "Trident")) {
	            $visitor_browser = "IE";
	        } elseif (strpos($user_OSagent, "MSIE")) {
	            $visitor_browser = "IE";
	        } elseif (strpos($user_OSagent, "MSIE")) {
	            $visitor_browser = "MSIE";
	        } elseif (strpos($user_OSagent, "NetCaptor")) {
	            $visitor_browser = "NetCaptor";
	        } elseif (strpos($user_OSagent, "Netscape")) {
	            $visitor_browser = "Netscape";
	        } elseif (strpos($user_OSagent, "Chrome")) {
	            $visitor_browser = "Chrome";
	        } elseif (strpos($user_OSagent, "Lynx")) {
	            $visitor_browser = "Lynx";
	        } elseif (strpos($user_OSagent, "Opera")) {
	            $visitor_browser = "Opera";
	        } elseif (strpos($user_OSagent, "MicroMessenger")) {
	            $visitor_browser = "WeiXinBrowser";
	        } elseif (strpos($user_OSagent, "Konqueror")) {
	            $visitor_browser = "Konqueror";
	        } elseif (strpos($user_OSagent, "Mozilla/5.0")) {
	            $visitor_browser = "Mozilla";
	        } elseif (strpos($user_OSagent, "Firefox")) {
	            $visitor_browser = "Firefox";
	        } elseif (strpos($user_OSagent, "U")) {
	            $visitor_browser = "Firefox";
	        } else {
	            $visitor_browser = "Other Browser";
	        }
	        return $visitor_browser;
	    }
	    //获取客户端操作系统
	    public function GetOS() {
	        $OS = $_SERVER['HTTP_USER_AGENT'];
	        if (preg_match('/win/i',$OS)) {
	            $OS = 'Windows';
	        }
	        elseif (preg_match('/mac/i',$OS)) {
	            $OS = 'MAC';
	        }
	        elseif (preg_match('/linux/i',$OS)) {
	            $OS = 'Linux';
	        }
	        elseif (preg_match('/unix/i',$OS)) {
	            $OS = 'Unix';
	        }
	        elseif (preg_match('/bsd/i',$OS)) {
	            $OS = 'BSD';
	        }
	        else {
	            $OS = 'Other';
	        }
	        return $OS;
	    }
	    //获取服务器信息
	    public function getSeverInfo(){

	    }
	    //修改个人信息
	    public function tijiao(){
	    	$res = input('post.');
	    	$truename = $res['truename'];
	    	$name = $res['name'];
	    	$phone = $res['phone'];
	    	$oldpsw = $res['oldpsw'];
	    	$newpsw = $res['newpsw'];
	    	$rightpsw = $res['rightpsw'];

	    	$req = Db::table('user')->where('user_name',$name)->find();
	    	if($req == null){
	    		return self::rules(-111,'用户名不存在',[]);
	    	}
	    	else{
		    		if(md5($oldpsw) == $req['password']){
		    			if($newpsw == $rightpsw){
		    				Db::table('user')->where('user_name',$name)->update(['truename'=>$truename,'phone'=>$phone,'password'=>md5($newpsw)]);
		    				return self::rules(1,'修改成功',[]);
		    			}
		    			else{
		    				return self::rules(0,'两次输入的密码不一致',[]);
		    			}
		    			
		    		}
		    		else{
		    			return self::rules(-1,'旧密码输入错误',[]);
		    		}
	    		 
	    		}
	    	}
	}
?>