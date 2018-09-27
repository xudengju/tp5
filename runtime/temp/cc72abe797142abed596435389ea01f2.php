<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/index\view\one\show.html";i:1537672407;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>展示</title>
    <base href="/static/index/">
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
</head>
<style type="text/css">
          .top{
              width: 100%;
              height: 30px;
              background: yellow;
          }
        .but{
            background: green;
            height: 30px;
            float: right;
        }
</style>
<body>
       <div class="top">
               <button class="but">签到</button>
       </div>
</body>
</html>
<script type="text/javascript">
        $(".but").click(function(){
                var msg1 = 1;
            $.ajax({
                type: "POST",
                url: "<?php echo url('show'); ?>",
                data: "msg="+msg1,
                success: function(msg){
                    alert(msg);
                }
            });
        })
</script>