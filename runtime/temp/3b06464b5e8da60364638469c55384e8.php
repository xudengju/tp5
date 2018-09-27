<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\month\register.html";i:1537837231;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<body>
<center>
    <form action="<?php echo url('Month/register'); ?>" method="post">
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
                <td>昵称:</td>
                <td><input type="text" name="nickname" placeholder="请输入昵称"></td>
            </tr>
            <tr>
                <td>邮箱:</td>
                <td><input type="email" name="email" placeholder="请输入邮箱"></td>
            </tr>
            <tr>
                <td><input type="submit" value="注册"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>