<?php
	namespace app\admin\controller;
	use think\controller;
	use app\admin\model\Inner;
	use think\Request;
	use think\Db;
	class Upnotic extends Rule{
		public function index($inid=''){
			$inner = new Inner;
			$list = $inner->where('inner_id',$inid)->where('is_del',0)->select();
			// return dump($list[0]);
			$this->assign('inner_title',$list[0]['inner_title']);
			$this->assign('inner_content',$list[0]['inner_content']);
			$this->assign('inner_gjz',$list[0]['inner_gjz']);
			$this->assign('inner_dsc',$list[0]['inner_dsc']);
			return $this->fetch('upnotic');
		}
		public function upnotic(){
			$req = input('post.');
			// return $req;
			$inner = new Inner;
			$inner->isUpdate(true)->save($req,['inner_id'=>$req['inner_id']]);
			return self::rules(1,'修改成功',[]);
		}
		public function delete(){
			$req  = input('post.');
			Db::table('inner')->where('inner_id',$req['id'])->update(['is_del'=>1]);
		}
	}
?>