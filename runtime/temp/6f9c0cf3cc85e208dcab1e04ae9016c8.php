<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\goods\add.html";i:1524226501;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/static/admin/"/>     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加商品</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/goods.css" />
    <script type="text/javascript" charset="utf-8" src="ue/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ue/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="ue/lang/zh-cn/zh-cn.js"></script>
<style>
/*    #editordiv div{
        display: block;
    }                            */

</style>    
<script type="text/javascript">
            $(function () {
                window.onload = function ()
                {
                    var $li = $('#tab li');
                    var $ul = $('.condiv');

                    $li.click(function () {
                        var $this = $(this);
                        var $t = $this.index();
                        //	alert($t);
                        $li.removeClass();
                        $this.addClass('current');
                        $ul.css('display', 'none');
                        $ul.eq($t).css('display', 'block');
                        if( $t==1 ){
                            $('#editordiv div').css('display', 'block');
                            $('#edui1_toolbarmsg').css('display','none');
                        }
                    });
                }
            });
            //console.log($("span").parents().text());
          
        </script>
    </head>
    <body>
        <div id="pageAll">
            <div class="pageTop">
                <div class="page">
                    <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                            href="<?php echo url('Goods/index'); ?>">商品管理</a>&nbsp;-</span>&nbsp;添加商品
                </div>
            </div>
            <div class="page ">
                <!-- 会员注册页面样式 -->
                <form action="<?php echo url('Goods/add_do'); ?>" method="post"  enctype="multipart/form-data" >
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
                    <div class="banneradd bor">
                        <!--				<div class="baTopNo">
                                                                <span>添加商品</span>
                                                        </div>-->

                        <ul id="tab">
                            <li class="current">商品基本信息</li>
                            <li>详细描述</li>
                            <li>其他信息</li>
                            <li>商品属性</li>
                            <li>商品相册</li>
                        </ul>
                        <div id="content">
                             <!-- 通用信息 start-->
                            <div class="condiv" style="display:block">
                                		
        <table width="90%" id="general-table" align="center" >
			<tbody>
				<tr>
					<td class="label">商品名称：</td>
					<td><input type="text" name="goods_name" value="诺基亚N85" size="30"><span class="require-field">*</span></td>
				</tr>
				<tr>
					<td class="label">商品货号： </td>
					<td><input type="text" name="goods_sn" value="" size="20" ><span id="goods_sn_notice"></span><br>
					<span class="notice-span" style="display:block" id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span></td>
			</tr>
			<tr>
				<td class="label">商品分类：</td>
				<td>
					<select name="cat_id" >
						<option value="0">请选择...</option>
                                                 <?php
                                                if( $cate_data){
                                                foreach( $cate_data as $val){
                                                ?>    
						<option value="<?=$val['cate_id']?>"><?php echo str_repeat('├─ ',$val['level']);?><?=$val['cate_name']?></option>
                                                <?php }} ?>
					</select>
                 </td>
			</tr>
			<tr>
				<td class="label">商品品牌：</td>
				<td>
					<select name="brand_id">
						<option value="0">请选择...</option>
                                                <?php
                                                if( $brand_data){
                                                foreach( $brand_data as $val){
                                                ?>    
						<option value="<?=$val['brand_id']?>" ><?=$val['brand_name']?></option>
						<?php }} ?>
					</select>
				</td>
			</tr>
          
            <tr>
				<td class="label">本店售价：</td>
				<td><input type="text" name="shop_price" value="3010.00" size="20" onblur="priceSetted()">
				
			</tr>
			<tr>
            <td class="label">会员价格：</td>
            <td><input type="text" name="user_price" value="3010.00" size="20" onblur="priceSetted()"></td>
          </tr>

          <tr>
            <td class="label">市场售价：</td>
            <td><input type="text" name="market_price" value="3612.00" size="20">
              
            </td>
          </tr>
    
          <tr>
            <td class="label"><label for="is_promote"><input type="checkbox" id="is_promote" name="is_promote" value="1" checked="checked" onclick="handlePromote(this.checked);"> 促销价：</label></td>
            <td id="promote_3"><input type="text" id="promote_1" name="promote_price" value="2750.00" size="20"></td>
          </tr>
          <tr id="promote_4">
            <td class="label" id="promote_5">促销日期：</td>
            <td id="promote_6">
              <input name="promote_start_date" type="text" id="promote_start_date" size="12" value="2009-06-01" readonly="readonly"><input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('promote_start_date', '%Y-%m-%d', false, false, 'selbtn1');" value="选择" class="button"> - <input name="promote_end_date" type="text" id="promote_end_date" size="12" value="2014-11-30" readonly="readonly"><input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('promote_end_date', '%Y-%m-%d', false, false, 'selbtn2');" value="选择" class="button">
            </td>
          </tr>
          <tr>
            <td class="label">上传商品图片：</td>
            <td>
              <input type="file" name="goods_img" size="35">
                              <a href="goods.php?act=show_image&amp;img_url=images/200905/goods_img/32_G_1242110760868.jpg" target="_blank"><img src="images/yes.gif" border="0"></a>
                            <br><input type="text" size="40" value="商品图片外部URL" style="color:#aaa;" onfocus="if (this.value == '商品图片外部URL'){this.value='http://';this.style.color='#000';}" name="goods_img_url">
            </td>
          </tr>
          <tr id="auto_thumb_1">
            <td class="label"> 上传商品缩略图：</td>
            <td id="auto_thumb_3">
              <input type="file" name="goods_thumb" size="35" >
                              <a href="goods.php?act=show_image&amp;img_url=images/200905/thumb_img/32_thumb_G_1242110760196.jpg" target="_blank"><img src="images/yes.gif" border="0"></a>
                            <br><input type="text" size="40" value="商品缩略图外部URL" style="color:#aaa;" onfocus="if (this.value == '商品缩略图外部URL'){this.value='http://';this.style.color='#000';}" name="goods_thumb_url" >
                            <br><label for="auto_thumb"><input type="checkbox" id="auto_thumb" name="auto_thumb" checked="true" value="1" onclick="handleAutoThumb(this.checked)">自动生成商品缩略图</label>            </td>
          </tr>
        </tbody></table>
                                                 
                            </div>
                             <!-- 通用信息 end-->
                            <!-- 编辑器详细信息 start-->
                            <div class="condiv" id="editordiv" style="display: none">

                                <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
                            </div>
                            <!-- 编辑器详细信息 end-->
                 <!-- 其他信息 start-->            
                <div  class="condiv" style="display: none">

                     <!-- 其他信息 -->
                     <table width="90%" id="mix-table"  align="center">
                         <tbody>
                            <tr>
                                 <td class="label">商品重量：</td>
                                 <td><input type="text" name="goods_weight" value="" size="20"> <select name="weight_unit"><option value="1">千克</option><option value="0.001" selected="">克</option></select></td>
                            </tr>
                            <tr>
                                 <td class="label">商品库存数量：</td>
                                 <!--            <td><input type="text" name="goods_number" value="4" size="20" readonly="readonly" /><br />-->
                                 <td><input type="text" name="goods_number" value="4" size="20"><br>
                                             <span class="notice-span" style="display:block" id="noticeStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
                            </tr>
                            <tr>
                                                 <td class="label">库存警告数量：</td>
                                                 <td><input type="text" name="warn_number" value="1" size="20"></td>
                            </tr>
                            <tr>
                                <td class="label">加入推荐：</td>
                                <td><input type="checkbox" name="is_best" value="1" checked="checked">精品 <input type="checkbox" name="is_new" value="1" checked="checked">新品 <input type="checkbox" name="is_hot" value="1" checked="checked">热销</td>
                            </tr>
                            <tr id="alone_sale_1">
                                <td class="label" id="alone_sale_2">上架：</td>
                                <td id="alone_sale_3"><input type="checkbox" name="is_on_sale" value="1" checked="checked"> 打勾表示允许销售，否则不允许销售。</td>
                            </tr>
                            <tr>
                                <td class="label">能作为普通商品销售：</td>
                                <td><input type="checkbox" name="is_alone_sale" value="1" checked="checked"> 打勾表示能作为普通商品销售，否则只能作为配件或赠品销售。</td>
                            </tr>
                            <tr>
                                <td class="label">是否为免运费商品</td>
                                <td><input type="checkbox" name="is_shipping" value="1"> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。</td>
                            </tr>
                            <tr>
                                <td class="label">商品关键词：</td>
                                <td><input type="text" name="keywords" value="2008年10月 GSM,850,900,1800,1900 黑色" size="40"> 用空格分隔</td>
                            </tr>
                            <tr>
                                <td class="label">商品简单描述：</td>
                                <td><textarea name="goods_brief" cols="40" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td class="label">商家备注： </td>
                                <td><textarea name="seller_note" cols="40" rows="3"></textarea><br>
                                <span class="notice-span" style="display:block" id="noticeSellerNote">仅供商家自己看的信息</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
                 
     <!-- 其他信息 end-->                          
    <!-- 商品属性start -->                     
       <div class="condiv" style="display: none">

           <!-- 商品属性 -->
           <table width="90%" id="properties-table"  align="center">
               <tbody>
                   <tr>
                       <td class="label">商品类型：</td>
                       <td>
                           <select class='goods_type' name="goods_type" >
                               <option value="0">请选择商品类型</option>
                               <?php
                               if($type_data){
                               foreach($type_data as $val){
                               ?>
                               <option value="<?=$val['type_id']?>"><?=$val['type_name']?></option>
                               <?php }} ?>					
                           </select><br>
                               <span class="notice-span" style="display:block" id="noticeGoodsType">请选择商品的所属类型，进而完善此商品的属性</span>
                       </td>
                   </tr>
                   <tr>
                       <td id="tbody-goodsAttr" colspan="2" style="padding:0">
                           
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                       </td>

       </div>
    <!-- 商品属性 end -->
     <!-- 商品相册start -->
        <div class="condiv" style="display: none">                          
        <table width="90%" id="gallery-table" align="center">
          <tbody><tr>
            <td>
