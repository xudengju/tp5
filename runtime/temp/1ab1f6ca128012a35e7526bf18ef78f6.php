<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\student\addadmin.html";i:1536983501;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加管理员</title>
</head>
<body>
         <div>
                 <form action="<?php echo url('Student/AddAdmin'); ?>" method="post">
                      <table>
                           <tr>
                                 <td>管理员账号</td>
                                 <td><input type="text" name="admin_zh"></td>
                           </tr>
                           <tr>
                                 <td>管理员密码</td>
                                 <td><input type="password" name="admin_pwd"></td>
                           </tr>
                           <tr>
                              <td>管理员名称</td>
                              <td><input type="text" name="admin_name"></td>
                           </tr>
                           <tr>
                               <td>管理员状态</td>
                               <td><select name="admin_status">
                                    <option value="1">在线</option>
                                    <option value="2">不在线</option>
                               </select></td>
                           </tr>
                           <tr>
                                <td><input type="submit" value="提交"></td>
                           </tr>
                      </table>
                 </form>
         </div>
</body>
</html>