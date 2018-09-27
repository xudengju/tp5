<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\User;
class Menu extends Controller
{
    public function imgadd()
    {
         $file = isset($_FILES['file'])?$_FILES['file']:"";
        
         	if (!file_exists("../public/uploads")) {
         	mkdir("../public/uploads");
         }
         $filename = md5(time());
         if(move_uploaded_file($file['tmp_name'],"../public/uploads/".$filename.".jpg")){
            echo "http://"."localhost/tp5.0"."../public/uploads/".$filename.".jpg";
         }    
    }

    public function useradd()
    {
    	$user = isset($_REQUEST['user'])?$_REQUEST['user']:"";
        $result1 = json_decode($user);
		$post['nickname'] =$result1->nickName;
		$post['gender'] = $result1->gender;
		$post['country'] = $result1->country;
		$post['avatarurl'] = $result1->avatarUrl;
        $user = model('User');
		    $result = Db::table("user")->insert($post);
            $id=Db::table("user")->getLastInsID();
       if($id){
         echo $post['nickname'];
       }
    }

    public function menuadd()
    {
    	$menu = isset($_REQUEST['data'])?$_REQUEST['data']:"";
    	$menu1 = json_decode($menu);
    	$post=[];
    	$post['title'] =$menu1->title;
		$post['content'] = $menu1->content;
		$post['logo_url'] = $menu1->logo_url;
		$post['author'] = $menu1->author;
        $user = model('Menus');
		$result = Db::table("menu")->insert($post);
        $id=Db::table("menu")->getLastInsID();
         if($id){
           echo $id;
       }
    }
    public function menulist()
    {
    	$nickname = $_REQUEST['nickname'];
    	$where=[];
    	if($nickname){
           $where['author']=$nickname;
    	}
    	$menu = model('Menus');
    	$data = Db::table("menu")->where($where)->select();
    	echo json_encode($data);
    }
    public function menuComment()
    {
        $comment = $_REQUEST['comment'];
        $post=[];
        $author = "徐sir";
        $time = date("Y-m-d H:i:s");
        $post['comment'] =$comment;
        $post['author'] =$author;
        $post['time'] =$time;
        $comment = model('Comment');
        $result = Db::table('comment')->insert($post);
        $id=Db::table("comment")->getLastInsID();
         if($id){
           echo $id;
       }
    }
    public function commentList()
    {
        $comment = model('Comment');
        $result = Db::table('comment')->select();
        echo json_encode($result);
    }
}



