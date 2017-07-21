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
                        通风柜设备   
                        </div>
                        <div class="panel-body">
                                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 3 );++$i;?><div class="col-md-4" style="text-align: center;margin-bottom: 20px;">
                                                        <div 
                                                                <?php if($list['status'] == 1): ?>style="border: 3px solid #38B03F;"
                                                                <?php else: ?>style="border: 3px solid #EA644A;"<?php endif; ?>
                                                        >
                                                	<img src="../../../../project1/Public/tfg.jpg" style="width: 257px;height: 366px;"/><br>
                                                        <a 
                                                                <?php if($list['status'] == 1): ?>href="<?php echo U('home/index/data',array('machine_id'=>$list[id]));?>"
                                                                <?php else: ?>href="javascript:void(0);"<?php endif; ?>
                                                        style="display:block;font-size: 20px;"><?php echo ($list["name"]); ?></a>
                                                        </div>
                                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                </div>
        </div>

		
        <script type="text/javascript">
        	$(function(){
        	       $("#li1").addClass("active");        
        	});
        </script>

	</body>
</html>