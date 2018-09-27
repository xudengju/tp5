<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        //获取商品分类数据
        $data = db('category')->select();
        $data = CreateSonTree($data,0,0,'cate_id');
//        print_r($data);
        //热销商品
        $hot_data = db('goods')->where(['is_hot'=>1])->limit(12)->select();
//        dump($hot_data);
        $this->assign('data',$data);
        $this->assign('hot_data',$hot_data);
       return $this->fetch();
    }

}
