<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\goods\sku.html";i:1525180860;}*/ ?>
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

<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;商品管理
			</div>
		</div>

<div class="page conShow">


<form method="post" action="goods.php" name="addForm" id="addForm">
<input type="hidden" name="goods_id" value="100">
<input type="hidden" name="act" value="product_add_execute">
  <table width="100%" cellpadding="3" cellspacing="1" id="table_list"  class="table">
    <tbody><tr>
      <th colspan="20" scope="col">商品名称：<?php echo $data['goods_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;货号：<?php echo $data['goods_sn']; ?></th>
    </tr>
    <tr>
      <!-- start for specifications -->
              <td scope="col" style="background-color: rgb(255, 255, 255);"><div align="center"><strong>颜色</strong></div></td>
              <td scope="col" style="background-color: rgb(255, 255, 255);"><div align="center"><strong>内存</strong></div></td>
            <!-- end for specifications -->
      <td class="label_2" style="background-color: rgb(255, 255, 255);">货号</td>
      <td class="label_2" style="background-color: rgb(255, 255, 255);">库存</td>
      <td class="label_2" style="background-color: rgb(255, 255, 255);">&nbsp;</td>
    </tr>

    
    <tr id="attr_row">
    <!-- start for specifications_value -->
        <?php if($attr_data['vals']): foreach($attr_data['vals'] as $key=>$val): ?>
          <td align="center" style="background-color: rgb(255, 255, 255);">
        <select name="attr[216][]">
        <option value="" selected="">请选择...</option>
            <?php foreach($val as $key=>$v): ?>
                <option value="<?php echo $v; ?>"><?php echo $v; ?></option>
            <?php endforeach; ?>
                </select>
      </td>
        <?php endforeach; endif; ?>
          <td align="center" style="background-color: rgb(255, 255, 255);">
        <select name="attr[217][]">
        <option value="" selected="">请选择...</option>
                <option value="32G">32G</option>
                <option value="64G">64G</option>
                <option value="128G">128G</option>
                </select>
      </td>
        <!-- end for specifications_value -->

      <td class="label_2" style="background-color: rgb(255, 255, 255);"><input type="text" name="product_sn[]" value="" size="20"></td>
      <td class="label_2" style="background-color: rgb(255, 255, 255);"><input type="text" name="product_number[]" value="1" size="10"></td>
      <td style="background-color: rgb(255, 255, 255);"><input type="button" class="button attrbtn" value=" + " onclick="javascript:add_attr_product();"></td>
    </tr>

    <tr>
      <td align="center" colspan="5" style="background-color: rgb(255, 255, 255);">
        <input type="button" class="button" value=" 保存 " onclick="checkgood_sn()">
      </td>
    </tr>
  </tbody></table>
</form>


</div>
</div>
<script src="js/jquery-1.7.2.min.js"></script>    
<script type="text/javascript">
    $('.attrbtn').click(function(){
        var newobj = $(this).parent().parent().clone();
        $(this).parent().parent().after(newobj);
        $(this).parent().parent().next().find('.button').val(' - ');
        $(this).parent().parent().next().find('.button').attr('class','button jianbtn');
    });
    $(document).on('click','.jianbtn',function(){
        $(this).parent().parent().remove();
    });
</script>    

</body>
</html>