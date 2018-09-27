<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\menu\index.html";i:1523589875;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>菜单管理-有点</title>
    <base href="/static/admin/"/>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <link rel="stylesheet"  href="css/bootstrap.min.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;菜单管理
        </div>
    </div>

    <div class="page">
        <!-- user页面样式 -->
        <div class="connoisseur">
            <div class="conform">
                <div class="cfD">
                    <input class="userinput" type="text" placeholder="输入用户名" />&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                    <input class="userinput vpr" type="text" placeholder="输入用户密码" />
                    <a href="<?php echo url('Menu/add'); ?>"><button class="userbtn">添加</button></a>
                </div>
            </div>
            <!-- user 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>
                        <td width="435px" class="tdColor">菜单名称</td>
                        <td width="400px" class="tdColor">控制器</td>
                        <td width="630px" class="tdColor">方法</td>
                        <td width="130px" class="tdColor">操作</td>
                    </tr>

                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$y): ?>
                    <tr height="40px">
                        <td><?php echo $y['n_id']; ?></td>
                        <td style="text-align: left;"><?php echo str_repeat('|--',$y['level']);?><?php echo $y['n_name']; ?></td>
                        <td><?php echo $y['controller']; ?></td>
                        <td><?php echo $y['action']; ?></td>
                        <td>
                            <a  href="<?php echo url('Menu/edit',['id'=>$y['n_id']]); ?>"><img class="operation" src="img/update.png"></a>
                            <a href="<?php echo url('Menu/del',['id'=>$y['n_id']]); ?>"><img  class="operation delban" src="img/delete.png"></a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <div class="paging"><?php echo $res->render(); ?></div>
            </div>
            <!-- user 表格 显示 end-->
        </div>
        <!-- user页面样式end -->
    </div>

</div>


<!-- 删除弹出框 -->
<!--<div class="banDel">-->
    <!--<div class="delete">-->
        <!--<div class="close">-->
            <!--<input type="hidden" id="n_id" name="n_id" value=""/>-->
            <!--<a><img src="img/shanchu.png" /></a>-->
        <!--</div>-->
        <!--<p class="delP1">你确定要删除此条记录吗？</p>-->
        <!--<p class="delP2">-->
            <!--<a href="javascript:void(0)" class="ok yes">确定</a><a class="ok no">取消</a>-->
        <!--</p>-->
    <!--</div>-->
<!--</div>-->
<!-- 删除弹出框  end-->
</body>

<!--<script type="text/javascript">-->
    <!--// 广告弹出框-->
    <!--$(".delban").click(function(){-->
        <!--var id=$(this).attr('id');-->
        <!--$('#n_id').val(id);-->
        <!--$(".banDel").show();-->
    <!--});-->
    <!--$(".close").click(function(){-->
        <!--$(".banDel").hide();-->
    <!--});-->
    <!--$(".no").click(function(){-->
        <!--$(".banDel").hide();-->
    <!--});-->
    <!--// 广告弹出框 end-->
<!--</script>-->
</html>