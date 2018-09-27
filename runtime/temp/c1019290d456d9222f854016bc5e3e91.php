<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\weekth\show.html";i:1537147275;}*/ ?>
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
                         <td>地址</td>
                         <td>操作</td>
                   </tr>

                   <?php foreach($data as $k=>$v){?>
                          <tr>
                                <td><?php echo $v['addres_id']?></td>
                                <td><?php echo $v['address']?></td>
                                <td><a href="<?php echo url('del'); ?>?id=<?php echo $v['addres_id']?>">删除</a>|<a href="<?php echo url('update'); ?>?id=<?php echo $v['addres_id']?>">修改</a></td>
                          </tr>
                   <?php }?>
                 </table>
         </center>
</body>
</html>