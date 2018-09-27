<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\index\left.html";i:1523794939;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>首页左侧导航</title>
    <base href="/static/admin/" >
    <link rel="stylesheet" type="text/css" href="css/public.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/public.js"></script>
<head></head>

<body id="bg">
<!-- 左边节点 -->
<!--{print_r|$user}-->
<div class="container">
    <div class="leftsidebar_box">
        <a href="<?php echo url('Index/main'); ?>" target="main"><div class="line">
            <img src="img/coin01.png" />&nbsp;&nbsp;首页
        </div></a>
        <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): if( count($user)==0 ) : echo "" ;else: foreach($user as $key=>$f): ?>
        <dl class="system_log">
                <dt>
                    <img class="icon1" src="img/coin03.png" /><img class="icon2" src="img/coin04.png" /> <?php echo $f['n_name']; ?><img class="icon3"
                           src="img/coin19.png" /><img class="icon4" src="img/coin20.png" />
                </dt>

        <dl>
            <?php if(is_array($f['child']) || $f['child'] instanceof \think\Collection || $f['child'] instanceof \think\Paginator): if( count($f['child'])==0 ) : echo "" ;else: foreach($f['child'] as $key=>$z): ?>
                <dd>
                    <img class="coin11" src="img/coin111.png" /><img class="coin22" src="img/coin222.png" /><a class="cks" href="#"
                        target="main"><a href="<?php echo url($z['controller'].'/'.$z['action']); ?>" TARGET="main"><?php echo $z['n_name']; ?></a></a><img class="icon5" src="img/coin21.png" />
                </dd>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

</div>
</body>
</html>
