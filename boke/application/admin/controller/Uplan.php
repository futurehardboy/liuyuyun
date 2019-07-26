<?php
	namespace app\admin\controller;
	use think\controller;
	use app\admin\model\Lanmu;
	use think\Db;
	class Uplan extends Rule{
		public function index($id=''){
			$req = new Lanmu;
			// return dump($id);
			$lanmu = $req->where('lanmu_id',$id)->where('is_del',0)->select();
			// return dump($lanmu);
			// $req->isUpdate(true)->save($req,['lanmu_id'=>$req['lanmu_id']]);
			$this->assign('lanmu_name',$lanmu[0]['lanmu_name']);
			$this->assign('lanmu_id',$lanmu[0]['lanmu_id']);
			$this->assign('lan_another_name',$lanmu[0]['lan_another_name']);
			$this->assign('lan_father_id',$lanmu[0]['lan_father_id']);
			$this->assign('lan_guanjianzi',$lanmu[0]['lan_guanjianzi']);
			$this->assign('lan_dsc',$lanmu[0]['lan_dsc']);
			// $this->fetch();
			return $this->fetch('update-category');
		}
		public function update(){
			$res = input('post.');
			// return dump($res);
			$lanmu = new lanmu;
			$a=$lanmu->isUpdate(true)->save($res,['lanmu_id'=>$res['lanmu_id']]);
			if ($a){
				echo "<script>";
				echo "alert('修改成功');";
				echo "location.href='/admin/Category/category';";
				echo "</script>";
			}
		}
		public function delete(){
			$req = input('post.');
			Db::table('lanmu')->where('lanmu_id',$req['id'])->update(['is_del'=>1]);
		}
	}
?>