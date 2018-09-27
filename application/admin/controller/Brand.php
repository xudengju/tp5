<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Com;

class Brand extends Controller
{

    public function brand()
    {

        $data = Db::table("brand")->select();
//        echo Db::table("classify")->getLastSql();
//        dump($data);
        $this->assign("data", $data);
        return $this->fetch();
    }

    public function add()
    {
            return $this->fetch();
    }
    public function doadd()
    {
        $post = input("post.");
        $brand=new Com("brand",'brand_id');
//        dump($post);
    //上传文件
    if($_FILES['brand_logo']['error']===0){
        $post['brand_logo']= $this->upload('brand_logo');
    }
//        dump($mare_file);die;
    if ($post) {
        $id = $brand->add($post);
        if ($id) {
            $this->success("添加成功", url('Brand/brand'));
        } else {
            $this->success("添加失败");
        }
    }
    }
    public function upload($name)
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($name);
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if ($info) {

            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            return '/uploads/'.$info->getSaveName();
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
    public function del($id)
    {

//       echo $id;die;
        $brand=new Com("brand",'brand_id');
//        dump($node);die;
        if($id){
            $id=$brand->del($id);
            if($id){
                $this->success("删除成功",url('Brand/brand'));
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
            $brand=new Com("brand",'brand_id');
            $data = $brand->getOne($id);
            //获取所有数据
            $menudata = $brand->getBrands();
//                     dump($data);
            $this->assign("data",$data);
            return  $this->fetch();
        }


    }
    public function editdo()
    {
        $post = input("post.");
//        dump($post);
        $brand=new Com("brand",'brand_id');
        $result = $brand->edit($post);
        $this->success("修改成功", url('Brand/brand'));
    }
}