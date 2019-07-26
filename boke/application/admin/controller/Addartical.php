<?php
	namespace app\admin\controller;
	use think\controller;
	use app\admin\model\Article;
	use think\Request;
	class Addartical extends Rule{
		public function index(){
			return $this->fetch('add-article');
		}
		public function getArt(){
			// return $this->fetch('add-article');
			$Article = new Article;
			$req = input('post.');
			$pictureUpload = $req['pictureUpload'];
			$file = request()->file('image');
		    $info = $file->move( '../uploads');
		    if($info){
		    	echo $info->getExtension();
		    	echo $info->getSaveName();
		    	echo $info->getFilename(); 
		    }else{// 上传失败获取错误信息 
		    	echo $file->getError(); 
		    }
			// dump($req);
			$Article->save([
					'article_title' => $req['title'],
					'lanmu' => $req['lm'],
					'inner' => $req['content'],
					'guanjianzi' => $req['gjz'],
					'dsc' => $req['dsc'],
					'inner' => $req['content'],
					'visibility'=>$req['visibility'],
					'tag' => $req['tag'],
					'artical_create_time' => time()
				]);
			return self::rules(1,'添加成功',[]);
		}

		//文件上传
		public function unload(){
			header("Content-type: text/html; charset=utf-8");
	        // 获取表单上传文件 例如上传了001.jpg
	        $file =$_FILES['myfile'];
	        $file_name = $file['name'];
	        $type = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
	        $upload_path =Env::get('root_path').'/public/'; //上传文件的存放路径    //
	        //开始移动文件到相应的文件夹
	        if (move_uploaded_file($file['tmp_name'], $upload_path . $file_name)) {
	            return api::success("上传成功");
	        }else{
	            return api::error("上传失败");
	        }
		}
	}
?>