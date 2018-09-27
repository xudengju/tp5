<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\student\cq.html";i:1537501655;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>抽取学生</title>
</head>
         <style type="text/css">
                  button{
                      margin-left: 100px;
                  }
         </style>
<body>
        <center>
           <h1>抽取学生</h1>
           <hr>
            <a href="<?php echo url('cq'); ?>?msg=1"><button>抽取一位</button></a>
            <a href="<?php echo url('cq'); ?>?msg=2"><button>抽取二位</button></a>
            <a href="<?php echo url('cq'); ?>?msg=3"><button>抽取三位</button></a>
          <table border="1">
               <tr>
                   <td>学号</td>
                   <td>姓名</td>
                   <td>电话</td>
                   <td>qq</td>
                   <td>提问次数</td>
               </tr>
              <?php foreach($data as $k=>$v){ ?>
                <tr>
                    <td><?php echo $v['student_xh']; ?></td>
                    <td><?php echo $v['student_name']; ?></td>
                    <td><?php echo $v['student_tel']; ?></td>
                    <td><?php echo $v['qq']; ?></td>
                    <td><?php echo $v['tw_num']; ?></td>
                </tr>
              <?php }?>
          </table>
        </center>
</body>
</html>