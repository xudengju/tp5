<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\attr\edit.html";i:1524124807;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改菜单-有点</title>
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
            <form action="<?php echo url('Attr/editdo'); ?>" method="post">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>会员注册</span>
				</div>
				<div class="baBody">
                    <input type="hidden" name="attr_id" value="<?php echo $data['attr_id']; ?>"/>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;类型名称：<input type="text" value="<?php echo $data['attr_name']; ?>"  name="attr_name" class="input3" required="required" />
					</div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;类型id：<input type="text" value="<?php echo $data['type_id']; ?>"  name="type_id" class="input3" required="required" />
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;属性类型：<input type="text" value="<?php echo $data['attr_type']; ?>"  name="attr_type" class="input3" required="required" />
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;属性录入方式：<input type="text" value="<?php echo $data['attr_input_type']; ?>"  name="attr_input_type" class="input3" required="required" />
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;可选值列表：<input type="text" value="<?php echo $data['attr_values']; ?>"  name="attr_values" class="input3" required="required" />
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