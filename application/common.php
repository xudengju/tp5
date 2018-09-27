<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 无限极分类
 * @staticvar array $newarray
 * @param type $data
 * @param type $parent_id
 * @param type $level
 * @return type
 */
function CreateTree($data,$parent_id=0,$level=0,$filed='n_id') {

    static $newarray = [];
    if( $data ){
        foreach ($data as $key => $value) {
            if( $value['parent_id']== $parent_id){
                $value['level'] = $level;
                $newarray[] = $value;
                CreateTree($data,$value[$filed],$level+1,$filed);
            }

        }
        return $newarray;
    }
}

function CreateSonTree( $data ,$parent_id=0,$level = 0,$filed='n_id'){
    $newArray = [];
    if( $data ){
        foreach($data as $key=>$val){

            if( $val['parent_id']== $parent_id){
                $val['level'] = $level;
                $newArray[$key] = $val;
                $newArray[$key]['son'] = CreateSonTree($data,$val[$filed],$level+1,$filed);
            }
        }
        return $newArray;
    }


}
