<?php
namespace app\admin\model;
use think\Model;

class Node extends Model
{
    protected $table = 'node';
    protected $pk = 'n_id';
    public function add($data)
    {
        if($data && is_array($data))
        {
//              $result = self::save($data);
            $this->allowField(true)->save($data);
            return $this->n_id;
//            dump($result);
        }else{
            return false;
        }
    }
     //查询到所有数据
    public function getNodes()
    {
        $list = $this->all();
        $data = [];
//        dump($list);die;
        foreach($list as $key=>$user)
        {
           $data[] = $user->getData();
        }
        return $data;
    }
    //删除
    public function del($id)
    {
        if($id){

           $res = $this->destroy($id);
//            dump($res);die;
            return $res;
        }else{
            return false;
        }

    }

    public function getOne($id)
    {
       return   $this->get($id)->getData();
    }
    public function edit($data)
    {
        if($data){
          return  $this->save($data,[$this->pk=>$data[$this->pk]]);
        }

    }
}