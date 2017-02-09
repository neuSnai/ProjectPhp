

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>管理系统</title>
    <base href="<?php echo base_url();?>"/>
    <link href="public/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/main-min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header" style="height:100px; margin-top: -20px;">
<br />
    <div align="center" style="margin-top: 1px;" >
        <table width="100%"><tr><td width="100%" align="left" height="30">
                    <!--<img src="resource/assets/img/yusenlogo.png" width="200" height="30"/>-->
                </td></tr></table><div class="dl-log" style="color:#fff; font-weight:bold; padding:0px;opacity 0.5; background-color:#999;background: transparent;">
            欢迎您，<span class="dl-log-user" >
            管理员
            </span>
            <a style="color:#FFF;font-weight:bold;" href="Index/logout" title="退出系统" class="dl-log-quit">[退出]</a>
    </div></div>
    <div class="dl-title" style="height:20px">

    </div>

</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">用户管理</div></li>
        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
</div>
<script type="text/javascript" src="public/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="public/js/bui-min.js"></script>
<script type="text/javascript" src="public/js/common/main-min.js"></script>
<script type="text/javascript" src="public/js/config-min.js"></script>


<script >
	BUI.use('common/main',function(){
		var config = "";
		// 管理员菜单
			var config = [
                {
                    "id": "1",
                    "homePage": "11",
                    "menu": [
                        {
                            "text": "用户管理",
                            "items": [
                                {
                                    "id": "11",
                                    "text": "查看所有用户",
                                    "href": "<?php echo base_url();?>UserController/show"
                                }
                            ]
                        }
                    ]
                }




			];

        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
</body>
</html>