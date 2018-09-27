<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\goods\add.html";i:1536541632;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
       <div>
             	<form action="<?php echo url('Goods/add'); ?>" method="post" enctype="multipart/form-data">
            <table>
                  <tr>
                        <td>商品名称:</td>
                        <td><input type="text" name="goods_name"></td>

                  </tr>
                  <tr>
                         <td>商品logo:</td>
                         <td><input type="file" name="goods_logo"></td>
                  </tr>
                  <tr>
                      <td>商品价格:</td>
                      <td><input type="text" name="goods_price"></td>
                  </tr>
                  <tr>
                           <td>商品数量:</td>
                           <td><input type="text" name="goods_num"></td>
                  </tr>
                  <tr>
                             <td><input type="submit" value="提交"></td>
                  </tr>
            </table>
            </form>
        </div>

</body>
</html>