<?php
  namespace app\index\controller;
  use think\Controller;
  use think\Db;
  /**
   * 
   */
  class Weekth extends Controller
  {
  	
  	public function AddAddress()
  	{
  		   $post = isset($_POST)?$_POST:'';
  		   Db::table('address')->insert($post);
  		   $id = Db::table('address')->getLastInsID();
  		   if($id){
               echo "<script>alert('添加成功');location.href='show'</script>";
  		   }else{
  		   	      echo "<script>alert('添加失败');</script>";
  		   }
  		  return view();
  	}
     public function show()
     {
     	  $data = Db::table('address')->select();
     	  $this->assign('data',$data);
     	  return view();
     }
     public function del($id)
     {
     	 $where = [
           'addres_id'=>$id
     	   ];
         $res = Db::table('address')->where($where)->delete();
         if ($res) {
         	echo "<script>alert('删除成功');location.href='show'</script>";
         }else{
         	 echo "<script>alert('删除失败');</script>";
         }

     }
     public function update()
     {
     	 $id = isset($_GET['id'])?$_GET['id']:'';
     	 $where = [
              'addres_id'=>$id
     	  ];
         $data = Db::table('address')->where($where)->find();
         $post = isset($_POST)?$_POST:'';
         // var_dump($post);
         $where1 = [
              'addres_id'=>$post['addres_id']
            ];
         if ($post) {
         	 $res = Db::table('address')->where($where1)->setField(['address'=>$post['address']]);
         	 if ($res) {
         	 	echo "<script>alert('修改成功');location.href='show'</script>";
         	 }
         }
         $this->assign('data',$data);
         return view();
     }
     public function goodsshow()
     {
     	$data = Db::table('goods')->select();
     	$this->assign('data',$data);
     	return view();
     }
     public function brand()
     {
     	$id = isset($_GET['id'])?$_GET['id']:'';
        $post['brand_bh'] = rand(11111,99999).time().$id;
        $post['brand_time'] = date("Y-m-d H:i:s");
        $post['brand_num'] =1;
        $post['goods_id'] = isset($_POST['id'])?$_POST['id']:'';
        $address_id = isset($_POST['addres_id'])?$_POST['addres_id']:'';
        $post['address_id'] = $address_id;
        // var_dump($post);
        if ($post['address_id']) {
        	$where = [
                 'goods_id'=>$post['goods_id']
        	    ];
        	$gds = Db::table('brand')->where($where)->find();
        	if ($gds) {
        		 echo "<script>alert('商品已存在订单中');location.href='brandshow'</script>";exit;
        	}
         Db::table('brand')->insert($post);
        $id = Db::table('brand')->getLastInsID();
        if ($id) {
        	echo "<script>alert('添加订单成功');location.href='brandshow'</script>";
        }else{
        	echo "<script>alert('添加订单失败');</script>";
        }

        }
        
        $res = Db::table('address')->select();
        $this->assign('res',$res);
        $this->assign('id',$id);
        return view();
     }
     public function brandshow()
     {
     	 $data = Db::table('brand b')
     	 ->join('goods g','b.goods_id = g.goods_id')
     	 ->join('address a','b.address_id = a.addres_id')
     	 ->select();
     	 // var_dump($data);die;
     	 $this->assign('data',$data);
     	 return view();
     }
     public function xq($id)
     {

     	  $where = [
              'brand_id'=>$id
     	     ];
            $data = $data = Db::table('brand b')
     	 ->join('goods g','b.goods_id = g.goods_id')
     	 ->join('address a','b.address_id = a.addres_id')
     	 ->where($where)->find();
            $this->assign('data',$data);
            return view();
     }
  }
?>