<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Attrs;
class Attr extends Controller
{
    public function attr()
    {
        $type_id=input('param.id');
        $where = [];
        if($type_id){
            $where['a.type_id'] = $type_id;
        }
        $data=Db::table("attribute")->alias('a')->join('type t','a.type_id = t.type_id')->where($where)->select();
        //使用无限极分类
        $this->assign("data",$data);
        return view();
    }
    public function add()
    {
        $post=input("post.");
       $attr = new Attrs();
//        dump($post);
        if($post){

            $id=$attr->add($post);
            if($id){
                    $this->success("添加成功",url('Attr/attr'));
            }else{
                $this->success("添加失败");
            }
        }
        //查询所有的类型数据
        $type_dadta=Db::table('type')->select();
        $this->assign("type_data",$type_dadta);
        return view();
    }
    public function del($id)
    {

//       echo $id;die;
        $attr = new Attrs();
//        dump($node);die;
        if($id){
            $id=$attr->del($id);
            if($id){
                $this->success("删除成功",url('Attr/attr'));
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
            $attr = new Attrs();
            $data = $attr->getOne($id);
            $this->assign("data",$data);
            return $this->fetch();
        }
    }
    public function editdo()
    {
        $post = input("post.");
//        dump($post);die;
        if($post){
            $attr = new Attrs();
            $res = $attr->edit($post);
            $this->success("修改成功","Attr/attr");
        }
    }
}