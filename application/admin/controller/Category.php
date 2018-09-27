<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Categorys;
class Category extends Controller
{
    public function category()
    {
        $res=Db::table("category")->paginate(3);
        //使用无限极分类
        $data = $this->CreateTree($res);
        $this->assign("data",$data);
        $this->assign("res",$res);
        return view();
    }
    public function add()
    {
        $post=input("post.");
       $cate = new Categorys();
//        dump($post);
        if($post){

            $id=$cate->add($post);
            if($id){
                    $this->success("添加成功",url('Category/category'));
            }else{
                $this->success("添加失败");
            }
        }

        //读取所有数据
        $data = $cate->getCate();
//        dump($data);
        //无限极分类
       $data = $this->CreateTree($data);
        $this->assign('data',$data);
        return view();
    }
    //无极限分类
    public function CreateTree($data,$parent_id=0,$level=0){

        static $newarray = [];
        if($data){
            foreach($data as $key =>$value){
               if($value['parent_id']==$parent_id){
                   $value['level'] = $level;
                   $newarray[] = $value;
                   $this->CreateTree($data,$value['cate_id'],$level+1);
               }
            }
            return $newarray;
        }
    }


    public function del($id)
    {

//       echo $id;die;
        $cate = new Categorys();
//        dump($node);die;
        if($id){
            $id=$cate->del($id);
            if($id){
                $this->success("删除成功",url('Category/category'));
            }else{
                $this->error("删除失败");
            }
        }

    }
             public function edit()
             {
                 $id = input("param.id");
//                 echo $id;
                 if($id){
                     $cate = new Categorys();
                    $data = $cate->getOne($id);
                     //获取所有数据
                     $menudata = $cate->getCate();
                    //获取无限极分类
                     $menudata= $this->CreateTree($menudata);
//                     dump($data);
                     $this->assign("data",$data);
                     $this->assign("menudata",$menudata);
                   return  $this->fetch();
                 }


             }
    public function editdo()
    {
        $post = input("post.");
//        dump($post);
        $cate = new Categorys();
        $result = $cate->edit($post);
        $this->success("修改成功", url('Category/category'));
    }

}