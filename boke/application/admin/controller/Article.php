<?php
	namespace app\admin\controller;
	use think\Controller;
	use think\Db;
	use app\admin\model\Article as Uarticle;

	class Article extends Rule{
		public function index(){
			$req = Uarticle::withAttr('artical_create_time',function($value,$data){
				return date('Y-m-d H:i:s',$value);
			})->where('is_del',0)->select();
			// dump($req);
			$this->assign('req',$req);
			return $this->fetch('article');
		}
	}
?>