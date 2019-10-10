<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:98:"/www/wwwroot/serv.huihuagongxue.top/IS/public/../application/origin/view/sdcfetch/record_info.html";i:1564737408;s:79:"/www/wwwroot/serv.huihuagongxue.top/IS/application/origin/view/public/head.html";i:1564733160;s:84:"/www/wwwroot/serv.huihuagongxue.top/IS/application/origin/view/public/nav_login.html";i:1566468789;s:79:"/www/wwwroot/serv.huihuagongxue.top/IS/application/origin/view/public/foot.html";i:1566445837;}*/ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="format-detection" content="telephone=no">
<meta name="theme-color" content="#282828"/>
<meta property="og:type" content="website">
<!-- 图标 -->
<link href="/IS/public/static/ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon" sizes="144x144">
<link href="/IS/public/static/ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon" sizes="114x114">
<link href="/IS/public/static/ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon" sizes="72x72">
<link href="/IS/public/static/ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon">
<link href="/IS/public/static/ico/favicon.png" rel="shortcut icon">
<!-- jQuery (Bootstrap 插件需要引入) -->
<script src="/IS/public/static/js/runoob.jquery.js"></script>
<script src="/IS/public/static/js/jquery.cookie.js"></script>
<!-- LayUI-->
<script src="/IS/public/static/layui/layui.all.js"></script>
<link rel="stylesheet" href="/IS/public/static/layui/css/layui.css">
<!-- CSS 文件 -->
<link rel="stylesheet" href="/IS/public/static/css/fontawesome.min.css">
<link rel="stylesheet" href="/IS/public/static/css/animate.min.css">
<link rel="stylesheet" href="/IS/public/static/css/fancybox.min.css">
<link rel="stylesheet" href="/IS/public/static/css/odometer.min.css">
<link rel="stylesheet" href="/IS/public/static/css/swiper.min.css">
<link rel="stylesheet" href="/IS/public/static/css/bootstrap.min.css">
<link rel="stylesheet" href="/IS/public/static/css/style.css">
<link rel="stylesheet" href="/IS/public/static/css/simple-line-icons.css">
<title>工学部综合系统-自律委查勤系统</title>
<script type="text/javascript">
	var seed=$.cookie();
	$().ready(function(){
		if(seed.status!=200){
			document.cookie="SDC_type=index";
			setTimeout("location.href='/IS/public/LoginSDC'");//跳转登录
		}else{
			document.cookie = "SDC_type=''; expires=Thu, 01 Jan 1970 00:00:00 GMT";
			var a=$("<h4>你好："+seed.name+"</h4>");
            a.appendTo("#a");
			var b=$("<small><a href='' id='quit'>退出登录</a></small>");
            b.appendTo("#a");
		}
	});
	$().ready(function(){
		$().ready(function(){
			var url = location.search; //获取url中"?"符后的字串  
			url=decodeURI(url);
   			var theRequest = new Object();  
			if (url.indexOf("?") != -1) {  
				var str = url.substr(1);  
				strs = str.split("&");  
      			for(var i = 0; i < strs.length; i ++) {  
					theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);  
      			}  
			}  
			var creed_name=theRequest.name;
			var creed_myid=theRequest.myid;
			var creed_classes=theRequest.classes;
			var cre_name=$("<option value="+creed_name+">"+creed_name+"</option>");
            cre_name.appendTo("#name");
			var cre_myid=$("<option value="+creed_myid+">"+creed_myid+"</option>");
            cre_myid.appendTo("#myid");
			var cre_classes=$("<option value="+creed_classes+">"+creed_classes+"</option>");
            cre_classes.appendTo("#classes");
		});
  		$("#press").click(function(){
			var name=$("#name").val();
			var myid=$("#myid").val();
			var classes=$("#classes").val();
			var is_afl=$("#is_afl").val();
			var ps=$("#ps").val();
			var judge=seed.name;
  			$.ajax({
				url:"<?php echo url('origin/sdc/insert_absent'); ?>",
	  			async:true,
				type:'post',
				dataType:'json',
				data:{
					name:name,
					myid:myid,
					classes:classes,
					is_afl:is_afl,
					ps:ps,
					judge:judge
				},
				success(res){
					if(res==0){
						alert("记录成功！");
						setTimeout("location.href='/IS/public/SDC'");//成功后跳转回
					}else if(res==1){
						alert("任何一项填写不能为空！");
					}else if(res==2){
						alert("请在早7:00-8:00，晚7:00-8:00查勤！");
					}
				}
			});
  		});
	});
