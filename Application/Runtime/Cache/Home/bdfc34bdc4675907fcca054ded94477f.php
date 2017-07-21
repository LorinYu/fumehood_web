<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>智能通风柜控制系统</title>
		<link rel="stylesheet" type="text/css" href="/Public/zui.min.css" media="all">
		<link rel="stylesheet" type="text/css" href="/Public/zui-theme.min.css" media="all">
		<script type="text/javascript" src="/Public/jquery.min.js"></script>
	    	<script type="text/javascript" src="/Public/zui.min.js"></script>
	    			
	</head>
	<body>
		
			<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<!-- 导航头部 -->
    				<div class="navbar-header">
    				<!-- 品牌名称或logo -->
      					<a class="navbar-brand" href="<?php echo U('Home/Index/index');?>">智能通风柜控制系统</a>
    				</div>
    				<div class="collapse navbar-collapse navbar-collapse-example">
      					<ul class="nav navbar-nav">
				        	<li id="li1"><a href="<?php echo U('Home/Index/machine');?>">远程监控</a></li>
				        	<li id="li2"><a href="<?php echo U('Home/Index/history');?>">使用记录</a></li>
				        	<?php if($_SESSION['name']== admin): ?><li id="li3"><a href="<?php echo U('Home/Index/user');?>">用户管理</a></li><?php endif; ?>
				                <!--<li><a class="activenow" href="<?php echo U('Home/Index/user');?>">编辑用户</a></li>-->
				                <!--<li><a href="<?php echo U('Home/Index/timer');?>">测试时钟</a></li>-->
				        </ul>
				        <ul class="nav navbar-nav navbar-right">
				                <li><a href="<?php echo U('Home/Index/timer');?>"><?php echo (session('name')); ?></a></li>
				                <li><a href="<?php echo U('Home/Index/index');?>">退出登录</a></li>
				        	<!--<li style="float: right;"><a><?php echo ($username); ?></a></li>-->
					</ul>
     					<!-- 导航中的表单 -->
      					<!--<form class="navbar-form navbar-left" role="search">
        				<div class="form-group">
          					<input type="text" class="form-control" placeholder="搜索">
        				</div>
        				<button type="submit" class="btn btn-default">搜索</button>
      					</form>-->
    				
    				</div>	
    				
			</div>	
			</nav>
		
		        
                <div class="container">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                        编辑用户
                                </div>
                                <div class="panel-body">
                                        <form method="post">
                                        <div class="form-group">
                                                <label class="col-md-2">编辑姓名：</label>
                                                <div class="col-md-10">
                                                        <?php if($userdata['user_name'] == admin): ?><input class="form-control input-lg" type="text" name="username" value="<?php echo ($userdata["user_name"]); ?>" autocomplete="off" style="margin-bottom: 10px;" readonly/>
                                                        <?php else: ?>        
                                                        <input class="form-control input-lg" type="text" name="username" value="<?php echo ($userdata["user_name"]); ?>" autocomplete="off" style="margin-bottom: 10px;"/><?php endif; ?>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-2 control-label">编辑密码：</label>
                                                <div class="col-md-10">
                                                        <input class="form-control input-lg" type="text" name="password" value="<?php echo ($userdata["user_password"]); ?>" autocomplete="off"  style="margin-bottom: 10px;"/>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <div class="form-group">
                                                <div class="col-md-4">
                                                        <input class="btn btn-lg btn-primary" type="submit" class="login-btn" value="确 定" style="margin-left: 190px; margin-right: 100px;"/>
                                                </div>
                                                <div class="col-md-6">
                                                        <a class="btn btn-lg btn-danger" onclick="window.history.go(-1)">返 回</a>
                                                </div>
                                        </form>
                                </div>
                        </div>




                </div>
        
		
        
	</body>
</html>