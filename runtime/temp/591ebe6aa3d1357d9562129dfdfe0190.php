<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\five\register.html";i:1537589722;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <base href="/tp5.0/public/static/index/">
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
</head>
<body>
       <center>
            <h1>用户注册</h1>
           <hr>
           <form action="<?php echo url('Five/register'); ?>" method="post" enctype="multipart/form-data">
             <table>
                  <tr>
                      <td>用户名:</td>
                      <td><input type="text" name="user_name" id="name" placeholder="请输入用户名"><span id="s_name"></span></td>

                  </tr>
                 <tr>
                     <td>密码:</td>
                     <td><input type="password" name="user_pwd" id="upwd" placeholder="请输入密码"><span id="s_pwd"></span></td>
                 </tr>
                 <tr>
                     <td>确认密码:</td>
                     <td><input type="password"  id="rupwd" placeholder="请输入确认密码"><span id="s_rupwd"></span></td>
                 </tr>
                 <tr>
                     <td>头像:</td>
                     <td><input type="file" name="user_image"></td>
                 </tr>
                 <tr>
                     <td>邮箱:</td>
                     <td><input type="email" name="user_email" id="email" placeholder="请输入邮箱"><span id="e_span"></span></td>
                 </tr>
                 <tr>
                     <td colspan="2" align="center"><input type="submit" value="注册"></td>
                 </tr>
             </table>
           </form>

       </center>
</body>
</html>
<script type="text/javascript">
         $("#name").blur(function(){
               var name = $("#name").val();
               if (name!=""){
                   $("#s_name").html("<span style='color: green'>√</span>");
               }else{
                   $("#s_name").html("<span style='color: red'>用户名不能为空</span>");
               }
         });
        $("#upwd").blur(function(){
           var pwd = $("#upwd").val();
            if(pwd.length!=0 && pwd.length>=6){
                var reg = /^[\da-z]|[\dA-Z]|[\d@#!$%^&?*]|[a-zA-Z]|[a-z@#!$%^&?*]|[A-Z@#!$%^&?*]{6,}$/;
                var reg5 = /^[\da-zA-Z]|[\da-z@#!$%^&?*]|[\dA-Z@#!$%^&?*]{6,}$/;
                var reg6 = /^(?!\d+$)(?![a-zA-Z]+$)(?![@#$%^&*?_]+$)[a-zA-Z\d_@#$%^&*?]{6,}$/;
                var reg1 = /^\d{6,}$/;
                var reg2 = /^[a-z]{6,}$/;
                var reg3 = /^[A-Z]{6,}$/;
                var reg4 = /^[@#!$%^&?*]{6,}$/;
                var r = pwd.match(reg);
                var t = pwd.match(reg1);
                var y = pwd.match(reg2);
                var u = pwd.match(reg3);
                var i = pwd.match(reg4);
                var o = pwd.match(reg5);
                var p = pwd.match(reg6);
                if(r!=null||o!=null){
                    $("#s_pwd").html("<span style='color: yellow'>密码安全级别中</span>");
                }
                if(t!=null || y!=null || u!=null || i!=null){
                    $("#s_pwd").html("<span style='color: red'>密码安全级别低</span>");
                }
                if(p!=null){
                    $("#s_pwd").html("<span style='color: green'>密码安全级别高</span>");
                }

            }else{
                $("#s_pwd").html("<span style='color: red'>密码不能为空并且必须大于6个数</span>");
            }
        });
        $("#rupwd").blur(function(){
               var pwd = $("#upwd").val();
               var rupwd = $("#rupwd").val();
               if(pwd==rupwd){
                   $("#s_rupwd").html("<span style='color: green'>√</span>");
               }else{
                   $("#s_rupwd").html("<span style='color: red'>两次密码不符合</span>");
               }
        });
        $("#email").blur(function(){
                 var email = $("#email").val();
                 var re = /^\w{5,}@[a-z0-9]{2,3}\.[a-z]+$|\,$/;
            var r1 = email.match(re);
                 if (r1!=null){
                     $("#e_span").html("<span style='color: green'>√</span>");
                 }else{
                     $("#e_span").html("<span style='color: red'>邮箱不符合规定</span>");
                 }
        });

</script>