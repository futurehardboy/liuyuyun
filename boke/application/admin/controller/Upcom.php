<?php
	namespace app\admin\controller;
	use think\Controller;
	use app\admin\model\Comment;
	class Upcom extends Rule{
		public function delete(){
			$req = input('post.');
			$comment = new Comment;
			$comment->save(['is_del'=>1],['comment_id'=>$req['id']]);
		}
	}
?>