<!--            <div id="gallery_41" style="float:left; text-align:center; border: 1px solid #DADADA; margin: 4px; padding:2px;">
                <a href="javascript:;" onclick="if (confirm('您确实要删除该图片吗？')) dropImg('41')">[-]</a><br>
                <a href="goods.php?act=show_image&amp;img_url=images/200905/goods_img/32_P_1242110760641.jpg" target="_blank">
                <img src="../images/200905/thumb_img/32_thumb_P_1242110760997.jpg" width="100" height="100" border="0">
                </a><br>
                <input type="text" value="" size="15" name="old_img_desc[41]">
            </div>-->
                          </td>
          </tr>
          <tr><td>&nbsp;</td></tr>
          <tr>
            <td>
              <a href="javascript:;" onclick="addSpec(this)">[+]</a>
              图片描述 <input type="text" name="goods_img_desc[]" size="20">
              上传文件 <input type="file" name="img_url[]">
              <input type="text" size="40" value="或者输入外部图片链接地址" style="color:#aaa;" onfocus="if (this.value == '或者输入外部图片链接地址'){this.value='http://';this.style.color='#000';}" name="goods_link[]">
            </td>
          </tr>
        </tbody></table>
                               
                               
        </div>
     <!--商品相册 end-->
                        </div>
                        
                   
                        <p align="center">
                        <button class="button_ok" href="#">提交</button>
                        <button type="reset" class="button_ok button_no" >取消</button>
                        </p>
                                                          
                    </div>
                    </form>
            </div>
            
            <!-- 会员注册页面样式end -->
        </div>
