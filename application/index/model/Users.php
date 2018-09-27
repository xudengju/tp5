<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/23
 * Time: 9:46
 */
namespace app\index\model;
use think\Model;
class Users extends Model
{
    protected $table= 'user';
    protected $pk= 'user_id';
    public function add($data)
    {
        if($data && is_array($data)){
            $this->allowField(true)->save($data);
            return $this->user_id;
        }else{
            return false;
        }


    }
}