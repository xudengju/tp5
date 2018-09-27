<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
/**
 * 商品模块CURD
 */
class Goods extends Base
{
    public function index() {
        
        $keyword = input('param.keyword');
      //  echo $keyword;
        $where = [];
        if( $keyword ){
            $where['goods_name'] = ['like',"%$keyword%"];
        }
        //dump(request()->param());
        $data = Db::name('goods')->where($where)->paginate(config('pagesize'),false,['query'=>request()->param()]);
        
        $this->assign('data', $data);
        return view();
    }
    
    public function add() {
        $cate_data = Db::table('category')->select();
        $cate_data=CreateTree($cate_data,0,0,'cate_id');
        //商品品牌数据
        $brand_data = Db::table("brand")->select();
        //获取所有商品类型数据
        $type_data = Db::table("type")->select();
        $this->assign('cate_data', $cate_data);
        $this->assign('brand_data', $brand_data);
        $this->assign('type_data', $type_data);
        return view();
    }
    public function add_do()
    {

        $post =input('post.');
//        dump($post);die;
//        dump($post);
        //商品货号
        if(!$post['goods_sn']){
              $post['goods_sn'] = $this->createGoodsSn();
        }
//        dump($post);
        //上传商品图片
        $post['goods_img']=$post['goods_img_url'];
        if($_FILES['goods_img']['error']===0){
            $post['goods_img'] = $this->upload('goods_img');
        }

        //商品缩略图
//        dump($_FILES);die;
        $post['goods_thumb']=$post['goods_thumb_url'];
        if($_FILES['goods_thumb']['error']===0){
            $post['goods_thumb'] = $this->upload('goods_thumb');
        }
        //自动生成
        if(isset($post['auto_thumb'])){
           $img_path= ROOT_PATH.'public'.$post['goods_img'];
            $image = \think\Image::open($img_path);
            $len = strripos($img_path,'.');
            $post['goods_thumb'] = substr($img_path,0,$len).'_thumb'.substr($img_path,$len);
          // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
          $image->thumb(150, 150)->save($post['goods_thumb']);
        }
//        dump($post);die;
        //详细描述
        $post['goods_desc']=isset($post['editorValue'])?$post['editorValue']:'';
        //商品表添加
        $data = $this->checkfiled($post,'goods');
        $goods_id = Db::table('goods')->insertGetId($data);
//        echo $goods_id;
        //商品属性表添加
        $this->addgoodsAttr($goods_id,$post['attr_value_list'],$post['attr_price_list']);
        //商品相册入库
        $this->addGoodsPhoto($goods_id,'img_url',$post['goods_img_desc'],$post['goods_link']);

        if($goods_id){
            $this->redirect('Goods/index');
        }
    }
    //商品相册
    public function addGoodsPhoto($goods_id,$filenames,$desc,$link){
         if($filenames){
             $img_data = $this->moreupload($filenames);
             //正常图片上传
             if($img_data){
                 foreach($desc as $key =>$value){
                     $data[] = [
                         'goods_id'=>$goods_id,
                         'p_url'=>isset($img_data[$key])?$img_data[$key]:$link[$key],
                         'p_desc'=>$value,
                     ];
                 }
             }
          Db::table('goods_photo')->insertAll($data);
         }
    }
    public function moreupload($imgname){
         // 获取表单上传文件
  $files = request()->file($imgname);
        $i=0;
    foreach($files as $file){
                   // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
       if($info){
                     // 成功上传后 获取上传信息
           $imgurl[$i]= 'public'.DS.'uploads'.$info->getSavename();
       }else{
                          // 上传失败获取错误信息
            echo $file->getError();
        }
        $i++;
   }
        return $imgurl;
}

    //商品属性表添加
    public function addgoodsAttr($goods_id,$attr_data,$price_data){
        if($attr_data){
            foreach($attr_data as $key =>$value){
               //规格
                if(is_array($value) && $value){
                    foreach($value as $k =>$val){
                        $data[] = [
                            'goods_id'=>$goods_id,
                            'attr_id'=>$key,
                            'attr_value'=>$val,
                            'price'=>$price_data[$key][$k],
                        ];
                    }
                }else{
                    //普通属性
                    $data = [
                        'goods_id'=>$goods_id,
                        'attr_id'=>$key,
                        'attr_value'=>$value,
                        'price'=>'',
                    ];
                }
            }
            dump($data);
            Db::table('goods_attr')->insertAll($data);
        }
    }
    //字段过滤
    public function checkfiled($data,$table_name)
    {
        if($data){
           //查询表内所有数据
            $sql="DESC $table_name";
            $fields = Db::query($sql);
            $fields = array_column($fields,'Field');
            foreach($data as $key=>$val){
                if(!in_array($key,$fields)){
                    unset($data[$key]);
                }
            }
            return $data;
        }
    }
    //生成唯一货号
    public function createGoodsSn()
    {
        return 'aini'.date('YmdHis').rand(1000,9999);
    }
    public function sku(){
        $goods_id = input('param.id');
        $data = Db::table('goods')->field('goods_id,goods_name,goods_sn')->where(['goods_id'=>$goods_id])->find();
//        dump($data);
        //商品属性表和属性表联查获取规格数据
        $sql = "select * from goods_attr as g INNER JOIN attribute as a ON g.attr_id=a.attr_id WHERE goods_id =$goods_id and a.attr_type=2";
        $attr_data = Db::query($sql);
        if($attr_data){
            foreach($attr_data as $key =>$value){
                $attr_data['name'][$value['attr_id']]=$value['attr_name'];
                $attr_data['vals'][$value['attr_id']][]=$value['attr_value'];
            }
        }else{
            $this->error('此商品没有货品');
        }
        $this->assign('data',$data);
        $this->assign('attr_data',$attr_data);
        return $this->fetch();
    }
    //sku入库
    public function sku_do()
    {
        $post = input('post.');
        if($post){
            $newarr = [];
            foreach($post['attr'] as $key=>$val){
                foreach($val as $k=>$v){
                    $newarr[$k][]=$v;
                }
            }
            foreach($newarr as $val){
                $val =implode(',',$val);
                $data = [
                    'goods_id'=>$post['goods_id'],
                    'attr_values'=>$val,
                'pro_sn'=>empty($post['product_sn'][$k])?CreateProductSn():$post['product_sn'][$k],
                'skunumber'=>$post['product_number'][$k],
            ];
            }
        $result=  Db::table('product')->insertAll($data);
            if($result){
                $this->success('货品添加成功',url('Goods/index'));
            }
        }
    }
    public function CreateProductSn()
    {
        return 'ainiGPS'.date('YmdHis').rand(1000,9999);
    }
}
