<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>智能通风柜控制系统</title>
		<link rel="stylesheet" type="text/css" href="/Public/zui.min.css" media="all">
		<link rel="stylesheet" type="text/css" href="/Public/zui-theme.min.css" media="all">
		<script type="text/javascript" src="/Public/jquery.min.js"></script>
	    	<script type="text/javascript" src="/Public/zui.min.js"></script>
	    	         
        <link href="/Public/zui.datatable.min.css" rel="stylesheet">
        <script src="/Public/zui.datatable.min.js"></script>

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
                        <!--<div class="panel" style="margin-top: 5px;">
                        <div class="panel-heading" style="font-size: 16px;margin-bottom: 20px;">
                                系统控制
                        </div>
                        <div class="panel-body">-->
                                <table class="table datatable">
                                        <thead>
                                                <tr>
                                                        <th>序号</th>
                                                        <th>风机</th>
                                                        <th>开始时间</th>
                                                        <th>使用时长</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                                                <td><?php echo ($vo["id"]); ?></td>
                                                                <td><?php echo ($vo["machine_name"]); ?></td>
                                                                <td><?php echo (date('Y-m-d H:i:s',$vo["start_time"])); ?></td>
                                                                <td><?php echo ($vo["period"]); ?></td>
                                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                </table>
                      <!--  </div>-->
                </div>

		
                        <script>
                        $(function(){
                                $('table.datatable').datatable({sortable: true,checkable: true});
                                $("#li2").addClass("active");  
                        });
                        </script>
                
	</body>
</html>