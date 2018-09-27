<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\student\login.html";i:1537259754;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
    <style type="text/css">
                   img{
                     border-radius: 700px;
                   }
   </style>
<body>
             <div>
             	  <form action="<?php echo url('Student/login'); ?>" method="post">
                   <table>
                       <tr>
                          <td>用户名:</td>
                          <td><input type="text" name="user"></td>
                       </tr>
                       <tr>
                          <td>密码:</td>
                          <td><input type="password" name="pwd"></td>
                       </tr>
                       <tr>
                           <td><input type="submit" value="登录"></td>
                       </tr>
                   </table>
                  </form>
                验证码： <img onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random()" src="<?php echo captcha_src(); ?>" alt="captcha" />
             </div>
</body>
</html>