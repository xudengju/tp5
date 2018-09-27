<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Base extends Controller
{
    public function _initialize()
    {
        $this->islogin();
        $this->access();
    }
    public function islogin()
    {
        $u_id=session("u_id");
//        echo $u_id;die;
        if(!$u_id){
            $this->redirect("Register/register","",2,"请先登录");
        }
    }
    public function access()
    {
        $u_id=session("u_id");
        $sql1="select r_id from user_role where u_id = $u_id";
        $sql2="select n_id from role_node where r_id in($sql1)";
//        dump($sql2);
        $sql3="select * from node where n_id in($sql2)";
        $userNode=Db::table('node')->query($sql3);
       session("userNode",$userNode);
    }
    public function upload($name)
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($name);
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if ($info) {

            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            return '/uploads/'.$info->getSaveName();
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
}