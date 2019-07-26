<?php
	namespace app\admin\controller;
	use think\controller;
	use think\Db;
	use think\Request;
	use app\admin\model\Article;
	class Upart extends Rule{
		public function index($id=''){
			$req = Db::table('article')->where('article_id',$id)->where('is_del',0)->select();
			// return dump($req);
			// $title = $req['article_title'];
			$this->assign('title',$req[0]['article_title']);
			$this->assign('arcomment',$req[0]['inner']);
			$this->assign('agjz',$req[0]['guanjianzi']);
			$this->assign('adsc',$req[0]['dsc']);
			$this->assign('alanmu',$req[0]['lanmu']);
			$this->assign('atag',$req[0]['tag']);
			return $this->fetch('update-article');
		}
		public function updateArt(){
			$req = input('post.');
			$article=new Article;
			$article->isUpdate(true)->save($req,['article_id'=>$req['article_id']]);
			return self::rules(1,'修改成功',[]);
		}
		public function delete(){
			$req  = input('post.');
			Db::table('article')->where('article_id',$req['id'])->update(['is_del'=>1]);
		}
	}
?>