<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/23
 * Time: 9:35
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Users;
use app\index\model\Integral;
 class One extends Controller
 {
     //注册
      public function register()
      {
          $post = input("post.");
          $user = new Users();
          if ($post){
              $id = $user->add($post);
              if ($id){
                  $integral = new Integral();
                  $data['user_id']=$id;
                  $data['integral']=300;
                  $data['addtime']=date("Y-m-d H:i:s");
                  $integral->add($data);
                  echo "<script>alert('success');location.href='login'</script>";
              }else{
                  echo "<script>alert('error');</script>";
              }
          }
          return view();
      }
      //登录
      public function login()
      {
          $mem = new \Memcache();
          $mem->connect('127.0.0.1',11211);
          $post = input("post.");
          if ($post){
              $where = [
                  'user_name'=>$post['user_name'],
                  'user_pwd'=>$post['user_pwd']
              ];
              $name = $mem->get("user_name");
              $pwd = $mem->get("user_pwd");
              if ($name==$post['user_name'] && $pwd==$post['user_pwd']){
                  setcookie("user_name",$name);
                  echo "<script>alert('success1');location.href='show'</script>";exit;
              }
              $data = Db::table("user")->where($where)->find();
              if ($data){
                  $mem->set('user_name',$data['user_name']);
                  $mem->set('user_pwd',$data['user_pwd']);
                  setcookie("user_name",$name);
                  echo "<script>alert('success');location.href='show'</script>";
              }else{
                  echo "<script>alert('error');</script>";
              }
          }

          return view();
      }
      public function show()
      {
           $name = $_COOKIE['user_name'];
           $msg1 = isset($_POST['msg'])?$_POST['msg']:'';
           $dtime = strtotime(date('Y-m-d',time()));
           $time = time();
           $mtime =strtotime(date('Y-m-d',strtotime('+1 day')));
           if($time<=$mtime&&$time>$dtime){
               echo 1;
           }

          return view();
      }
 }