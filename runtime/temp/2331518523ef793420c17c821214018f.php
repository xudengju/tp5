<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\goods\show.html";i:1536546194;}*/ ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<style type="text/css">
            .form-box{
            	width: 400px;
            	height: 500px;
            	  margin:auto;
            }   

            .form-box td{
            	border-bottom:1px solid #ccc; 
            }
</style>
<body>
       <div class="form-box">
       	 <a href="<?php echo url('login'); ?>">登录</a>
              <table>
                         <tr>
                             <td>商品名称</td>
                             <td>商品logo</td>
                              <td>商品库存</td>
                             <td>商品价格</td>
                             <td>操作</td>
                         </tr>
                         <?php foreach($data as $k=>$v){ ?>
                               <tr>
                                     <td><?php echo $v['goods_name']?></td>
                                     <td><image src="<?php echo $v['goods_logo']?>" width="50"height="50"></td>
                                     <td><?php echo $v['goods_num']?></td>
                                     <td><?php echo $v['goods_price']?></td>
                                     <td><a href="<?php echo url('cart'); ?>?goods_id=<?php echo $v['goods_id']?>">加入购物车</a></td>
                               </tr>
                         <?php }?>
              </table>

       </div>
</body>
</html>