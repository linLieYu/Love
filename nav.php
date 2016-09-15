<?php
$url = 'template/nav/index.html';
$test = file_get_contents($url);
$h1 =str_replace("2ii.ME",$_POST['h1'],str_replace("个人引导页演示",$_POST['p'],str_replace("#twitter",$_POST['twitter'],str_replace("2ii.me -个人引导页",$_POST['title'],str_replace("#facebook",$_POST['facebook'],str_replace("https://www.2ii.me",$_POST['net'],$test))))));
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="user-scalable=no, width=500">
<title>WeDo在线工具包 (ノ≧∇≦)ノ -个人引导页生成</title><link rel="icon" href="img/logo.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#333333">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
<meta name="referrer" content="always">
<link rel="stylesheet" media="screen, projection" href="wedo.css" />
<link href="style.css" rel="stylesheet" type="text/css"/>
<!-- 为使用方便，直接使用jquery.js库 -->
<script src="jy/jquery.js"></script>
<!-- 引入封装了failback的接口 initGeetest -->
<script src="https://static.geetest.com/static/tools/gt.js"></script>
<!-- Loading Bootstrap -->
<link href="dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Loading Flat UI -->
<link href="dist/css/flat-ui.css" rel="stylesheet">
<div class="overlay tran"></div>
<div class="header shadow">
  <a href="#"><img class="logo" src="img/logo.png"></a>
    <div class="filter">
</div>
    <div class="half left">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="new tran" href="https://www.2ii.me/" style="color: rgb(54, 70, 86);">WeDo</a>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <a class="new tran" href="http://shang.qq.com/wpa/qunwpa?idkey=d813b90f4d9278443b65175d697bb6da45fe96cfb57fe5b31866a358d5cf31f2" target="_blank" style="color: rgb(54, 70, 86);">加入QQ群</a>
    </div>
    <div class="half right">
      <a class="new tran" href="http://idc.2ii.me" style="color: rgb(54, 70, 86);">免费试用高速主机</a></div>
    </div>
  <div class="message shadow tran">
  </div>
  <br />
<center><a href="http://t.2ii.me/template/nav/index.html" target="_blank"><img width="50%" height="50%" src="img/nav.jpg"></a></center><br />
<form action = "nav.php#id1" method = "post">
  <center>网页标题:<input type="text" placeholder="" class="form-control" name="title" /></center>
  <br />
  <center>网页第一行标题(h1):<input type="text" placeholder="" class="form-control" name="h1"/></center>
  <br />
  <center>网页第二行标题:<input type="text" placeholder="" class="form-control" name="p" /></center>
  <br />
  <center>推特链接(可选):<input type="text" placeholder="" class="form-control" name="twitter"/></center>
  <br />
  <center>脸书链接(可选):<input type="text" placeholder="" class="form-control" name="facebook"/></center>
  <br />
  <center>你的网站链接(可选):<input type="text" placeholder="" class="form-control" name="net"/></center>
  <br />
  <center>自定义网址:<?php echo $_SERVER['HTTP_HOST'].'/' ?><input type="text" name="www" style="width:100px";/>.html</center>
  <div class="form-group has-success" id=id1>
    <?php
    $_POST['www']=trim($_POST['www']);
    if(isset($_POST['submit'])){
      echo '<br />';
      if($_POST['www']=='index'){
        echo '<center>小伙子,你的行为很像小学生呐</center>';
      }else{
      if($_POST['www']!=''){
        $diy=$_POST['www'].'.html';
        file_put_contents($diy,$h1);
        echo '<center><a href="'.$diy.'" target="_blank"><input class="form-control" type="button" value="点击预览"/></a></center>';
      }else{
        $a=(microtime(true)*10000).'.html';
        file_put_contents($a,$h1);
        echo '<center><a href="'.$a.'" target="_blank"><input class="form-control" type="button" value="点击预览"/></a></center>';
      }
    }
  }
    ?>
  </div>
  <style>
  #float-captcha {
      width: 268px;
      margin: 0 auto;
  }
  </style>
  <div id="float-captcha"></div>
  <center><p id="wait" class="show">正在加载验证码......</p></center>
  <center><br /><p id="notice" class="hide">请先拖动验证码到相应位置</p></center>
  <center><a href="http://t.2ii.me/template/nav/index.html" target="_blank"><input type="button" class="btn btn-embossed btn-primary" value="查看演示"/></a>&nbsp;&nbsp;
  <input type="submit" class="btn btn-embossed btn-primary" name="submit" id="float-submit" value="生成网页" /></center>
</form>
<script>
    var handlerEmbed = function (captchaObj) {
        $("#float-submit").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#float-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        });
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };
    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "jy/web/StartCaptchaServlet.php?t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                product: "float", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
            }, handlerEmbed);
        }
    });
</script>
