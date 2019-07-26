<?php
	namespace app\admin\controller;
	use think\controller;

	class Setting extends Rule{
		public function setting(){
			return $this->fetch();
		}
	}
?>