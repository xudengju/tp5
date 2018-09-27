<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Roles;
use think\Db;
use app\admin\model\Node;
class Role extends Base
{
      public function index()
      {
          $data = Db::table("role")->paginate(3);
          $this->assign("data",$data);
          return $this->fetch();
      }
    public function add()
    {
        $post = input("post.");
//        dump($post);
        $role = new Roles();
        if($post){
            $res = $role->add($post);
            if($res){
                $this->success("添加成功","Role/index");
            }else{
                $this->error("添加失败");
            }
        }
        return $this->fetch();
    }
    public function del()
    {
        $id = input("param.id");
        if($id){
            $role = new Roles();
            $data = $role->del($id);
            if($data){
                $this->success("删除成功","Role/index");
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
            $role= new Roles();
            $data = $role->getOne($id);
            $this->assign("data",$data);
            return $this->fetch();
        }
    }
    public function editdo()
    {
        $post = input("post.");
//        dump($post);
        if($post){
            $role = new Roles();
            $res = $role->edit($post);
                $this->success("修改成功","Role/index");
        }
    }
    //无限极分类
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
    //无限极分类(多维)
    public function CreateSonTree($data,$p_id=0,$level=0){

        $newArray = [];
        if($data){
            foreach($data as $key =>$val){
                if($val['p_id']==$p_id){
                    $val['level'] = $level;
                    $newArray[$key] = $val;
                    $newArray[$key]['son'] = $this->CreateSonTree($data,$val['n_id'],$level+1);
                }
            }
            return $newArray;
        }
    }
    public function addprive()
    {
        $r_id=input("param.id");
        $role = new Roles();
        //获取当前角色信息
        $role_data = $role->get($r_id)->toArray();
//        dump($role_data);die;
//        echo $r_id;
        $node = new Node();
        //读取所有数据
        $data = $node->getNodes();
//        dump($data);
        //无限极分类
        $data = $this->CreateSonTree($data);
//        dump($data);die;
        $this->assign("role_data",$role_data);
        $this->assign("role_id",$r_id);
        $this->assign("data",$data);
       return $this->fetch();
    }
   public function addprive_do()
   {
        $post=input('post.');
//       dump($post);
       if($post['prive']){
           foreach($post['prive'] as $key =>$value){
               $newarray[] = ['r_id'=>$post['r_id'],'n_id'=>$value];

               foreach($value as $k=>$val){
                   $newarray[] = ['r_id'=>$post['r_id'],'n_id'=>$val];
               }
           }
           $result = db('role_node')->insertAll($newarray);
           if($result){
               $this->success("分配权限成功","Role/index");
           }else{
               $this->error("分配权限失败");
           }

       }
   }
}