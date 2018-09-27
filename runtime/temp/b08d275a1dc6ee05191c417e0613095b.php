<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\file\files.html";i:1534313052;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<meta charset="utf-8">
<body>
	  <form action="<?php echo url('file/add'); ?>" method="post" enctype="multipart/form-data">
            <p>文件上传 <input type="file" name="img[]" id="file" multiple="multiple"></p>
            <input type="submit" value="上传">
           </form>
</body>
</html>