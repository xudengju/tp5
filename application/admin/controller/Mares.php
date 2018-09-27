<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Mare;

class Mares extends Controller
{
    public function show()
    {

        $data = Db::table("mares")->alias('m')->join('classify c','mares.c_id = classify.classify_id')->select();
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
        $mare = new Mare();
//        dump($post);
    //上传文件
    if($_FILES['mare_file']['error']===0){
        $post['mare_file']= $this->upload('mare_file');
    }
//        dump($mare_file);die;
    if ($post) {
        $id = $mare->add($post);
        if ($id) {
            $this->success("添加成功", url('Mares/show'));
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
        $mare = new Mare();
//        dump($node);die;
        if($id){
            $id=$mare->del($id);
            if($id){
                $this->success("删除成功",url('Mares/show'));
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
            $mare = new Mare();
            $data = Db::table("mares")->alias('m')->join('classify c','mares.c_id = classify.classify_id')->where("mare_id = $id")->select();
//            $data2=Db::table("classify")->select();
//            echo $data[0]['mare_id'];
//            dump($data2);die;
            $this->assign("data",$data);
//            $this->assign("data2",$data2);
            return  $this->fetch();
        }


    }
    public function editdo()
    {
        $post['mare_id'] = input("post.mare_id");
        $post['mare_name'] = input("post.mare_name");
        $post['c_id'] = input("post.c_id");
//        dump($post);die;
        $mare = new Mare();
        $result = $mare->edit($post);
        $this->success("修改成功", url('Mares/show'));
    }
}