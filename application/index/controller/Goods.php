<?php
  namespace app\index\controller;
  use think\Controller;
  use think\Db;
  /**
   * 
   */
  class Goods extends Controller
  {
  	
  	public function add()
  	{
  		 // 获取表单上传文件 例如上传了001.jpg 
   $file = request()->file('goods_logo');
   // 移动到框架应用根目录/public/uploads/ 目录下
   $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
   if($info){
        $post = isset($_POST)?$_POST:'';
        $goods_logo = "http://localhost/tp5.0/public/uploads/".$info->getSaveName();
         $post['goods_logo'] = $goods_logo;
         Db::table('goods')->insert($post);
         $id =  Db::table('goods')->getLastInsID();
         if($id){
              $this->success('添加成功',url('show'));
         }
    }else{
        // 上传失败获取错误信息
        echo $file->getError();
    }

  		return view();
  	}

  	 public function login()
    {
    	$uname = isset($_POST['uname'])?$_POST['uname']:'';
    	$upwd = isset($_POST['upwd'])?$_POST['upwd']:'';
    	$where = [];
    	$where = [
               'uname'=>$uname,
               'upwd'=>$upwd
    	   ];
    	   $data = Db::table('user')->where($where)->find();
    	   var_dump($data);
    	   if($data){
    	   	    session_start();
    	   	    $_SESSION['uid']=$data['uid'];
               $this->success('登录成功',url('show'));
    	   }
    	return view();
    }
    
    public function show()
    {
    	$data = Db::table('goods')->select();
    	// var_dump($data);
    	$this->assign('data',$data);
    	return view();
    }
    
    public function cart()
    {
        session_start();
        //判断用户是否登录
    	if ($_SESSION) {
    		$id = isset($_GET['goods_id'])?$_GET['goods_id']:'';
    		$where = [];
    		$where = 
    		[
                 'goods_id'=>$id
    		   ];
    		 $data = DB::table('goods')->where($where)->select();
    		 // var_dump($data);die;
    		$post['goods_id']=$id;
    		$post['order_num']=1;
    		$post['order_price']=$data[0]['goods_price'];
    		$where =[];
    		$where = [
                 'goods_id'=>$id
    		   ];
    		$result = Db::table('order')->where($where)->find();
    		//判断表里是否已经有了商品  有了就加1
    		if($result['goods_id']==$id){
    			$num = $result['order_num']+1;
    			$price = $result['order_price']*$num;
    			$where = [];
    			$where = [
                      'goods_id'=>$id
    			     ];
                Db::table('order')->where($where)->setField('order_num',$num);
                Db::table('order')->where($where)->setField('order_price',$price);
                $this->success('加入购物车成功',url('cartshow'));
    		}
    		$data = DB::table('order')->insert($post);
    		$id = DB::table('order')->getLastInsID();
    		//用户登录后同步数据库
    		if ($id) {
    			$this->success('加入购物车成功',url('cartshow'));
    		}
    	}
    	//用户未登录加入cookie
    	$id = isset($_GET['goods_id'])?$_GET['goods_id']:'';
    	$where = [];
    	$where = [
              'goods_id'=>$id
    	  ];
    	$data = DB::table('goods')->where($where)->find();
    	$_COOKIE['goods'][$data['goods_id']]=$data;
    	if($_COOKIE){
            $this->success('加入购物车成功',url('cartshow'));
    	}
    }
    
    public function cartshow()
    {
        if ($_COOKIE) {
        	$data =$_COOKIE;
        }
        $data = DB::table('order')->alias('o')->join('goods g','g.goods_id=o.goods_id')->select();
        // var_dump($data);
        $this->assign('data',$data);
    	return view();
    }
    //单删
    public function del()
    {
    	$order_id = $_GET['order_id'];
    	 $res = Db::table('order')->delete($order_id);
    	 if ($res) {
    	 	$this->success('删除成功',url('cartshow'));
    	 }else{
    	 	$this->error('删除失败');
    	 }
    }

  }
?>