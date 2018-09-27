<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\attr\add.html";i:1524120488;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加属性-有点</title>
    <base href="/static/admin/"/>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
            <form action="<?php echo url('Attr/add'); ?>" method="post">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>会员注册</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;属性名称：<input type="text"  name="attr_name" class="input3" required="required" />
					</div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;所属类型：
                        <select name="type_id" id="" class="input3">
                            <option value="">请选择所属类型</option>
                           <?php if(is_array($type_data) || $type_data instanceof \think\Collection || $type_data instanceof \think\Paginator): if( count($type_data)==0 ) : echo "" ;else: foreach($type_data as $key=>$vo): ?>
                            <option value="<?php echo $vo['type_id']; ?>"><?php echo $vo['type_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;属性类型：<input type="radio"  name="attr_type" value="1"  required="required" checked />属性
                                                        <input type="radio"  name="attr_type" value="2"  required="required" />规格
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;属性录入方式：<input type="radio" class="textareadis"  name="attr_input_type" value="1"  required="required" checked/>手工录入
                                                           <input type="radio" class="textareause"  name="attr_input_type" value="2"  required="required" />下拉列表
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;可选值列表：<textarea name="attr_values" id="" cols="30" rows="10" required="required" disabled></textarea>
                    </div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>

			<!-- 会员注册页面样式end -->
            </form>
		</div>
	</div>
</body>
</html>
<script>
    $('.textareause').click(function(){
        $('textarea[name=attr_values]').removeAttr('disabled');
    });
    $('.textareadis').click(function(){
        $('textarea[name=attr_values]').attr('disabled','disabled');
    });
</script>