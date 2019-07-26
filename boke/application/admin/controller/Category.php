<?php
	namespace app\admin\controller;
	use think\controller;
	use app\admin\model\Lanmu;
	class Category extends Rule{
		public function category(){
			$lan = new Lanmu;
			$req = $lan->where('is_del',0)->select();
			$this->assign('lanmu',$req);
			// return dump($req);
			return $this->fetch();
		}
		public function addcate(){
			$res = input('post.');
			// return dump($res);
			$lanmu = new Lanmu;
			$a=$lanmu->save($res);
			if ($a){
				echo "<script>";
				echo "alert('添加成功');";
				echo "location.href='/admin/Category/category';";
				echo "</script>";
			}
		}
	}
?>