<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\goods\index.html";i:1525178569;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="/static/admin/">   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品管理-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>

<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;商品管理
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					
						<div class="cfD">
							<input class="userinput" type="text" placeholder="输入用户名" />&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
							<input class="userinput vpr" type="text" placeholder="输入用户密码" />
							<a href="<?php echo url('Goods/add'); ?>"><button class="userbtn">添加商品</button></a>
						</div>
					
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="166px" class="tdColor tdC">序号</td>
							<td width="20%" class="tdColor" align="left">商品名称</td>
                                                        <td width="20%" class="tdColor" align="left">商品货号</td>
                                                        <td width="10%" class="tdColor" align="left">商品价格</td>
							<td width="20%" class="tdColor" align="left">上架</td>
                                                        <td width="15%" class="tdColor" align="left">库存</td>
							<td width="10%" class="tdColor">操作</td>
						</tr>
                                            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): ?>
						<tr height="40px">
							<td><?php echo $vo['goods_id']; ?></td>
							<td><?php echo $vo['goods_name']; ?></td>
                                                        <td><?php echo $vo['goods_sn']; ?></td>
                                                        <td><?php echo $vo['shop_price']; ?></td>
                                                        <td>√</td>
							<td><?php echo $vo['goods_number']; ?></td>
							<td>

                                <a href="<?php echo url('Goods/sku',['id'=>$vo['goods_id']]); ?>">添加货品</a>
                                                            <a  href="<?php echo url('Goods/edit',['id'=>$vo['goods_id']]); ?>">
                                                                <img class="operation" src="img/update.png">
                                                            </a> 
                                                            <img id='<?php echo $vo['goods_id']; ?>' class="operation delban"
								src="img/delete.png">
                                                        </td>
						</tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
					<div class="paging"><?php echo $data->render(); ?></div>
				</div>
				<!-- user 表格 显示 end-->
			</div>
			<!-- user页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
                            <input type="hidden" id='attr_id'  value=''/>
				<a><img src="img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="javascript:void(0);" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
   var id = $(this).attr('id');
   $('#attr_id').val(id); 
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});

$('.yes').click(function(){
    var id = $('#goods_id').val();
    $.ajax({
        type: "POST",
        url: "<?php echo url('Goods/del'); ?>",
        data: "id="+id,
        success: function(msg){
           if( msg ){
               $(".banDel").hide();
               window.location.reload();
           }
        }
     });
    
    
});

// 广告弹出框 end
</script>
</html>