<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\item\register.html";i:1536808961;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<style type="text/css">
               body{
               	  background: rgb(59,98,131);
               }
              .form-box{
              	   width: 220px;
              	   height: 100px;
              	   background: rgb(199,199,199);
              	   margin-top: 200px;
              	   margin-left: 500px;
              	   background-repeat:no-repeat;
              }
 </style>
<body>

        <div class="form-box">
        	<form action="<?php echo url('Item/register'); ?>" method="post">
               <table>
                   <tr>
                       <td>用户:</td>
                       <td><input type="text" name="user_name"></td>
                   </tr>
                   <tr>
                   	    <td>密码</td>
                        <td><input type="password" name="user_pwd"></td>
                   </tr>
                   <tr>
                       <td colspan="2" align="center"><input type="submit" value="注册"></td>
                   </tr>
               </table>
               </form>
          </div>
</body>
</html>