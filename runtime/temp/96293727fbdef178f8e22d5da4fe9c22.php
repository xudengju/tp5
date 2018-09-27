<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\one\register.html";i:1537666921;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
</head>
<body>
       <center>
           <form action="<?php echo url('One/register'); ?>" method="post">
             <table>
                 <tr>
                     <td>用户名:</td>
                     <td><input type="text" name="user_name"></td>
                 </tr>
                 <tr>
                     <td>密码:</td>
                     <td><input type="password" name="user_pwd"></td>
                 </tr>
                 <tr>
                     <td><input type="submit" value="注册"></td>
                 </tr>
             </table>
           </form>
       </center>
</body>
</html>