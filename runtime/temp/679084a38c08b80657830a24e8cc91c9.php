<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\item\buygoods.html";i:1536894436;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>已购商品</title>
</head>
<style type="text/css">
                
                       .buy-box{
                       	   height: 200px;
                       	   width:400px;
                       	   margin: auto;
                       }
                       
 </style>
<body>
	      <div class="buy-box">
          <table>
                 <tr>
                      <td>ID</td>
                      <td>商品名称</td>
                      <td>商品logo</td>
                      <td>购买数量</td>
                      <td>获得积分</td>
                      <td>评论</td>
                 </tr>
                 <?php foreach($data as $k=>$v){?>
                    <tr>
                         <td><?php echo $v['goods_id']?></td>
                         <td><?php echo $v['goods_name']?></td>
                         <td><image src="<?php echo $v['goods_logo']?>" width="50" height="50"> </td>
                         <td><?php echo $v['order_num']?></td>
                         <td><?php echo $v['integrallog_num']?></td>
                         <td><a href="<?php echo url('pl'); ?>?id=<?php echo $v['goods_id']?>">评论下</a></td>
                    </tr>
                 <?php }?>
          </table>
          </div>

</body>
</html>