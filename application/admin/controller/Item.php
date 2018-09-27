<?php
  namespace app\admin\controller;
  use think\Controller;
  use think\Db;
  /**
   *    item1项目开发
   */
  class Item extends Controller
  {
  	
  /*注册功能开发
     @param user_name 用户名  user_pwd 用户密码
  */
  	public function register()
  	{
  		//接收从客户端传来的数据
  		$post['user_name'] = isset($_POST['user_name'])?$_POST['user_name']:'';
         $pwd = isset($_POST['user_pwd'])?$_POST['user_pwd']:'';
  		$post['user_pwd'] = md5($pwd);
  		//判断值是否存在
  		if ($post['user_name']) {
  			$where = [];
  			$where = [
                       'user_name'=>$post['user_name']
  			   ];
  			 $data = Db::table('user')->where($where)->find();
  			 // var_dump($data['user_name']);die;
  			 //判断用户名是否存在
  			 if ($data['user_name']==$post['user_name']) {
  			 	  echo "<script>alert('亲,用户名已经存在了');location.href='register'</script>";exit;
  			 }
  		}
  		//判断用户名和密码不为空
  		if ($post['user_name']!=''&&$post['user_pwd']!='') {
  			Db::table('user')->insert($post);
  		$id = Db::table('user')->getLastInsID();
  		//判断用户名和密码是否添加成功
  		if ($id) {
  			$where = [];
  			$where = [
                       'user_name'=>$post['user_name']
  			   ];
  			 $user = Db::table('user')->where($where)->find();
              $user_id = $user['user_id'];
              $integral['user_id'] = $user_id;
              $integral['integral_num'] = 300;
              Db::table('integral')->insert($integral);
              $ids = Db::table('integral')->getLastInsID();
              //判断积分是否添加成功
              if ($ids) {
                echo "<script>alert('恭喜您注册成功，获得300积分');location.href='login'</script>";
              }else{
              	  echo "<script>alert('注册失败');location.href='register'</script>";
              }
  		   }
  		}
  		
  		return view();
  	}

    //登录
  	public function login()
  	{
            //接收页面传来的值
  		    $user_name = isset($_POST['user_name'])?$_POST['user_name']:'';
  			$user_pwd = isset($_POST['user_pwd'])?$_POST['user_pwd']:'';
  			$pwd = md5($user_pwd);
  			//判断将memcache中的值 取出来赋值 
  		    $mem = new \Memcache();
  		    $mem->connect('127.0.0.1',11211);
  		    $username = $mem->get('user_name');
  		    $userpwd = $mem->get('user_pwd');
  		    $userid = $mem->get('user_id');
  		    // echo $username;
  		    if ($user_name) {
  		    	//判断memcache中是否有值  有值就判断是否相等  相等就登陆成功
  		    	 if ($username==$user_name&&$userpwd==$user_pwd) {
  		    	 	setcookie('user_id',$userid);
  		    	 	setcookie('user_name',$username);
  		    	 	// echo $_COOKIE['user_id'];
  		    	 	 echo "<script>alert('登录成功!');location.href='show'</script>"; exit;
  		    	 }
  		    }
  			// echo $pwd;
  			$where = [];
  			$where = [
                    'user_name'=>$user_name
  			     ];
  			$data = Db::table('user')->where($where)->find();
  			// var_dump($data['user_pwd']);
  			//第一次登陆的时候添加到库里
  			if ($data['user_pwd']==$pwd) {
                   $mem->set('user_name',$user_name);
                   $mem->set('user_pwd',$user_pwd);
                   $mem->set('user_id',$data['user_id']);
                   setcookie('user_id',$data['user_id']);
                   setcookie('user_name',$data['user_name']);
  				  echo "<script>alert('登录成功');location.href='show'</script>";
  			}
  		return view();
  	}




     //展示页面
  	public function show()
  	{
  		$where = [];
  		$where = [
            'user_id'=>$_COOKIE['user_id']
  		 ];
  		$data = Db::table('integral')->where($where)->find();
// ;        var_dump($data);
  		$result = Db::table('goods')->select();
  		// var_dump($result);
  		$this->assign('data',$data);
  		$this->assign('result',$result);
  		return view();
  	}


    //通过ajax实现签到功能
  	public function qd()
  	{
  		$where = [];
  		$where = [
            'user_id'=>$_COOKIE['user_id']
  		 ];
  		$mg = $_POST['mg'];
  		if ($mg==0) {
  			$name =$_COOKIE['user_id'];
  			$data = Db::table('integral')->where($where)->find();
  			// echo $data['day_num'];
  			if(is_int($data['day_num']/7)&&$data['day_num']!=0){
               $num = $data['integral_num']+20;
  			}else{
  				$num = $data['integral_num']+1;
  			}
  			$daynum = $data['day_num']+1;
  			Db::table('integral')->where($where)->update(['integral_num' => $num,'day_num'=>$daynum]);
  			echo "签到成功";
  		}
  	}
   
   //购买
   public function shop()
   {
   	       $goods_id = $_GET['id'];
   	       $data = Db::table('goods')->where('goods_id'=='$goods_id')->find();
   	       $post['goods_id']=$goods_id;
   	       $post['order_num']=1;
   	       $post['user_id'] = $_COOKIE['user_id'];
   	       Db::table('order')->insert($post);
   	       $this->assign('data',$data);
   	       return view();

   }
   
   //付款
   public function pay()
   {
   	   $order_num = $_POST['order_num'];
   	   $goods_id = $_POST['goods_id'];
   	   $user_id = $_COOKIE['user_id'];
   	   $arr = Db::table('goods')->where('goods_id'=='$goods_id')->find();
   	   if ($order_num!=1) {
   	   	   Db::table('order')->update('order_num',$order_num);   	 
   	    }
   	    $money = $arr['goods_price']*$order_num;
   	    $integral = $money;
   	    $res = Db::table('integral')->where('user_id'=='$user_id')->find();
   	    $inte = $res['integral_num']+$integral;
   	    // echo $user_id;die;
   	    $where = [
             'user_id'=>$user_id
   	     ];
   	    Db::table('integral')->where($where)->update(['integral_num'=>$inte]);
   	    $post['integrallog_num']=$integral;
   	    $post['user_id']=$user_id;
   	    $post['goods_id']=$goods_id;
   	    Db::table('integrallog')->insert($post);
   	    $id = Db::table('integrallog')->getLastInsID();
   	    if ($id) {
   	    	echo "<script>alert('付款成功');location.href='buygoods'</script>";
   	    }
   	    
   }
  
  //已购买的商品
   public function buygoods()
   {
   	   $data =Db::table('integrallog')->alias('i')
   	   ->join('goods g','i.goods_id = g.goods_id')
   	   ->join('order o','i.user_id = o.user_id')
   	   ->select();

   	   // var_dump($data);
   	   $this->assign('data',$data);
   	   return view();
   }
    

   //评论
   public function pl()
   {
   	   $goods_id = isset($_GET['id'])?$_GET['id']:"";
   	   $arr=isset($_POST)?$_POST:'';
       $user_id = $_COOKIE['user_id'];
   	   $res = Db::table('comment')->where('user_id'=='$user_id')->find();
   	    // var_dump($res['goods_id']);die;  
          if($arr)
          {
       	    $arr['user_id'] = $_COOKIE['user_id'];

            DB::table('comment')->insert($arr);
            $id = Db::table('comment')->getLastInsID();
           if($id){
              $int = DB::table('integral')->where('user_id'=='$user_id')->find();
              $num = $int['integral_num']+20;
              $where = [
             'user_id'=>$user_id
   	          ];
              Db::table('integral')->where($where)->update(['integral_num'=>$num]);
              echo "<script>alert('评论成功');location.href='show'</script>";
           }
       }
       $this->assign('id',$goods_id);
       return view();
   }
  }
?>