<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\brand\add.html";i:1524038488;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加商品-有点</title>
    <base href="/static/admin/"/>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">商品品牌-添加</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
            <form action="<?php echo url('Brand/doadd'); ?>" method="post" enctype="multipart/form-data">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>会员注册</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;品牌名称：<input type="text"  name="brand_name" class="input3" required="required" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品牌地址：<input type="text"  name="brand_url" class="input3" required="required" />
					</div>
                    <div class="bbD">
                       &nbsp;&nbsp;品牌logo：<input type="file" name="brand_logo" class="input3" required="required"/>
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品牌排序：<input type="text"  name="brand_desc" class="input3" required="required" />
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