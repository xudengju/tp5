<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\item\show.html";i:1536908236;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品</title>
     <script type="text/javascript" src="http://localhost/tp5.0/public/static/admin/js/jquery.min.js"></script>
</head>
       <style type="text/css">
             body{
             	background: rgb(255,217,168);
             }
              .integral-num{
              	width: 100px;
              	height: 100px;
              	background:rgb(10,20,71);
              	float: left;
              	border-radius:100px; 
              }
              #jf{
              	 color: blue;
              }
              #jfs{
              	 color: red;
              }
              .signin{
              	width: 100px;
              	height: 100px;
              	float: left;
              	background: rgb(10,20,71);
              }
              .uname{
              	width: 1000px;
              	height: 100px;
              	float: left;
              	text-align: center;
              }
              .top{
              	width: 100%;
              	height: 100px;
              	background: rgb(255,217,168);
              }
              .table-box{
              	width: 450px;
              	height: 400px;
              	 margin: auto;
              }
              .table-box td{
              	border-bottom: 1px solid rgb(134,66,8);
              }
              .ws{
              	 width: 100px;
              	 height: 100px;
              }
       </style>

      
<body>
	     
	   <div class="top">
            <div class="integral-num">
                    <p id="jf">&nbsp;&nbsp;&nbsp;我的积分</p> 
                    <p id="jfs">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['integral_num']?>分</p>
            </div>
            <div class="signin">
            	  <image src="http://img2.imgtn.bdimg.com/it/u=2513338122,2519486028&fm=27&gp=0.jpg" width="100" height="70">
                  <button class="qd">签到</button> 
            </div>
            <div class="uname">
                <h1>欢迎<?php echo $_COOKIE['user_name']?>登录</h1>
            </div>
            </div>
              <div class="table-box">
              	 <a href="<?php echo url('buygoods'); ?>">查看已购商品</a>
                     <table>
                         <tr>
                              <td>商品名称：</td>
                              <td>商品logo：</td>
                              <td>商品数量：</td>
                              <td>商品价格：</td>
                              <td>操作</td>
                         </tr>
                         <?php foreach($result as $k=>$v){?>
                           <tr>
                               <td><?php echo $v['goods_name']?></td>
                               <td><image src="<?php echo $v['goods_logo']?>" width="50" height="50"></td>
                               <td><?php echo $v['goods_num']?></td>
                               <td><?php echo $v['goods_price']?></td>
                               <td><a href="<?php echo url('shop'); ?>?id=<?php echo $v['goods_id']?>">购买</a></td>
                          </tr>
                         <?php }?>  
                     </table>
                            <a href="">1</a>
                            <a href="">2</a>
                            <a href="">3</a>
                            <a href="">4</a>
              </div>
</body>
</html>

<script type="text/javascript">
                $(".qd").click(function(){
                     $.ajax({
					   type: "POST",
					   url: "<?php echo url('Item/qd'); ?>",
					   data: "mg="+0,
					   success: function(msg){
					     alert(msg);
					   }
					});
                });
 </script>