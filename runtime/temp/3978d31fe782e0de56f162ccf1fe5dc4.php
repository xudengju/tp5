<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\item\shop.html";i:1536889386;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
</head>
  <style type="text/css">
                   body{
                   	  background: #ccc;
                   }
                .buy-box{
                	width: 400px;
                	height: 400px;
                	margin: auto;
                    line-height: 50px;
                }
  </style>
<body>
        <div class="buy-box">
        	 <form action="<?php echo url('Item/pay'); ?>" method="post">
                 <p><input type="hidden" name="goods_id" value="<?php echo $data['goods_id']?>"></p>
               <p>商品名称:<?php echo $data['goods_name']?></p>
               <p>商品logo:<image src="<?php echo $data['goods_logo']?>" width="50" height="50">  </p>
                <p>商品购买数量:
                     <select name="order_num">
                        <?php for($i=1;$i<=10;$i++){?>
                            <option><?php echo $i?></option>
                        <?php }?>
                     </select>
                </p>
                <p>商品价格<?php echo $data['goods_price']?></p>
                <p><input type="submit" value="付款"></p>
        	 </form>
        	 
        </div>
</body>
</html>