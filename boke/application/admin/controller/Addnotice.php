<?php
	namespace app\admin\controller;
	use think\controller;
	use app\admin\model\Inner;
	class Addnotice extends Rule{
		public function addnotice(){
			return $this->fetch('add-notice');
		}
		public function getnotice(){
			$req = input('post.');
			$notice = new Inner();
			$notice->save([
				'inner_title'=>$req['ititle'],
				'inner_content'=>$req['icontent'],
				'inner_gjz'=>$req['igjz'],
				'inner_dsc'=>$req['idsc'],
				'inner_create_time'=>time()
			]);
			return self::rules(1,'添加成功',[]);

		}
	}
?>