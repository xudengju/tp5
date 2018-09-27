<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\weekth\xq.html";i:1537150773;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单详情</title>
</head>
   <style type="text/css">
              .xq p{
                border-bottom: 1px solid #ccc;
              }
    </style>
<body>
          <div class="xq">
             <p>订单编号:<?php echo $data['brand_bh']; ?></p>
             <p>添加时间:<?php echo $data['brand_time']; ?></p>
             <p>购买数量:<?php echo $data['brand_num']; ?></p>
             <p>商品名称:<?php echo $data['goods_name']; ?></p>
             <p>收货地址:<?php echo $data['address']; ?></p>
     </div>
</body>
</html>