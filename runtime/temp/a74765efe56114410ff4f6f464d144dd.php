<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\weekth\update.html";i:1537147934;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改收货地址</title>
</head>
<body>
         <div>
             <form action="<?php echo url('Weekth/update'); ?>" method="post">
                 <table>
                       <input type="hidden" name="addres_id" value="<?php echo $data['addres_id']; ?>">
                      <tr>
                            <td>收货地址：</td>
                            <td>
                                <textarea name="address">
                                    <?php echo $data['address']; ?>
                                </textarea>
                            </td>
                      </tr>
                      <tr>
                            <td><input type="submit" value="修改"></td>
                      </tr>
                 </table>
             </form>
            
         </div>
</body>
</html>