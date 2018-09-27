<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\cart\show.html";i:1536376599;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品</title>
</head>
        <style type="text/css">
                .form-box{
                	 width: 350px;
                	 height: 500px;
                	 margin: auto;
                	
                }
        </style>
<body> 
          <div class="form-box">
          	<table border="1"> 
          		  <tr>
                      <td>ID</td>
                      <td>商品名称</td>
                      <td>商品logo</td>
                      <td>商品数量</td>
                      <td>商品价格</td>
                      <td>操作</td>
          		  </tr>
          		<?php foreach($data as $k=>$v){ ?>
                  <tr>
                        <td><?php echo $v['goods_id']; ?></td>
                        <td><?php echo $v['goods_name']; ?></td>
                        <td><image src="<?php echo $v['goods_logo']; ?>" width="50" height="50"></td>
                        <td><?php echo $v['goods_num']; ?></td>
                        <td><?php echo $v['goods_price']; ?></td>
                        <td><a href="<?php echo url('xq'); ?>?id=<?php echo $v['goods_id']; ?>">查看详情</a></td>
                  </tr>
                   <?php }?>
          	</table>
          	

              
          </div>
</body>
</html>