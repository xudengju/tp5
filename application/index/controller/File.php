<?php
  namespace app\index\controller;
  use think\Controller;
  /**
   * 
   */
  class File extends Controller
  {
  	
   public function files()
  	{
  		   return view();
  	}
  	public function add()
  	{
  		// var_dump($_POST);die;
  	// 获取表单上传文件
    $files = request()->file('img');
    // var_dump($files);die;
    foreach($files as $file){
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            echo $info->getExtension(); 
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getFilename(); 
        }else{
            // 上传失败获取错误信息
           echo $file->getError();
       }    
    }
    return $this->fetch();
  	}
  }
?>