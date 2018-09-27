<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\month\cartshow.html";i:1537847269;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
</head>
<body>
<center>
    <table>
        <tr>
            <td>ID</td>
            <td>商品名称</td>
            <td>商品价格</td>
            <td>购买数量</td>
            <td>商品状态</td>
            <td>操作</td>
        </tr>
        <?php foreach($data as $k=>$v){?>
        <tr>
            <td><?= $v['cart_id']?></td>
            <td><?= $v['goods_name']?></td>
            <td><?= $v['goods_price']?></td>
            <td><?= $v['buy_num']?></td>
            <td>
                <?php if( $v['goods_static']==0){ ?>
                下架
                <?php } if( $v['goods_static']==1){ ?>
                上架
                <?php } ?>
            </td>
            <td><a href="<?php echo url('buy'); ?>?cart_id=<?= $v['cart_id']?>">去结算</a></td>
        </tr>
        <?php }?>
    </table>

    <a href="<?php echo url('cartshow'); ?>?goods_static=1">有效数据</a>
</center>
</body>
</html>