<?php
 namespace app\index\controller;
use think\Controller;
 use think\Db;
 use app\index\model\Newsm;
 use app\index\model\Usera;
 /**
  * 
  */
 class News extends controller
 {
 	
 	public function newadd()
 	{
 		 $data = $_REQUEST['data'];
 		 $result = json_decode($data);
 		 $post= [];
 		 $post['news_title'] = $result->title;
 		 $post['news_content'] = $result->content;
 		 $post['news_logo'] = $result->new_logo;
 		 $post['author'] = $result->author;
 		 $post['news_time'] = date("Y-m-d H:i:s");
 		 $user = model('Newsm');
		 $result = Db::table("news")->insert($post);
         $id=Db::table("news")->getLastInsID();
         echo $id;
 	}
    public function uploadFile()
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
 		 $data = $_REQUEST['data'];
 		 $result = json_decode($data);
 		 $post= [];
 		 $post['nickname'] = $result->nickName;
 		 $post['gender'] = $result->gender;
 		 $post['avatarurl'] = $result->avatarUrl;
 		 $user = model('Usera');
		 $result = Db::table("users")->insert($post);
         $id=Db::table("users")->getLastInsID();
       if($id){
         echo $post['nickname'];
       }
 	}
 	public function newslist()
 	{
        $search = isset($_REQUEST['search'])?$_REQUEST['search']:'';
 		$menu = model('Newsm');
    	$data = Db::table("news")->where('news_title','like',"%".$search."%")->select();
    	echo json_encode($data);
 	}
 	public function content()
 	{
 		$news_id = $_REQUEST['id'];
         $menu = model('Newsm');
    	$data = Db::table("news")->where("news_id = '$news_id'")->find();
    	echo json_encode($data);
 	}

 	public function userinfo()
 	{
 		$nickname = $_REQUEST['user'];
       $menu = model('Usera');
    	$user = Db::table("users")->where("nickname = '$nickname'")->find();
    	echo json_encode($user);
 	}
    
    public function mynews()
 	{
 		$nickname = $_REQUEST['user'];
 		$menu = model('Newsm');
    	$data = Db::table("news")->where("author = '$nickname'")->select();
    	echo json_encode($data);
 	}

 }
?>