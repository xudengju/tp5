<?php
  namespace app\admin\controller;
  use think\Controller;
  use think\Db;
  /**
   * 
   */
  class Student extends Controller
  {
  	
  	public function AddAdmin()
  	{
  		$post = isset($_POST)?$_POST:'';
        if ($post) {
        	Db::table('admin')->insert($post);
        	$id = Db::table('admin')->getLastInsID();
        	if ($id) {
        		echo "<script>alert('success');location.href='login'</script>";
        	}
        }
  		return view();
  	}
  	public function login()
  	{
  		 $name = isset($_POST['user'])?$_POST['user']:'';
  		 $pwd = isset($_POST['pwd'])?$_POST['pwd']:'';
  		 if ($name) {
  		 	   $admin_where = [
                     'admin_zh'=>$name,
                     'admin_pwd'=>$pwd
  		 	      ];
  		 	      $tea_where = [
                     'tea_name'=>$name,
                     'tea_pwd' =>$pwd
  		 	      ]; 	   
  		 	   $admin = Db::table('admin')->where($admin_where)->find();
  		 	   $teacher = Db::table('teacher')->where($tea_where)->find();
  		 	   if($admin){
  		 	   	//1为表示用户为管理员
  		 	   	    setcookie('user',1);
                   echo "<script>alert('管理员登录成功');location.href='show'</script>";
  		 	   }elseif ($teacher) {
  		 	   	//2为表示用户为老师
  		 	   	   setcookie('user',2);
  		 	   	   setcookie('tea_id',$teacher['teacher_id']);
  		 	   	   echo "<script>alert('老师登录成功');location.href='show'</script>";
  		 	   }else{
  		 	   	   echo "<script>alert('用户名或密码错误');</script>";
  		 	   }
  		 }
  		return view();
  	}

  	public function show()
  	{
  		 $msg = $_COOKIE['user'];
  		 if ($msg == 1) {
  		 	  $teacher = Db::table('teacher')->select();
  		 	  $tea = serialize($teacher);
  		 	  $this->redirect('Student/teacher',['teacher'=>$tea]);
  		 }elseif($msg==2){
  		 	  $where = [
                  'teacher_id'=>$_COOKIE['tea_id'],
                  'student_status'=>1
  		 	   ];
  		 	   $student = Db::table('student')->where($where)->select();
  		 	   $stu = serialize($student);
  		 	   $this->redirect('Student/student',['student'=>$stu]);
  		 }
  	}

  	public function teacher($teacher){
  		 $data = unserialize($teacher);
       // var_dump($data);
       $this->assign('data',$data);
       return view();
  	}

  	public function student($student)
  	{
  		$data = unserialize($student);
      // var_dump($data);
      $this->assign('data',$data);
       return view();
  	}

  	public function cq()
    {
         $msg = isset($_GET['msg'])?$_GET['msg']:'';
         $data = Db::table('student')->select();
        if ($msg==1){
              $num = array_rand($data,1);
              $where = [
                  'student_id'=>$num
              ];
              $data = Db::table("student")->where($where)->select();
//              var_dump($data);die;
            if ($data){
                 Db::table('student')->where($where)->update(['tw_num'=>$data[0]['tw_num']+1]);
            }
               $this->assign('data',$data);
               return view();
        }elseif ($msg==2){
            $num = array_rand($data,2);
            if (!in_array("0", $num)) {
//            var_dump($num);die;
                $num = implode($num, ',');

                $data = Db::table("student")->where('student_id', "in", $num)->select();
//            echo Db::table("student")->getLastSql();die;
//              var_dump($data);die;
                if ($data) {
                    Db::table('student')->where('student_id', "in", $num)->update(['tw_num' => $data[0]['tw_num'] + 1]);
                }
                $this->assign('data', $data);
            }
            return view();
        }elseif($msg==3) {
            $num = array_rand($data, 3);
            if (!in_array("0", $num)) {
                $num = implode($num, ',');
                $data = Db::table("student")->where('student_id', "in", $num)->select();
//              var_dump($data);die;
                if ($data) {
                    Db::table('student')->where('student_id', "in", $num)->update(['tw_num' => $data[0]['tw_num'] + 1]);
                }
                $this->assign('data', $data);
            }
            return view();
        }
          return view();
    }

  }
?>