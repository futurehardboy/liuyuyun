<?php
	namespace app\admin\controller;
	use think\controller;
	use app\admin\model\Link;
	class Links extends Rule{
		public function flink(){
			$link = new Link;
			$req = $link->where('is_del',0)->select();
			// return dump($req);
			$this->assign('req',$req);
			return $this->fetch();
		}
	}
?>