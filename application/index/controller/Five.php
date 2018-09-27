<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/21
 * Time: 15:55
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
        class Five extends Controller
        {
             public function register()
             {
                 if($_FILES){
                     // 获取表单上传文件 例如上传了001.jpg
                     $file = request()->file('user_image');
                     // 移动到框架应用根目录/public/uploads/ 目录下
                     $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                     if($info){
                         if($_POST)
                         {
                              $post = isset($_POST)?$_POST:'';
                         }
                         $time = date("Ymd");
                         $post['user_image'] = "www.tp5.com/uploads/"."$time/".$info->getFilename();
                         $post['user_status'] = 1;
                         $post['user_integral'] = 20;
                         $post['user_addtime'] = date("Y-m-d H:i:s");
                         $post['user_lasttime'] = date("Y-m-d H:i:s");
                         $where = [
                             'user_name'=>$post['user_name'],
                             'user_email'=>$post['user_email']
                         ];
                         var_dump($post);die;
                         $data = Db::table("user")->where($where)->find();
                        if($data){
                              echo "<script>alert('用户名或邮箱已存在');</script>";
                        }else{
                            Db::table("user")->insert($post);
                            $id = Db::table("user")->getLastInsID();
                            if($id){
                                echo "<script>alert('添加成功');location.href='login'</script>";
                            }
                        }
                     }else{
                         // 上传失败获取错误信息
                         echo $file->getError();
                     }
                 }


                  return view();
             }
        }

