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
                <div class="panel" style="margin-top: 5px;">
                        <div class="panel-heading">
                                <span>用户数据</span>
                                <a class="btn btn-primary" href="<?php echo U('edit');?>" style="margin-left: 725px;">新建用户</a>
                        </div>
                        <table class="table table-bordered table-hover">
                        <thead>
                                        <tr>
                                                <th style="text-align: center;">序号</th>
                                                <th style="text-align: center;">用户名称</th>
                                                <th style="text-align: center;">最近登录时间</th>
                                                <th style="text-align: center;">编辑</th>
                                        </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($userdata)): $i = 0; $__LIST__ = $userdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                                <td style="text-align: center;"><?php echo ($vo["user_id"]); ?></td>
                                                <td style="text-align: center;"><?php echo ($vo["user_name"]); ?></td>
                                                <td style="text-align: center;"><?php echo (date('Y-m-d H:i:s',$vo["lastlogin"])); ?></td>
                                                <td style="text-align: center;">
                                                        <a class="btn btn-primary" href="<?php echo U('edit',array('user_id'=>$vo[user_id]));?>">修改资料</a>
                                                        <a class="btn btn-danger" onclick="deleteuser('<?php echo ($vo[user_id]); ?>')">删除用户</a>
                                                </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                    </table>
                </div>
                <div style="float: right;">
                        <ul class="pager"><li><?php echo ($_page); ?></li></ul>
                </div>
        </div>

		
        <script>
                $(function(){
                       $("#li3").addClass("active");        
                });
        function deleteuser(user_id){
                //alert(user_id);
                $.ajax({
                        url:"<?php echo U('Home/Index/deleteuser');?>",
                        type:"post",
                        data:{
                                user_id:user_id,
                        },
                        //dataType:"text",
                        success:function(re){
                        if(re.status == 1)
                        {
                                alert(re.info);
                                window.location.reload();
                        }
                                else 
                        {
                                alert(re.info);
                        }
                        }
                });
                
        }
        </script>

	</body>
</html>