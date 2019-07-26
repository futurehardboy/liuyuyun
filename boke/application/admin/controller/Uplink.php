<?php
	namespace app\admin\controller;
	use think\controller;
	use app\admin\model\Link;
	use think\Db;
	class Uplink extends Rule{
		public function index($id=''){
			$req = new Link;
			$result = $req->where('link_id',$id)->where('is_del',0)->find();
			// return dump($result);
			$this->assign('link_content',$result['link_content']);
			$this->assign('link_name',$result['link_name']);
			$this->assign('link_logo',$result['link_logo']);
			$this->assign('link_dsc',$result['link_dsc']);
			$this->assign('link_id',$result['link_id']);
			return $this->fetch('update-flink');
		}
		public function update(){
			$res = input('post.');
			$link = new Link;
			// return dump($res);
			$a = $link->isUpdate(true)->save($res,['link_id'=>$res['link_id']]);
			// $time = array(['link_update_time'=>time()]);
			// array_push($res,$time[0][0]);
			$ary = ['link_update_time'=>time()];
			$b = $link->isUpdate(true)->save($ary,['link_id'=>$res['link_id']]);
			// return dump($ary);
			// // return dump($time[0]);
			if($a && $b){
				echo "<script>";
				echo "alert('修改成功');";
				echo "location.href='/admin/links/flink';";
				echo "</script>";
			}
		}
		public function delete(){
			$req = input('post.');
			Db::table('link')->where('link_id',$req['id'])->update(['is_del'=>1]);
		}
	}
?>