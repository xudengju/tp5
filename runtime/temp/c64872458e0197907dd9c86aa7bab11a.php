<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\weekth\brandshow.html";i:1537150229;}*/ ?>
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
                         <td>订单编号</td>
                         <td>订单添加时间</td>
                         <td>订单数量</td>
                         <td>商品名称</td>
                         <td>地址</td>
                         <td>操作</td>
                   </tr>

                   <?php foreach($data as $k=>$v){?>
                          <tr>
                                <td><?php echo $v['brand_id']?></td>
                                <td><?php echo $v['brand_bh']?></td>
                                <td><?php echo $v['brand_time']?></td>
                                <td><?php echo $v['brand_num']?></td>
                                <td><?php echo $v['goods_name']?></td>
                                <td><?php echo $v['address']?></td>
                                <td><a href="<?php echo url('xq'); ?>?id=<?php echo $v['brand_id']?>">查看详情</a></td>
                          </tr>
                   <?php }?>
                 </table>
         </center>
</body>
</html>