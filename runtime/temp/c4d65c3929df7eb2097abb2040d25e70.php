<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\index\index.html";i:1523425075;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页-有点</title>
</head>
<frameset rows="100,*" cols="*" scrolling="No" framespacing="0"
	frameborder="no" border="0">
    <frame src="<?php echo url('Index/head'); ?>"
	name="headmenu" id="mainFrame" title="mainFrame">
    <!-- 引用头部 -->
<!-- 引用左边和主体部分 -->
    <frameset rows="100*" cols="220,*" scrolling="No"
	framespacing="0" frameborder="no" border="0">
        <frame
	src="<?php echo url('Index/left'); ?>" name="leftmenu" id="mainFrame" title="mainFrame">
<frame src="<?php echo url('Index/main'); ?>" name="main" scrolling="yes" noresize="noresize"
	id="rightFrame" title="rightFrame"></frameset></frameset>
</html>