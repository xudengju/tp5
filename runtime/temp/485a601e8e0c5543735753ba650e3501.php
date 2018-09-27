<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\item\login.html";i:1536809070;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<style type="text/css">

                body{
                	background-image: url("http://img.glzy8.com/upfiles/www/ppt/jpg/32104.jpg");
                	
                }
                .form-box{
              	   width: 230px;
              	   height: 100px;
              	   background: rgb(244,243,248);
              	   margin-top: 200px;
              	   margin-left: 500px;
              }
 </style>
<body>
           <div class="form-box">
             <form action="<?php echo url('Item/login'); ?>" method="post">
                  <table>
                         <tr>
                             <td>用户名:</td>
                             <td><input type="text" name="user_name"></td>
                         </tr>
                         <tr>
                             <td>密&nbsp;&nbsp;&nbsp;&nbsp;码:</td>
                             <td><input type="password" name="user_pwd"></td>
                         </tr>
                         <tr>
                             <td colspan="2" align="center"><input type="submit" value="登录"></td>
                         </tr>
                  </table>
             </form>
           </div>
</body>
</html>