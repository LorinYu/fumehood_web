<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	
	<head>
		<meta charset="UTF-8">
		<title>智能通风柜控制系统</title>
		<link rel="stylesheet" type="text/css" href="/project1/Public/zui.min.css" media="all">
		<link rel="stylesheet" type="text/css" href="/project1/Public/zui-theme.min.css" media="all">
		<script type="text/javascript" src="/project1/Public/jquery.min.js"></script>
	    	<script type="text/javascript" src="/project1/Public/zui.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div style="width: 500px;margin: 0 auto;margin-top: 150px;">
			<div class="panel panel-primary">
  				<div class="panel-heading">
					<h1>智能通风柜控制系统登录界面</h1>
  				</div>
  				<div class="panel-body">
				        <form method="post">
					<input class="form-control input-lg" type="text" name="username" placeholder="请填写用户名" autocomplete="off" style="margin-bottom: 10px;"/>
					<br>
					<input class="form-control input-lg" type="password" name="password" placeholder="请填写密码" autocomplete="off"  style="margin-bottom: 10px;"/>
					<br>
					<input class="btn btn-lg btn-primary" type="submit" class="login-btn" value="登 录" style="margin-left: 100px; margin-right: 100px;"/>
					<input class="btn btn-lg" type="button" class="login-btn" value="取 消" />
					</form>
  				</div>
			</div>
			</div>
		</div>
		
		<script type="text/javascript">
			/* 登陆表单获取焦点变色 */
			$(".login-form").on("focus", "input", function() {
				$(this).closest('.item').addClass('focus');
			}).on("blur", "input", function() {
				$(this).closest('.item').removeClass('focus');
			});
		</script>
	</body>

</html>