<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\student\teacher.html";i:1537256756;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>老师列表</title>
</head>
<body>
        <center>
             <table>
                     <tr>
                         <td>ID</td>
                         <td>老师姓名</td>
                         <td>老师昵称</td>
                         <td>班级</td>
                         <td>状态</td>
                         <td>操作</td>
                     </tr>
                    <?php foreach($data as $k=>$v){?>
                        <tr>
                           <td><?php echo $v['teacher_id']; ?></td>
                           <td><?php echo $v['tea_name']; ?></td>
                           <td><?php echo $v['teaname']; ?></td>
                           <td><?php echo $v['class']; ?></td>
                           <td>
                              <?php if($v['status']==1){?>
                               在线
                              <?php }if($v['status']==2){?>
                               不在线
                              <?php }?>
                           </td>
                           <td><a href="">删除</a>|<a href="">修改</a></td>
                        </tr>
                    <?php }?>
             </table>
        </center>
</body>
</html>