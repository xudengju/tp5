<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\month\show.html";i:1537847507;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品展示</title>
</head>
<style type="text/css">
         .yh{
             width: 100%;
             height: 30px;
             background: #00a0e9;
         }
        .yh p{
            color: yellow;
        }
         .yh a{
             color: red;
         }
</style>
<body>
<div class="yh">
       <?php if($user){?>
        <p><?php echo $user?>已登录</p>
      <?php }if($user==''){?>
    <a href="<?php echo url('login'); ?>"><?php echo $user?>未登录</a>
    <?php }?>
</div>
<center>
     <h1>商品展示</h1>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>商品名称</td>
            <td>商品数量</td>
            <td>商品价格</td>
            <td>商品购买状态</td>
            <td>商品状态</td>
            <td>商品类型</td>
            <td>操作</td>
        </tr>
        <?php foreach($data as $k=>$v){ ?>
        <tr>
            <td><?= $v['goods_id']?></td>
            <td><?= $v['goods_name']?></td>
            <td><?= $v['goods_num']?></td>
            <td><?= $v['goods_price']?></td>
            <td>
                <?php if( $v['goods_status']==0){ ?>
                  未购买
                 <?php } if( $v['goods_status']==1){ ?>
                已购买
                <?php } ?>
            </td>
            <td>
                <?php if( $v['goods_static']==0){ ?>
                下架
                <?php } if( $v['goods_static']==1){ ?>
                上架
                <?php } ?>
            </td>
            <td>
                <?= $v['goods_type']?>
            </td>
            <td><a href="<?php echo url('cart'); ?>?goods_id=<?= $v['goods_id']?>">购买</a>|<a href="<?php echo url('show'); ?>?goods_type=<?= $v['goods_type']?>">找相似</a></td>
        </tr>
        <?php }?>
    </table>

    <?php echo $page; ?>


</center>
</body>
</html>