<?php
	namespace app\admin\Controller;
	use think\Controller;
	use app\admin\model\Comment as Cmt;

	class Comment extends Rule{
		public function comment(){
			$comment = Cmt::withAttr('cr_time',function($value,$data){
				return date('Y-m-d H:i:s',$value);
			})->where('is_del',0)->select();
			$this->assign('comment',$comment);			
			return $this->fetch();
		}
	}
?>