<script type="text/javascript">
    //编辑器实例化
    var ue = UE.getEditor('editor');
    $('.goods_type').change(function() {
        var type_id = $(this).val();
//       alert(type_id);die;
        if (type_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo url('Type/getAttrbute'); ?>",
            data: "type_id=" + type_id,
            success: function (msg) {
                $('#tbody-goodsAttr').html(msg);
            }
        });
    }
    });
    /**
     * 规格追加一行
     * @param {type} obj
     * @returns {undefined}
     */
    function addSpec(obj){
       var copycon = $(obj).parent().parent().clone();
       //alert(copycon);
       $(obj).parent().parent().after(copycon);
       $(obj).parent().parent().next().find('a').text('[ - ]');
       $(obj).parent().parent().next().find('a').attr('onclick','lessSpec(this)');
    } 
    /**
     * 删除行
     * @param {type} obj
     * @returns {undefined}
     */
    function lessSpec(obj){
        $(obj).parent().parent().remove();
    }
    
    
    
    
    $(document).on('change','.goods_type',function(){
        var typeid = $(this).val();
        if( typeid ){
            $.ajax({
                type: "POST",
                url: "<?php echo url('Type/getAttribute'); ?>",
                data: "typeid="+typeid,
                success: function(msg){
                   $('#tbody-goodsAttr').html(msg);
                }
             });
        }
    });

    //追加一行
    function addSpec(obj){
      //  alert('123');
        var nextnode = $(obj).parent().parent().clone();
        $(obj).parent().parent().after(nextnode);
        $(obj).parent().parent().next().find('a').text('[ - ]');
        $(obj).parent().parent().next().find('a').attr('onclick','lessSpec(this)');
       // alert(nextnode);
    }
    //减一行
    function lessSpec(obj){
        $(obj).parent().parent().remove();
    }

</script>
    </body>
</html>