<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\month\login.html";i:1537838215;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
<center>
    <form action="<?php echo url('Month/login'); ?>" method="post">
        <table>
            <tr>
                <td>用户名:</td>
                <td><input type="text" name="user_name" placeholder="请输入用户名"></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input type="password" name="user_pwd" placeholder="请输入密码"></td>
            </tr>
            <tr>
                <td><input type="submit" value="登录"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>