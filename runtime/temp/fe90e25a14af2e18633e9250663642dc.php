<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\weekth\addaddress.html";i:1537146458;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加收货地址</title>
</head>
<body>
         <div>
             <form action="<?php echo url('Weekth/AddAddress'); ?>" method="post">
                 <table>
                      <tr>
                            <td>收货地址：</td>
                            <td>
                                <textarea name="address">
                               
                                </textarea>
                            </td>
                      </tr>
                      <tr>
                            <td><input type="submit" value="添加"></td>
                      </tr>
                 </table>
             </form>
            
         </div>
</body>
</html>