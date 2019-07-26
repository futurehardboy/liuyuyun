<?php
	namespace app\admin\controller;
	use think\controller;
	use app\admin\model\User;
	use think\Db;
	class Manga extends Rule{
		public function index(){
			$user = new User;
			// $req = $user->select();
			$req = $user->alias('u')->where('u.is_del',0)->join('article a',"u.u_id = a.u_id")

				->field('u.u_id,u.pre_time,u.user_name,u.truename,count(a.u_id) as sum')
				->withAttr('pre_time',function($value,$data){
					return date('Y-m-d H:i:s',$value);
				})
				//->where('a.article_title','u.u_id')
				 ->group('a.u_id')

				->select();
			 // return dump($req);
			$this->assign('req',$req);
			return $this->fetch('manage-user');
		}
		public function delete(){
			$req = input('post.');
			Db::table('user')->where('U_id',$req['id'])->update(['is_del'=>1]);
		}
	}
?>