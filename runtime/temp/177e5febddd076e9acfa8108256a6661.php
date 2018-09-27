<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\cart\cart.html";i:1536220638;}*/ ?>
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
                 	margin: auto;
                 	line-height: 50px;
                 }
                 .form-box table,tr{
                 	 border-bottom: 1px solid #ccc;
                 }
            
        </style>
<body>
       <div class="form-box">
             
             <table>
                       <tr>
                       	   <td>ID</td>
                           <td>商品名称</td>
                           <td>商品logo</td>
                           <td>添加时间</td>
                       </tr>
             
       	  <?php foreach($data as $k=>$v) { ?>
       	  <tr>
               <td><?php echo $v['cart_id']; ?></td>
               <td><?php echo $v['goods_name']; ?></td>
               <td><image src="<?php echo $v['goods_logo']; ?>" width="50" height="50"></td>
               <td><?php echo $v['addtime']; ?></td>
       	   </tr>
               <?php }?>
		 </table>
        </div>
</body>
</html>