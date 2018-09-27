<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\item\pl.html";i:1536894414;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
  <style type="text/css">
              .pl{
                       	width: 300px;
                       	height: 200px;
                       	   margin: auto;
                       }
   </style>
<body>
        <div class="pl">
             <h1>用户评论</h1>
          <form action="<?php echo url('pl'); ?>" method="post">
                <table>
                	   <td><input type="hidden" name="goods_id" value="<?php echo $id?>"></td>
                        <tr>
                              <td>评论:</td>
                              <td><textarea name="pl_content" rows="4" cols="50">

                               </textarea></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="评论"></td>
                        </tr>
                </table>
          </form>
          </div>
</body>
</html>