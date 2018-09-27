<?php
   namespace app\index\controller;
   use think\Controller;
   use think\Db;
   /**
    * 
    */
   class Login extends Controller
   {
   	
   	public function login()
   	{
   		 
   		 $name = isset($_POST['username'])?$_POST['username']:'';
   		 $pwd = isset($_POST['userpwd'])?$_POST['userpwd']:'';
   		 $where = [];
   		 $where = [
                'username'=>$name,
                'userpwd'=>$pwd
   		      ];
         $data = Db::table('user')->where($where)->select();
        if (!empty($data)) {
        	echo "<script>alert('success');</script>";
        }else{
        	  session_start();
		      if(empty($_SESSION['click_num']))
				{
				$_SESSION['click_num'] = 0;
				}
				else
				{
					 if ($_SESSION['click_num']==3) {   
					 	if (empty($_SESSION['time'])) {
					 		$_SESSION['time'] = time();
					 	}else{
					 		$_SESSION['time1']=$_SESSION['time']+30;
					 		if ($_SESSION['time1']-$_SESSION['time']+30==0) {
		        	      	    unset($_SESSION['click_num']);
		        	      	    unset($_SESSION['time']);
		        	      	    unset($_SESSION['time1']);
		        	      }
					 	}
		        	      echo "<script>alert('抱歉你已三次输入密码错误,将冻结你的账号,三十秒后重试');</script>";
		        	      
	        	     }else{
                       $_SESSION['click_num'] +=1;
        	              $num = 3-$_SESSION['click_num'];
		        	      echo "<script>alert('error,你还剩".$num."');</script>";
	        	     }
				}
				
		 }
    
   		return view();
   	}
   }
?>