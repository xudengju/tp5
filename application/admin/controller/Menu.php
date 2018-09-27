<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Node;
class Menu extends Controller
{
    public function index()
    {
        $res=Db::table("node")->paginate(3);
        //使用无限极分类
        $data = $this->CreateTree($res);
        $this->assign("data",$data);
        $this->assign("res",$res);
        return view();
    }
    public function add()
    {
        $post=input("post.");
        $node = new Node();
//        dump($post);
        if($post){

            $id=$node->add($post);
            if($id){
                    $this->success("添加成功",url('Menu/index'));
            }else{
                $this->success("添加失败");
            }
        }

        //读取所有数据
        $data = $node->getNodes();
//        dump($data);
        //无限极分类
       $data = $this->CreateSonTree($data);
        $this->assign('data',$data);
        return view();
    }
    //无极限分类
    public function CreateTree($data,$p_id=0,$level=0){

        static $newarray = [];
        if($data){
            foreach($data as $key =>$value){
               if($value['p_id']==$p_id){
                   $value['level'] = $level;
                   $newarray[] = $value;
                   $this->CreateTree($data,$value['n_id'],$level+1);
               }
            }
            return $newarray;
        }
    }


    public function del($id)
    {

//       echo $id;die;
        $node =new Node();
//        dump($node);die;
        if($id){
            $id=$node->del($id);
            if($id){
                $this->success("删除成功",url('Menu/index'));
            }else{
                $this->success("删除失败");
            }
        }

    }
             public function edit()
             {
                 $id = input("param.id");
//                 echo $id;
                 if($id){
                     $node = new Node();
                    $data = $node->getOne($id);
                     //获取所有数据
                     $menudata = $node->getNodes();
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
        $node = new Node();
        $result = $node->edit($post);
        $this->success("修改成功", url('Menu/index'));
    }

}