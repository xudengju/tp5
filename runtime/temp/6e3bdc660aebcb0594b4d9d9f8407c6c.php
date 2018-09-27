<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\weekth\goodsshow.html";i:1537148254;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
         <center>
                 <table border="1">
                   <tr>
                         <td>ID</td>
                         <td>商品名称</td>
                         <td>商品数量</td>
                         <td>商品价格</td>
                         <td>操作</td>
                   </tr>

                   <?php foreach($data as $k=>$v){?>
                          <tr>
                                <td><?php echo $v['goods_id']?></td>
                                <td><?php echo $v['goods_name']?></td>
                                <td><?php echo $v['goods_num']?></td>
                                <td><?php echo $v['goods_price']?></td>
                                <td><a href="<?php echo url('brand'); ?>?id=<?php echo $v['goods_id']?>">购买</a></td>
                          </tr>
                   <?php }?>
                 </table>
         </center>
</body>
</html>