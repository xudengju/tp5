<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\three\login.html";i:1537757113;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
<center>
    <form action="<?php echo url('Three/login'); ?>" method="post">
        <table>
            <tr>
                <td>用户名:</td>
                <td><input type="text" name="user_name"></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input type="text" name="user_pwd"></td>
            </tr>
            <tr>
                <td><input type="submit" value="登录"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>