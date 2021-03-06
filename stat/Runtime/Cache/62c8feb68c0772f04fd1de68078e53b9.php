<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN"><head>
    <meta charset="UTF-8">
    <meta content="麻将" name="description">
    <meta content="" name="author">
    <meta content="webkit" name="renderer">	<meta content="IE=Edge,chrome=1" http-equiv="X-UA-Compatible">	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <title> 同乐乐麻将 </title>
	
	<link href="<?php echo (CSS_PATH); ?>order.css" rel="stylesheet">
    <link href="<?php echo (CSS_PATH); ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo (CSS_PATH); ?>metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo (CSS_PATH); ?>dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo (CSS_PATH); ?>dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo (CSS_PATH); ?>sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo (CSS_PATH); ?>font-awesome.min.css" rel="stylesheet">


    <script src="<?php echo (JS_PATH); ?>jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo (JS_PATH); ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo (JS_PATH); ?>metisMenu.min.js" type="text/javascript"></script>
    <script src="<?php echo (JS_PATH); ?>jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo (JS_PATH); ?>dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo (JS_PATH); ?>sb-admin-2.js" type="text/javascript"></script>
	<script src="__PUBLIC__/My97DatePicker/WdatePicker.js" type="text/javascript"></script> 



</head>
<body>

<nav style="margin-bottom: 0" role="navigation" class="navbar navbar-default navbar-static-top">
    <div class="navbar-header">
        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">同乐乐麻将</a>
		<a href="#" class="navbar-brand"><th> 钻石剩余： </th><td><?php echo ($user_cardnum["card_num"]); ?></td></a> 
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username'];?></a>
                </li>
                <!--li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li-->
                <li class="divider"></li>
                <li><a href="<?php echo U('Login/logout');?>"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;退 出</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
	
	<div role="navigation" class="navbar-default sidebar">
        <div class="sidebar-nav navbar-collapse">
            <ul id="side-menu" class="nav">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" placeholder="Search..." class="form-control">
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-tiny-pad">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
				
				<?php if(is_array($show_lanmu)): $i = 0; $__LIST__ = $show_lanmu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sl): $mod = ($i % 2 );++$i;?><li <?php if(($sl["id"]) == $left_css): ?>class="active"<?php endif; ?>>
                    <a href="#"><i class="fa <?php echo ($sl["lanmu_css"]); ?> fa-fw"></i><?php echo ($sl["lanmu_name"]); ?><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse <?php if(($sl["id"]) == $left_css): ?>in<?php endif; ?>">
                        <?php if(is_array($sl["sub"])): $i = 0; $__LIST__ = $sl["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slsub): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo ($slsub["url"]); ?>"><?php echo ($slsub["lanmu_name"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
</nav>	

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">栏目管理</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if($caozuo["add"] == 1): ?><a class="btn btn-primary btn-sm" href="<?php echo U('User/lanmu_add');?>"><i class="fa fa-plus"></i> 添加栏目</a><?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>栏目名称</th>
									<th>栏目层级</th>
									<th>栏目方法</th>
									<th>栏目操作</th>
									<th>栏目样式</th>
									<th>栏目排序</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                            <td><?php echo ($vo["id"]); ?></td>
                                            <td><b><?php echo ($vo["lanmu_name"]); ?></b></td>
											<td><?php echo ($vo["lanmu_num"]); ?></td>
											<td><?php echo ($vo["lanmu_m"]); ?></td>
											<td><?php echo ($vo["lanmu_a"]); ?></td>
											<td><?php echo ($vo["lanmu_css"]); ?></td>
											<td><?php echo ($vo["lanmu_sort"]); ?></td>
                                            <td><?php echo ($vo["addtime"]); ?></td>
                                            <td><?php if($caozuo["edit"] == 1): ?><a href="<?php echo U('User/lanmu_edit','id='.$vo['id']);?>">修改栏目</a><?php endif; ?>&nbsp;<?php if($caozuo["del"] == 1): ?><a onclick="return confirm('您确定删除该纪录吗？')" href="<?php echo U('User/lanmu_delete','id='.$vo['id']);?>">删除栏目</a><?php endif; ?></td>
                                        </tr>
											<?php if(is_array($vo["sub"])): $i = 0; $__LIST__ = $vo["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><tr>
												<td><?php echo ($vo1["id"]); ?></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo1["lanmu_name"]); ?></td>
												<td><?php echo ($vo1["lanmu_num"]); ?></td>
												<td><?php echo ($vo1["lanmu_m"]); ?></td>
												<td><?php echo ($vo1["lanmu_a"]); ?></td>
												<td><?php echo ($vo1["lanmu_css"]); ?></td>
												<td><?php echo ($vo1["lanmu_sort"]); ?></td>
												<td><?php echo ($vo1["addtime"]); ?></td>
												<td><?php if($caozuo["edit"] == 1): ?><a href="<?php echo U('User/lanmu_edit','id='.$vo1['id']);?>">修改栏目</a><?php endif; ?>&nbsp;<?php if($caozuo["del"] == 1): ?><a onclick="return confirm('您确定删除该纪录吗？')" href="<?php echo U('User/lanmu_delete','id='.$vo1['id']);?>">删除栏目</a><?php endif; ?></td>
											</tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>
</html>