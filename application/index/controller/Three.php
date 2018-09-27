<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/24
 * Time: 10:07
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
class Three extends Controller
{
    public function login()
    {
        $where = [
            'user_name'=>isset($_POST['user_name'])?$_POST['user_name']:'',
            'user_pwd'=>isset($_POST['user_pwd'])?$_POST['user_pwd']:''
        ];
        $data = Db::table("user")->where($where)->find();
        if ($data){
            echo "<script>alert('登录成功');location.href='show'</script>>";
        }
        return view();
    }
}