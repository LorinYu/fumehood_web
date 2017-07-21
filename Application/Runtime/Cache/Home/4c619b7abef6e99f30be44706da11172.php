<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>智能通风柜控制系统</title>
		<link rel="stylesheet" type="text/css" href="/project1/Public/zui.min.css" media="all">
		<link rel="stylesheet" type="text/css" href="/project1/Public/zui-theme.min.css" media="all">
		<script type="text/javascript" src="/project1/Public/jquery.min.js"></script>
	    	<script type="text/javascript" src="/project1/Public/zui.min.js"></script>
	    	
	    	<script type="text/javascript" src="/project1/Public/zui.chart.min.js"></script>
	    	<script type="text/javascript" src="/project1/Public/justgage.1.0.1.min.js"></script>
	    	<script type="text/javascript" src="/project1/Public/raphael.2.1.0.min.js"></script>
	    	
	    	<!---
	    	<!--<script src="/project1/Public/timer/jquery-1.8.3.min.js"></script>
<                <script src="/project1/Public/timer/materialize.min.js"></script>
                <script src="/project1/Public/timer/jquery.timepicker.min.js"></script>
<!--                <script src="/project1/Public/timer/hammer.js"></script>
                <script src="/project1/Public/timer/script.js"></script>
                <script src="/project1/Public/timer/alarm.js"></script>
                <script src="/project1/Public/timer/stopwatch.js"></script>
                <script src="/project1/Public/timer/timer.js"></script>
                <link type="text/css" rel="stylesheet" href="/project1/Public/timer/materialize.min.css">
                <link type="text/css" rel="stylesheet" href="/project1/Public/timer/styles.css">
                <link type="text/css" rel="stylesheet" href="/project1/Public/timer/jquery.timepicker.css">
                --->
	
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
                                时钟
                        </div>
                        <div class="panel-body">
                                
                                <div class="stopwatch">
                                        <form>
                                               <a id="stopwatch-btn-start" class="waves-effect waves-teal btn-flat">开始1</a>
                                               <a id="stopwatch-btn-pause" class="waves-effect waves-teal btn-flat">暂停</a>
                                               <a id="stopwatch-btn-reset" class="waves-effect waves-teal btn-flat">重置</a>
                                        </form>
                                        <div class="clock inactive z-depth-1">
                                                <span>0:00:00.0</span>
                                                <div class="overlay waves-effect">
                                                </div>
                                        </div>
                                </div>
                        
                        </div> 
                </div>-->
                
		<div class="panel" style="margin-top: 5px;">
                        <div class="panel-heading" style="font-size: 16px;margin-bottom: 20px;">
                                远程控制
                        </div>
                        <div class="panel-body"  id="panelbody">
                                <!--    <div class="row">
                                        <div class="col-lg-6">
                                                <div class="row">
                                                        <div class="col-lg-6">
                                                                <a class="btn btn-primary" onclick="alert("功能已经开始，请稍后...")">实验计时</a>
                                                        </div>
                                                        <div class="col-lg-6">
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-lg-6">
                                                                <a class="btn btn-primary" onclick="alert("功能已经开始，请稍后...")">持续排风</a>
                                                        </div>
                                                        <div class="col-lg-6">
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-lg-6">
                                                                <a class="btn btn-primary" onclick="alert("功能已经开始，请稍后...")">LED开关</a>
                                                        </div>
                                                        <div class="col-lg-6">
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-lg-6">
                                                                <a class="btn btn-primary" onclick="alert("功能已经开始，请稍后...")">拍照</a>
                                                        </div>
                                                        <div class="col-lg-6">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                        </div>
                                </div>-->
                                
                                <div class="row">
                                        <div class="col-lg-6" style="padding-top: 20px;">
                                                <div class="row">
                                                        <div class="col-lg-12" style="text-align: center;margin-bottom: 20px;">
                                                                <a id="lightbutton" class="btn btn-primary" onclick="lightbutton()">照明控制</a>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-lg-12" style="text-align: center;margin-bottom: 20px;">
                                                                <a class="btn btn-primary" onclick="takephoto()">拍照</a>
                                                        </div> 
                                                </div>
                                                <div class="row">
                                                        <div class="col-lg-12" style="text-align: center;margin-bottom: 20px;">
                                                                <a class="btn btn-primary" onclick="javascript:alert('功能已经开始，请稍后...')">实验计时</a>
                                                        </div> 
                                                </div> 
                                                 <div class="row">
                                                        <div class="col-lg-12" style="text-align: center;margin-bottom: 20px;">
                                                                <a class="btn btn-primary" onclick="alert("功能已经开始，请稍后...")">持续排风</a>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-6" style="text-align: center;">
                                                <img id="pic1" alt="First slide" src="/project1/Public/pic/pic3.png" width="60%">
                                        </div>
                                 </div>        
                        </div>
                </div>    
                
		<div class="panel" style="margin-top: 5px;">
			<div class="panel-heading" style="font-size: 16px;margin-bottom: 20px;">
               			远程监测
  			</div>
  			<div class="panel-body">
  			<div class="row">
                                <div class="col-md-6">
                                        <!--<table class="table table-hover">
                                                </thead>
                                                        </tr>
                                                                <th style="text-align: center;">序号</th>
                                                                <th style="text-align: center;">门高（厘米）</th>
                                                                <th style="text-align: center;">转速（转/秒）</th>
                                                                <th style="text-align: center;">风速（米/秒）</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                                <td style="text-align: center;"><?php echo ($data["id"]); ?></td>
                                                                <td style="text-align: center;"><?php echo ($data["gate_height"]); ?></td>
                                                                <td style="text-align: center;"><?php echo ($data["rotation_speed"]); ?></td>
                                                                <td style="text-align: center;"><?php echo ($data["wind_speed"]); ?></td>
                                                        </tr>
                                                </tbody>
                                        </table>      -->
                                        <input type="hidden" id="machine_id" value="<?php echo ($machine_id); ?>" />
                                        <div class="cards" style="background-color: #F1F1F1;height: 70px;margin-bottom: 10px;margin-left: 10px;border-radius:5px"> 
                                                <p class="lead" style="vertical-align:middle;">实验计时：00:32:09</p><p></p>
                                        </div>
                                        <div class="cards" style="background-color: #F1F1F1;height: 70px;margin-bottom: 10px;margin-left: 10px;border-radius:5px"> 
                                                <p class="lead">持续排风计时：</p><p></p>
                                        </div> 
                                        <div class="cards" style="background-color: #F1F1F1;height: 70px;margin-bottom: 10px;margin-left: 10px;border-radius:5px"> 
                                                <p class="lead">通风柜门高：&nbsp;&nbsp;<label id="gate_height" style="color: #3f51b5;font-size: 25px;;"></label>&nbsp;&nbsp;cm</p>
                                        </div>  
                                        <div class="cards" style="background-color: #F1F1F1;height: 70px;margin-bottom: 10px;margin-left: 10px;border-radius:5px"> 
                                                <p class="lead">排风机转速：&nbsp;&nbsp;<label id="rotation_speed" style="color: #3f51b5;font-size: 25px;;"></label>&nbsp;&nbsp;r/s</p>
                                        </div>      
                                        <div class="cards" style="background-color: #F1F1F1;height: 70px;margin-bottom: 10px;margin-left: 10px;border-radius:5px"> 
                                                <p class="lead">排风机面风速：&nbsp;&nbsp;<label id="wind_speed" style="color: #3f51b5;font-size: 25px;;"></label>&nbsp;&nbsp;m/s</p>
                                        </div> 
                                        <div class="cards" style="background-color: #F1F1F1;height: 70px;margin-bottom: 10px;margin-left: 10px;border-radius:5px"> 
                                                <p class="lead">工作模式： 
                                                <?php if($data['work_status'] == 0): ?>实验模式
                                                <?php else: ?>观察模式<?php endif; ?>
                                                </p>
                                        </div> 
                                        <div class="cards" style="background-color: #F1F1F1;height: 70px;margin-bottom: 10px;margin-left: 10px;border-radius:5px"> 
                                                <p class="lead">报警状态： 
                                                <?php if($data['alert_status'] == 0): ?>安全
                                                <?php else: ?>警报<?php endif; ?>
                                                </p>
                                        </div> 
                                </div>
                                <div class="col-md-6">
                                        <div class="row" id="g1">
                                        </div>
                                        <div class="row" style="text-align: center;margin-top: 50px;">
                                                <img id="pic2" src="/project1/Public/pic/pic4.png" style="width: 300px;"/>
                                        </div>
                                </div>
                        
  			</div>
                       </div>
		</div>
	        
	        <!--<div style="float: right;">
			<ul class="pager">
  			
  			<li><?php echo ($_page); ?></li>
			</ul>
		</div>
		<div id="" style="text-align: center;">
			<img src="/project1/Public/pic/pic.png"/>
			<p>现场图片</p>
		</div>-->
		
 
		<!--<div class="col-sm-12 col-md-6" id="g2">
                </div>
                </div>
                </div>
                -->
                <div class="panel" style="margin-top: 5px;">
                        <div class="panel-heading" style="font-size: 16px;margin-bottom: 20px;">
                                历史照片
                        </div>
                        <div class="panel-body">
                                <div id="myNiceCarousel" class="carousel slide" data-ride="carousel" style="width: 640px;margin:0 auto;">
                                        <!-- 圆点指示器 -->
                                        <ol class="carousel-indicators">
                                                <li data-target="#myNiceCarousel" data-slide-to="0" class="active"></li>
                                                <li data-target="#myNiceCarousel" data-slide-to="1"></li>
                                                <li data-target="#myNiceCarousel" data-slide-to="2"></li>
                                        </ol>

                                        <!-- 轮播项目 -->
                                        <div class="carousel-inner">
                                                <div class="item active">
                                                        <img alt="First slide" src="/project1/Public/pic/pic1.png">
                                                </div>
                                                <div class="item">
                                                        <img alt="Second slide" src="/project1/Public/pic/pic2.png">
                                                </div>
                                                <div class="item">
                                                        <img alt="Third slide" src="/project1/Public/pic/pic3.png">
                                                </div>
                                        </div>

                                        <!-- 项目切换按钮 -->
                                        <a class="left carousel-control" href="#myNiceCarousel" data-slide="prev">
                                                <span class="icon icon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#myNiceCarousel" data-slide="next">
                                                <span class="icon icon-chevron-right"></span>
                                        </a>
                                </div>
                                
                        </div>
                </div>
                
                
                
        </div>
	
		
	<style>
	        #g1 {
                        width:100%; 
                        height:250px;
                        display: inline-block;
                        border: 1px soild #202020;
                       
                       
                 }
                /*   #g2 {
                width:400px; height:320px;
                display: inline-block;
                margin: 1em;
                border: 1px soild #202020;
                box-shadow: 0px 0px 15px #101010;
                margin-top: 10px;
                border-radius: 8px;
                }*/
        </style>
	<script>
		var g1 = new JustGage({
                      id: "g1", 
                      value: 0, 
                      min: 0,
                      max: 50,
                      title: "排风机转速",
                      label: "r/s",
                      levelColors: [
                             "#3280fc",
                             "#3f51b5",
                             "#CCCCCC"
                      ]    
                });
                
                var machine_id;
                machine_id = $("#machine_id").val();
                
                function dataget(){
                        $.ajax({
                                type : "POST",
                                url:"<?php echo U('Index/getdata');?>",
                                data : {machine_id:machine_id},
                                success: function(data){
                                        //alert(data);
                                        $("#rotation_speed").html(data.rotation_speed);
                                        $("#wind_speed").html(data.wind_speed);
                                        $("#gate_height").html(data.gate_height);
                                        g1.refresh(data.rotation_speed);
                                }
                        });
                       
                }
                
                setTimeout(function() {
                                        dataget();
                                },
                        100);

                setInterval(function() {
                                        dataget();
                                        $("#pic2").attr("src","/project1/Public/pic/pic.png");
                                },
                        3000);
                
                /*var g2 = new JustGage({
                      id: "g2", 
                      value: getRandomInt(30, 50), 
                      min: 0,
                      max: 50,
                      title: "风机转速",
                      div: "r/s",
                      levelColors: [
                             "#3366ff",
                             "#3300ff",
                             "#CCCCCC"
                      ]    
                });
                setInterval(function() {
                    g2.refresh(getRandomInt(30, 50));
                     }, 1000);*/
                var lightstatus = 0;
                function lightbutton() {
                        if (lightstatus == 0) {
                                $("#panelbody").css('background-color','yellow');
                                //$("#lightbutton").html("照明控制 关灯");
                                lightstatus = 1;
                        } else {
                                $("#panelbody").css('background-color','white');
                                //$("#lightbutton").html("照明控制 开灯");
                                lightstatus = 0;
                        }
                }
                function takephoto() {
                        $.ajax({
                                type : "POST",
                                url:"<?php echo U('Index/takephoto');?>",
                                data : {takephotostatus:1},
                                success: function(re){
                                        if (re.status == 1) {
                                                alert("程序正在启动，图片马上更新！"); 
                                                setTimeout(function() {$("#pic1").attr("src","/project1/Public/tfg.jpg");},5000);
                                        }
                                        /*$("#rotation_speed").html(data.rotation_speed);
                                        $("#wind_speed").html(data.wind_speed);
                                        $("#gate_height").html(data.gate_height);
                                        g1.refresh(data.rotation_speed);*/
                                }
                        });        
                }
	</script>
	
	</body>
</html>