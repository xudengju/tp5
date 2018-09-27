<?php
    namespace app\index\controller;
    use think\Controller;
    use think\Db;
    use app\index\model\Carts;
    /**
     * 
     */
    class Cart extends Controller
    {
    	public function add()
    	{
    		if ($_FILES) {
    			// 获取表单上传文件 例如上传了001.jpg
   $file = request()->file('goods_logo');
   // 移动到框架应用根目录/public/uploads/ 目录下
   $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
   if($info){
        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
        $goods_logo = "http://localhost/tp5.0" . "/public/uploads/".$info->getSaveName();
        $post = isset($_POST)?$_POST:'';
        $post['goods_logo']=$goods_logo;
        $carts = model('Carts');
        $data = Db::table('goods')->insert($post);
        $id = Db::table('goods')->getLastInsID();
        if ($id) {
        	$this->success("添加成功",url('Cart/show'));
        }else{
        	$this->error("添加失败");
        }
    }else{
        // 上传失败获取错误信息
        echo $file->getError();
    }

    		}
    		  return view();
    	}


    	public function show()
    	{
    		$carts = model('Carts');
    		$data = Db::table('goods')->select();
    		$this->assign('data',$data);
    		return view();
    	}

    	public function xq($id)
    	{
    		// echo $id;die;
            $carts = model('Carts');
            $where = [];
            $where = [
                 'goods_id'=>$id
            ];
    		$data = Db::table('goods')->where($where)->select();
    		$this->assign('data',$data);
    		return view();
    	}
    	public function cart()
    	{  
             $id = isset($_GET['id'])?$_GET['id']:'';
             $where = [];
             $where = [ 
                     'goods_id'=>$id
                  ];
             $good = Db::table('goods')->where($where)->select();
             if($good[0]['goods_num']==0){
                $this->error('亲,内存不足哦,请挑选别的商品吧！',url('Cart/show'));
                 exit;
             }
             $num = $good[0]['goods_num']-1;
             // echo $num;die;
             Db::table('goods')->where($where)->setField('goods_num',$num);
             $post['goods_id']=$id;
             $post['addtime']=date("Y-m-d H:i:s");
             if($id){
                Db::table('cart')->insert($post);
             }
             $where = [];
        $data=Db::table("cart")->alias('c')->join('goods g','c.goods_id = g.goods_id')->select();
           // var_dump($data);
             // $data = Db::table('goods')->join()->where($where)->select();
        $this->assign('data',$data);
    		return view();
    	}

        public function gwc()
        {
            $goods_id = isset($_GET['goods_id'])?$_GET['goods_id']:'';
            session_start();
            $_SESSION['arr'] = $_GET;
            // var_dump($_SESSION['arr']['goods_id']);die;
            if ($_SESSION['arr']) {
                if ($goods_id != $_SESSION['arr']['goods_id']) {
                    # code...
                }
            }
            // var_dump($_SESSION['arr']);
            $this->success('加入购物车成功',url('Cart/cshow'));
        }
    }
?>