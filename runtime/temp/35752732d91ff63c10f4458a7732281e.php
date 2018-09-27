<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\cart\xq.html";i:1536378111;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
</head>
      <style type="text/css">
                 .form-box{
                 	width: 400px;
                 	height: 500px;
                 	margin: auto;
                 	background: #ccc;
                 	line-height: 50px;
                 }
                 .form-box button{
                 	     width: 150px;
                 	     height: 50px;
                 	     background: red;
                 }
      </style>
<body>
         <div class="form-box">
               <?php foreach($data as $k=>$v) { ?>
                   <p>商品名称:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['goods_name']; ?></p>
                   <p>商品logo:&nbsp;&nbsp;&nbsp;&nbsp;<image src="<?php echo $v['goods_logo']; ?>" width="50" height="50"></p>
                   <p>商品数量:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['goods_num']; ?></p>
                   <p>商品价格:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['goods_price']; ?></p>
               <?php }?>
                   <button><a href="<?php echo url('gwc'); ?>?goods_id=<?php echo $v['goods_id']; ?>&goods_name=<?php echo $v['goods_name']; ?>&goods_logo=<?php echo $v['goods_logo']; ?>&goods_price=<?php echo $v['goods_price']; ?>">加入购物车</a></button>
         </div>
</body>
</html>