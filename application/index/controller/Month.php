<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/25
 * Time: 8:55
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
class Month extends Controller
{
    public function register()
    {
         $post = isset($_POST)?$_POST:'';
         $where = [
             'user_name'=>isset($post['user_name'])?$post['user_name']:''
         ];
        $where1 = [
            'email'=>isset($post['email'])?$post['email']:''
        ];
        $res = Db::table("user")->where($where)->find();
        $res1 = Db::table("user")->where($where1)->find();
        if($res!=null){
             echo "<script>alert('用户名已存在');location.href='register'</script>";
        }
        if($res1!=null){
            echo "<script>alert('邮箱已存在');location.href='register'</script>";exit;
        }
        Db::table("user")->insert($post);
        $id = Db::table("user")->getLastInsID();
        if ($id){
            echo "<script>alert('success');location.href='login'</script>";
        }
         return view();
    }
    public function login()
    {
        $post = isset($_POST)?$_POST:'';
        if($post){
            $where = [
                'user_name'=>isset($post['user_name'])?$post['user_name']:'',
                'user_pwd'=>isset($post['user_pwd'])?$post['user_pwd']:''
            ];
            $result = Db::table("user")->where($where)->find();
            if ($result){
                setcookie('user_name',$post['user_name']);
                echo "<script>alert('success');location.href='show'</script>";
            }else{
                echo "<script>alert('用户名或密码错误');location.href='login'</script>";
            }
        }
          return view();
    }
    public function show()
    {
        $goods_type = isset($_GET['goods_type'])?$_GET['goods_type']:'';
        $data = Db::table("goods")->paginate(3);
        if($goods_type){
            $where = [
                'goods_type'=>$goods_type
            ];
            $data = Db::table("goods")->where($where)->paginate(3);
        }

        $user = isset($_COOKIE['user_name'])?$_COOKIE['user_name']:'';
        $page = $data->render();
        $this->assign('data',$data);
        $this->assign('user',$user);
        $this->assign('page',$page);
        return view();
    }
    public function cart()
    {
        $goods_id = isset($_GET['goods_id'])?$_GET['goods_id']:'';
        $user = isset($_COOKIE['user_name'])?$_COOKIE['user_name']:'';
        if($goods_id&&$user){
            $where = [
                'user_name'=>$user
            ];
             $res = Db::table("user")->where($where)->find();
             $post['goods_id'] = $goods_id;
             $post['user_id'] = $res['user_id'];
             setcookie('user_id',$res['user_id']);
             $where = [
                 'goods_id'=>$goods_id
             ];
             $goods = Db::table("cart")->where($where)->find();
             if($goods){
                 echo "<script>alert('商品已存在');location.href='cartshow'</script>";exit;
             }
             $post['buy_num'] = 1;
             Db::table("cart")->insert($post);
             $id = Db::table("cart")->getLastInsID();
             if($id){
                 echo "<script>alert('加入购物车成功');location.href='cartshow'</script>";
             }
        }else{
            setcookie("goods_id",$goods_id);
            echo "<script>alert('加入成功');location.href='cartshow'</script>";
        }
    }
    public function cartshow()
    {
        $user = isset($_COOKIE['user_name'])?$_COOKIE['user_name']:'';
        $goods_id = isset($_COOKIE['goods_id'])?$_COOKIE['goods_id']:'';
        $goods_static = isset($_GET['goods_static'])?$_GET['goods_static']:'';
        if($user==''){
            $where = [
                 'goods_id'=>$goods_id
            ];
             $data = Db::table("goods")->where($where)->select();
             $data[0]['cart_id'] = 1;
             $data[0]['buy_num'] = 1;
//             var_dump($data);die;
             $this->assign('data',$data);
        }else{
            $user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:'';

            $where = [
                'user_id'=>$user_id
            ];
            if ($goods_static){
                $where=[
                    'user_id'=>$user_id,
                    'goods_static'=>$goods_static
                ];
            }
            $data = Db::table("cart")->join('goods',"goods.goods_id=cart.goods_id")->where($where)->select();
//            var_dump($data);
            $this->assign('data',$data);
        }
        return view();
    }

    public function buy(){
        $user = isset($_COOKIE['user_name'])?$_COOKIE['user_name']:'';
        $cart_id = isset($_GET['cart_id'])?$_GET['cart_id']:'';
        if($user){
            $where = [
                'cart_id'=>$cart_id
            ];

           $cart = Db::table("cart")->where($where)->find();
            $where1 = [
                'goods_id'=>$cart['goods_id']
            ];
           $goods = Db::table("goods")->where($where1)->find();
            $goods_id = $cart['goods_id'];
            $goods_price = $goods['goods_price'];
            $buy_num = $cart['buy_num'];
            $num = $goods_price*$buy_num;
            $where1 = [
                'goods_id'=>$goods_id
            ];
            if($num){
                 Db::table("goods")->where($where1)->update(['goods_status'=>1]);
                 echo "<script>alert('购买成功,花费'+$num+'元');location.href='show'</script>";
            }
        }else{
            echo "<script>alert('请先登录');location.href='login'</script>";
        }
    }
}