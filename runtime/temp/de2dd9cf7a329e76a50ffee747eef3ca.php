<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\login\login.html";i:1536224708;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
           <form action="<?php echo url('Login/login'); ?>" method="post">
                  <table>
                       <tr>
                             <td>用户名:</td>
                             <td><input type="text" name="username"></td>
                       </tr>
                       <tr>
                             <td>密码：</td>
                             <td><input type="password" name="userpwd"></td>
                       </tr>
                       <tr>
                              <td><input type="submit" value="submit"></td>
                       </tr>
                  </table>
            </form>
</body>
</html>