<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\student\student.html";i:1537404893;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生列表</title>
</head>
<body>

        <center>
            <a href="<?php echo url('cq'); ?>"><button>抽取</button></a>
             <table>
                     <tr>
                         <td>ID</td>
                         <td>学生姓名</td>
                         <td>学生学号</td>
                         <td>学生号码</td>
                         <td>学生qq</td>
                         <td>学生状态</td>
                         <td>操作</td>
                     </tr>
                    <?php foreach($data as $k=>$v){?>
                        <tr>
                           <td><?php echo $v['student_id']; ?></td>
                           <td><?php echo $v['student_name']; ?></td>
                           <td><?php echo $v['student_xh']; ?></td>
                           <td><?php echo $v['student_tel']; ?></td>
                           <td><?php echo $v['qq']; ?></td>
                           <td>
                              <?php if($v['student_status']==1){?>
                               在线
                              <?php }if($v['student_status']==2){?>
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