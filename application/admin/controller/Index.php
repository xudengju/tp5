<?php
namespace app\admin\controller;
use think\Controller;
header("content-type:text/html;charset=utf-8");
class Index extends Base
{
    public function index()
    {
      return $this->fetch();
    }
    public function main()
    {
        return $this->fetch();
    }
    public function head()
    {
        return $this->fetch();
    }
//    public function user()
//    {
//        return $this->fetch();
//    }
    public function left()
    {
        $userNode=session("userNode");
//        dump($userNode);die;
        $p_arr=array();
         foreach($userNode as $key=>$value)
         {
             if($value['p_id']==0){
                 $p_arr[]=$value;
             }
         }
        foreach($userNode as $k =>$value){
            foreach($p_arr as $k =>$v){
                if($v['n_id'] == $value['p_id']){
                    $p_arr[$k]['child'][]=$value;
                }
            }
        }
//          dump($p_arr);die;
         $this->assign("user",$p_arr);
         return $this->fetch();
    }
}
