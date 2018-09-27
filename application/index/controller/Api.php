<?php
   namespace app\index\controller;
   use think\Controller;
   use think\Db;
   use app\index\model\Brands;
   /**
    * 
    */
   class Api extends controller
   {
   	//分类的添加
   	function CrateAdd($pid,$name)
   	{
   		$post = [];
   		$post['brand_name']=$name;
   		$post['pid']=$pid;
   		// var_dump($post);
   		$brand = model('Brands');
   		// var_dump($post);
   		$data = Db::table('brand')->insert($post);
   		$id = Db::table('brand')->getLastInsID();
   		if($id){
            $status = 0;
            $msg = 0;
            $result=[];
            $result['status']=$status;
            $result['msg']=$msg;
           echo json_encode($result);
   		}else{
   			$status = 1;
            $msg = 1;
            $result=[];
            $result['status']=$status;
            $result['msg']=$msg;
           echo json_encode($result);
   		}
   	}

   	function Catelist()
   	{
       $brand = model('Brands');
   		$data = Db::table('brand')->select();
   		var_dump($data);
   	}
   }
?>