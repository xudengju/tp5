<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\weekth\brand.html";i:1537149934;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选择收货地址</title>
</head>
<body>
	<form action="<?php echo url('Weekth/brand'); ?>" method="post">
       <table>
       	       <input type="hidden" name="id" value="<?php echo $id; ?>">
              <tr>
                <td>收货地址:</td>
                 <td>
                    <select name="addres_id">
                      <?php foreach($res as $k =>$v){?>
                          <option value="<?php echo $v['addres_id']; ?>"><?php echo $v['address']; ?></option>
                      <?php }?>
                    </select>
                 </td>
              </tr>
              <tr>
                   <td><input type="submit" value="确定"></td>
              </tr>
        </table>
        </form>
</body>
</html>