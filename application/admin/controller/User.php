<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class User extends Controller
{
    public function user()
    {
        $keyword =input('param.keyword');
//        echo $keyword;
        $where =array();
        if($keyword){
            $where['us_name'] = ['like',"%$keyword%"];
        }
        $data=Db::table("admin_user")->where($where)->paginate(3,false,['query'=>request()->param()]);
//        dump($data);die;
//        echo Db::table("admin_user")->getLastSql();
        $this->assign("data",$data);
        $this->assign("keyword",$keyword);
          return $this->fetch();
    }
    public function useradd()
    {
        $post=input("post.");
//        dump($post);
        if(request()->isPost() && !empty($post)){
//            unset($post['u_repwd']);
            if($post['us_pwd']!==$post['us_repwd'])
            {
                $this->error('两次密码不一致');
            }
            $roles=$post['r_name'];
            unset($post['us_repwd']);
            unset($post['r_name']);
//            dump($post);die;
            $result = Db::table("admin_user")->insert($post);
            $id=Db::table("admin_user")->getLastInsID();
//            echo $id;
//            dump($result);
            if($id){
                if( $roles){
                    foreach( $roles as $vv){
                        $role_user[] = ['u_id'=>$id,'r_id'=>$vv];
                    }
                 $re =   Db::table("user_role")->insertAll($role_user);
//                    dump($re);die;
                }
                $this->success('成功',url('User/user'));

            }else{
                $this->error('失败');
            }
        }
        //读取角色数据
        $roledata=Db::table("role")->select();
        $this->assign("roledata",$roledata);
        return $this->fetch();
    }
    public function del()
    {
        $id = input('post.id');
        if($id){
            $result = db('admin_user')->delete($id);
            echo $result;
        }
    }
   public function edit()
   {
       if(request()->isPost()){
           $post=input('post.');
           unset($post['u_repwd']);
           $res=Db::table("admin_user")->update($post);
           if($res){
               $this->success('修改成功',"User/user");
           }else{
               $this->error('失败');
           }
       }
       $id=input('param.id');
//        echo $id;
       $data=Db::table('admin_user')->find($id);
       $this->assign("data",$data);
       return $this->fetch();
   }
}
