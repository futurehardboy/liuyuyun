<?php
	namespace app\admin\controller;
	use think\controller;

	class Readd extends Rule{
		public function readset(){
			return $this->fetch();
		}
	}
?>