<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\category\edit.html";i:1524042042;}*/ ?>
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
            <form action="<?php echo url('Category/editdo'); ?>" method="post">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>会员注册</span>
				</div>
				<div class="baBody">
                    <input type="hidden" name="cate_id" value="<?php echo $data['cate_id']; ?>"/>
                    <div class="bbD">
                        &nbsp;&nbsp;父级分类：<select name="parent_id" id="" class="input3">
                        <option value="0">请选择父级菜单</option>
                        <?php foreach($menudata as $key =>$val): ?>
                        <option value="<?php echo $val['cate_id']; ?>"><?php echo str_repeat('|--',$val['level']);?><?php echo $val['cate_name']; ?></option>
                        <?php endforeach; ?>

                    </select>
                    </div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;分类名称：<input type="text" value="<?php echo $data['cate_name']; ?>"  name="cate_name" class="input3" required="required" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;父亲id：<input type="text" value="<?php echo $data['parent_id']; ?>" class="input3" name="parent_id" required="required" />
					</div>
                    <div class="bbD">
                       &nbsp;&nbsp;分类排序：<input type="text" value="<?php echo $data['cate_desc']; ?>" name="cate_desc" class="input3" required="required"/>
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