</script>
</head>
<body>
	<!--加载动画-->
<script type="text/javascript">
	var seed=$.cookie();
	$().ready(function(){
		var id=seed.id;
		var rand_num=seed.rand_num;
		$.ajax({
			url:"<?php echo url('origin/issimlogin/is_sim_login'); ?>",
			async:true,
			type:'post',
			dataType:'json',
			data:{
				id:id,
				rand_num:rand_num
			},
			success(res){
				if(res.is_sim_login==true){
					alert("此账号在其他地方登录！请重新登录！");
					document.cookie = "id=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
					document.cookie = "name=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
					document.cookie = "myid=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
					document.cookie = "classes=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
					document.cookie = "status=1; expires=Thu, 01 Jan 1970 00:00:00 GMT";
					document.cookie = "rand_num=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
					document.cookie = "user_type=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
					setTimeout("location.href='/IS/public/'");
				}
			}	
		});
	});
</script>
	<div class="preloader">
		<div class="layer"></div>
  		<div class="inner">
    		<figure><img src="/IS/public/static/images/preloader.gif" alt="Image"></figure>
    		<p><span class="text-rotater" data-text="汇华学院 | 工学部 | 极客联盟">加载</span></p>
  		</div> 
	</div>
	<!--/加载动画-->
	<div class="transition-overlay">
  		<div class="layer"></div>
	</div>
	<!--手机版本侧边栏-->
	<div class="side-navigation">
		<!--手机版本导航栏-->
  		<div class="menu">
    		<ul>
      			<li><a href="/IS/public/">主页</a></li>
      			<li>
					<a>第二课堂</a>
        			<ul>
          				<li><a href="/IS/public/secondclass">新课程</a></li>
          				<li><a href="/IS/public/lecturers">讲师列表</a></li>
						<li><a href="/IS/public/tutoriallist">微课堂报名</a></li>
          				<li><a href="/IS/public/search">查讯报名情况</a></li>
        			</ul>
      			</li>
      			<li>
					<a>综合测评</a>
        			<ul>
          				<li><a href="/IS/public/origin">综合测评</a></li>
          				<li><a href="/IS/public/sign_PK">贫困生报名</a></li>
          				<li><a href="/IS/public/origin_PK">贫困生测评</a></li>
          				<li><a href="/IS/public/origin_BW">班委测评</a></li>
        			</ul>
      			</li>
      			<li>
					<a>时光信箱</a>
        			<ul>
          				<li><a href="/IS/public/TimePoffice">公开信</a></li>
          				<li><a href="/IS/public/TimeLetter">时光信件</a></li>
          				<li><a href="/IS/public/FutureLetterList">信件提取</a></li>
        			</ul>
      			</li>
				<li><a href="/IS/public/SDC">自律委查勤系统</a></li>
      			<li><a href="/IS/public/forum">论坛</a></li>
      			<li><a href="">联系我们</a></li>
    		</ul>
  		</div>
  		<!--/手机版本导航栏-->
  		<div class="side-content">
    		<figure> <img src="/IS/public/static/images/logo-light.png" alt="Image"> </figure>
    		<p>开发者：Shane</p>
    		<ul class="gallery">
      			<li><a href="/IS/public/static/images/developer1.jpg" data-fancybox><img src="/IS/public/static/images/developer1.jpg" alt="Image"></a></li>
    		</ul>
    		<address>河北师范大学汇华学院</address>
    		<h6>QQ：1109571639</h6>
    		<p><a>特别感谢：Rex</a></p>
			<ul class="gallery">
      			<li><a href="/IS/public/static/images/developer2.jpg" data-fancybox><img src="/IS/public/static/images/developer2.jpg" alt="Image"></a></li>
    		</ul>
			<h6>QQ：321257088</h6>
    		<ul class="social-media">
      			<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
      			<li><a href="#"><i class="fab fa-twitter"></i></a></li>
      			<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
      			<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
      			<li><a href="#"><i class="fab fa-youtube"></i></a></li>
    		</ul>
    		<small>© 2019 汇华学院 | 极客联盟Shane</small> 
		</div> 
	</div>
	<!--/手机版本侧边栏-->
	<!-- 电脑本导航栏 -->
	<nav class="navbar">
  		<div class="container">
    		<div class="upper-side">
				<!--图标-->
      			<div class="logo"> 
					<a href="/IS/public/"><img src="/IS/public/static/images/logo-light.png" alt="Image"></a> 
				</div>
				<div class="phone-email" id="a"> 
					<!--姓名放在这里-->
						<!--退出按钮放这里-->
				</div>
				<div class="language"> <a>CH</a><small>Only For CH</small></div>
      			<div class="hamburger"> <span></span> <span></span> <span></span><span></span> </div> 
    		</div>
    		<!-- 一级导航栏 -->
    		<div class="menu">
      			<ul>
        			<li><a href="/IS/public/">主页</a></li>
        			<li>
						<a>第二课堂</a>
          				<ul>
            				<li><a href="/IS/public/secondclass">新课程</a></li>
            				<li><a href="/IS/public/lecturers">讲师列表</a></li>
							<li><a href="/IS/public/tutoriallist">微课堂报名</a></li>
            				<li><a href="/IS/public/search">查讯报名情况</a></li>
          				</ul>
        			</li>
        			<li>
						<a>综合测评</a>
          				<ul>
            				<li><a href="/IS/public/origin">综合测评</a></li>
            				<li><a href="/IS/public/sign_PK">贫困生报名</a></li>
            				<li><a href="/IS/public/origin_PK">贫困生测评</a></li>
							<li><a href="/IS/public/origin_BW">班委测评</a></li>
          				</ul>
        			</li>
        			<li>
						<a>时光信箱</a>
          				<ul>
            				<li><a href="/IS/public/TimePoffice">公开信</a></li>
          					<li><a href="/IS/public/TimeLetter">时光信件</a></li>
          					<li><a href="/IS/public/FutureLetterList">信件提取</a></li>
          				</ul>
        			</li>
					<li><a href="/IS/public/SDC">自律委查勤系统</a></li>
        			<li><a href="/IS/public/forum">论坛</a></li>
        			<li><a href="">联系我们</a></li>
      			</ul>
    		</div>
    		<!-- / 一级导航栏 -->
  		</div>
	</nav>
	<!-- /电脑版本导航栏 -->
	<header class="page-header" data-background="/IS/public/static/images/SDC.jpg" data-stellar-background-ratio="1.15">
		<div class="container">
			<h1>查勤系统</h1>
			<p>Check Presence</p>
		  	<ol class="breadcrumb">
    			<li class="breadcrumb-item"><a>查勤</a></li>
    			<li class="breadcrumb-item active" aria-current="page"><a href="/IS/public/SDC">返回</a></li>
  			</ol>
		</div>
	</header>
	<!--报名-->
	<section class="faq">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="accordion" id="accordion" role="tablist">
            			<div class="card">
              				<div class="card-header" role="tab" id="headingOne"> 
								<a id="strong" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<!--名字放这里-->
								</a> 
							</div>
              				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                				<div class="card-body"> 
									<section class="contact">
  										<div class="container">
    										<div class="row align-items-center">
        										<div class="col-lg-6">
        											<div class="contact-form">	
			 											<form id="contact" name="contact" method="post">
          													<div class="form-group">
																<select id="name" class="form-control rounded input-lg text-center no-border">
    															</select>
          													</div>
															<div class="form-group">
																<select id="myid" class="form-control rounded input-lg text-center no-border">
    															</select>
          													</div>
          													<div class="form-group">
																<select id="classes" class="form-control rounded input-lg text-center no-border">
    															</select>
          													</div>
															<div class="form-group">
            													<select id="is_afl" class="form-control rounded input-lg text-center no-border">
																	<option>是否有假条</option>
																	<option value="无">无</option>
																	<option value="有">有</option>
    															</select>
          													</div>
															<div class="form-group">
																<textarea name="ps" id="ps" autocomplete="on" required>未到</textarea>
            													<span>备注</span>
          													</div>
															<button id="press" type="button" class="btn btn-lg btn-success lt b-white b-2x btn-block btn-rounded">
			  														<i class="icon-arrow-right pull-right"></i>
																	<span class="m-r-n-lg">确认</span>
															</button>
        												</form>
        											</div>
        										</div>
   											</div> 
  										</div> 
									</section>
								</div>
              				</div>
            			</div> 
          			</div>
				</div>
				<div class="col-lg-4">
					<aside class="sidebox">
						<i class="fas fa-question-circle"></i>
						<h3>有疑问？</h3>
						<p>如果有疑问，请联系超级管理员Shane</p>
					</aside>
				</div>
			</div>
		</div>
	</section>
	<!--/报名-->
	<!--脚部-->
	<footer class="footer">
  		<div class="container">
    		<div class="row">
      			<div class="col-lg-4 wow fadeInUp" data-wow-delay="0.05s"> 
					<img src="/IS/public/static/images/logo-light.png" alt="Image" class="logo">
        			<p>工学部综合系统IS</p>
      			</div>
      			<div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.10s">
        			<ul class="footer-menu">
          				<li><a href="/IS/public/secondclass">第二课堂</a></li>
          				<li><a href="/IS/public/origin">综合测评</a></li>
          				<li><a href="/IS/public/TimePoffice">时光信箱</a></li>
          				<li><a href="/IS/public/forum">论坛</a></li>
          				<li><a href="#">联系我们</a></li>
        			</ul>
      			</div>
      			<div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.15s">
        			<ul class="footer-menu">
          				<li><a href="http://huihua.hebtu.edu.cn/xxgcxb/">工学部网站</a></li>
          				<li><a href="http://huihua.hebtu.edu.cn/">汇华学院网站</a></li>
          				<li><a href="http://huihua.hebtu.edu.cn/xfz/">学分制系统</a></li>
          				<li><a href="/IS/public/SDC">自律委查勤系统</a></li>
        			</ul>
      			</div>
      			<div class="col-lg-4 wow fadeInUp" data-wow-delay="0.20s">
        			<div class="contact-box">
          				<h5>遇到问题？快联系我</h5>
          				<h3>13315926692</h3>
          				<p><a>1109571639@qq.com</a></p>
          				<ul>
            				<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            				<li><a href="#"><i class="fab fa-twitter"></i></a></li>
            				<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            				<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
            				<li><a href="#"><i class="fab fa-youtube"></i></a></li>
          				</ul>
        			</div>
      			</div>
      			<div class="col-12"> 
					<span class="copyright">© 2019 汇华学院 | 极客联盟Shane</span> 
				</div>
   			 </div>
		</div> 
	</footer>
<!-- JS 文件 --> 
<script src="/IS/public/static/js/jquery.min.js"></script> 
<script src="/IS/public/static/js/popper.min.js"></script> 
<script src="/IS/public/static/js/bootstrap.min.js"></script> 
<script src="/IS/public/static/js/swiper.min.js"></script> 
<script src="/IS/public/static/js/fancybox.min.js"></script> 
<script src="/IS/public/static/js/odometer.min.js"></script> 
<script src="/IS/public/static/js/wow.min.js"></script> 
<script src="/IS/public/static/js/text-rotater.js"></script> 
<script src="/IS/public/static/js/jquery.stellar.js"></script> 
<script src="/IS/public/static/js/isotope.min.js"></script> 
<script src="/IS/public/static/js/scripts.js"></script>

</body>
</html>