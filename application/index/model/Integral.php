<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/23
 * Time: 9:59
 */
namespace app\index\model;
use think\Model;
  class Integral extends Model
  {
      protected $table="integral";
      protected $pk="integral_id";
      public function add($data)
      {
         if($data && is_array($data)){
             $this->allowField(true)->save($data);
             return $this->integral_id;
         }else{
             return false;
         }
      }
  }