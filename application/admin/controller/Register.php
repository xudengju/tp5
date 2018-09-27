<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
class Register extends Controller
{
    public function register()
    {
        return $this->fetch();
    }
    public function toregister()
    {
        $u_name=input('u_name');
//        echo $u_name;
        $u_pwd=input('u_pwd');
        $res=Db::table('user')->where("u_name = '$u_name' and u_pwd = '$u_pwd'")->find();
//        dump($res);die;
        if($res){
            session("u_id",$res['u_id']);
            session("u_name",$res['u_name']);
            $this->success("登录成功",'Index/index');
        }else{
            $this->success("登录失败",'Register/register');
        }
    }
    public function loginout()
    {
           Session::delete('u_id');
        $this->redirect("Register/register");
    }
}
