<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Types;
class Type extends Controller
{
    public function type()
    {
        $data=Db::table("type")->select();
        //使用无限极分类
        $this->assign("data",$data);
        return view();
    }
    public function add()
    {
        $post=input("post.");
       $type = new Types();
//        dump($post);
        if($post){

            $id=$type->add($post);
            if($id){
                    $this->success("添加成功",url('Type/type'));
            }else{
                $this->success("添加失败");
            }
        }
        return view();
    }
    public function del($id)
    {

//       echo $id;die;
        $type = new Types();
//        dump($node);die;
        if($id){
            $id=$type->del($id);
            if($id){
                $this->success("删除成功",url('Type/type'));
            }else{
                $this->error("删除失败");
            }
        }

    }
    public function edit()
    {
        $id = input("param.id");
//        echo $id;
        if($id){
            $type = new Types();
            $data = $type->getOne($id);
            $this->assign("data",$data);
            return $this->fetch();
        }
    }
    public function editdo()
    {
        $post = input("post.");
//        dump($post);
        if($post){
            $type = new Types();
            $res = $type->edit($post);
            $this->success("修改成功","Type/type");
        }
    }
    public function getAttrbute()
    {
     $type_id = input('post.type_id');
//    echo $type_id;
        if($type_id){
            $data=Db::table('attribute')->where(['type_id'=>$type_id])->select();
//            print_r($data);
            if($data){
                foreach($data as $key=>$val){
                    if($val['attr_values']){
                        $data[$key]['values'] = explode("\r\n",trim($val['attr_values'],"\r\n"));
                    }
                }
            }
            $this->assign('data',$data);
           return $this->fetch('attr/getattr');
        }
       }

}