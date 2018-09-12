<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/Public/ad/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/custom-plugins/picklist/picklist.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/plugins/select2/select2.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/plugins/ibutton/jquery.ibutton.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/plugins/cleditor/jquery.cleditor.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/Public/ad/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Public/ad/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Public/ad/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Public/ad/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Public/ad/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Public/ad/css/my2.css" media="screen">

<title>MWS Admin - Form Elements</title>

</head>

<body>

	<!-- Themer (Remove if not needed) -->  
	<div id="mws-themer">
        <div id="mws-themer-content">
        	<div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle">
                <i class="icon-bended-arrow-left"></i> 
                <i class="icon-bended-arrow-right"></i>
            </div>
        	<div id="mws-theme-presets-container" class="mws-themer-section">
	        	<label for="mws-theme-presets">Color Presets</label>
            </div>
            <div class="mws-themer-separator"></div>
        	<div id="mws-theme-pattern-container" class="mws-themer-section">
	        	<label for="mws-theme-patterns">Background</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
	            <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
            </div>
        </div>
        <div id="mws-themer-css-dialog">
        	<form class="mws-form">
            	<div class="mws-form-row">
		        	<div class="mws-form-item">
                    	<textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<a href='/index.php/Admin/index/index'><img src="/Public/ad/images/mws-logo.png" alt="mws admin"></a>
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src='/ThinkPhp/<?php echo ((isset($_SESSION['adminuser']['pic']) && ($_SESSION['adminuser']['pic'] !== ""))?($_SESSION['adminuser']['pic']):"/Public/Upload/aaa.jpg"); ?>' alt="User Photo">

                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello,<?php echo ((isset($_SESSION['adminuser']['name']) && ($_SESSION['adminuser']['name'] !== ""))?($_SESSION['adminuser']['name']):'Admin'); ?>
                    </div>
                    <ul>
                    	<li><a href="/index.php/Admin/index/index">Profile</a></li>
                        <li><a href="/index.php/Admin/index/changepass">Change Password</a></li>
                        <li><a href="/index.php/Admin/login/outlogin">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper  导航栏 -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    
                    <li class="active">
                        <a href="/index.php/Admin/adminuser/index"><i class="icon-user"></i> 管理员模块</a>
                        <ul>
                            <li>
                                <a href="/index.php/Admin/adminuser/index">
                                    <i style='margin-left:-12px' class="icon-github-3">
                                    </i>
                                    Layouts(浏览管理员)
                                </a>
                            </li>

                            <li>
                                <a href="/index.php/Admin/adminuser/add">
                                    <i style='margin-left:-12px' class="icon-add-contact">
                                    </i>
                                    Elements(添加管理员)
                                </a>
                            </li>

                            <li>
                                <a href="/index.php/Admin/adminuser/group">
                                    <i style='margin-left:-12px' class="icon-users"></i>
                                    Wizard(管理员分组)
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="active">
                        <a href="/index.php/Admin/cate/index"><i class="icol-emoticon-grin"></i> 分块管理</a>
                        <ul>
                            <li>
                                <a href="/index.php/Admin/cate/index">
                                    <i style='margin-left:-12px' class="icol-emoticon-wink">
                                    </i>
                                    Layouts(浏览分区)
                                </a>
                            </li>

                            <li>
                                <a href="/index.php/Admin/cate/add">
                                    <i style='margin-left:-12px' class="icol-emoticon-waii">
                                    </i>
                                    Elements(添加分区)
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="active">
                        <a href="/index.php/Admin/tag/index"><i class="icon-pacman"></i> 商品标签</a>
                        <ul>
                            <li>
                                <a href="/index.php/Admin/tag/index">
                                    <i style='margin-left:-12px' class="icon-tag">
                                    </i>
                                    Layouts(标签列表)
                                </a>
                            </li>

                            <li>
                                <a href="/index.php/Admin/val/index">
                                    <i style='margin-left:-12px' class="icon-tags">
                                    </i>
                                    Elements(标签值列表)
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="active">
                        <a href="/index.php/Admin/good/index"><i class="icon-shopping-cart"></i> 商品管理</a>
                        <ul>
                            <li>
                                <a href="/index.php/Admin/good/index">
                                    <i style='margin-left:-12px' class="icon-reddit">
                                    </i>
                                    Layouts(浏览商品)
                                </a>
                            </li>

                            <li>
                                <a href="/index.php/Admin/good/add">
                                    <i style='margin-left:-12px' class="icon-t-shirt">
                                    </i>
                                    Elements(添加商品)
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="/index.php/Admin/order/index"><i class="icon-shopping-cart"></i> 订单管理</a>
                        <ul>
                            <li>
                                <a href="/index.php/Admin/order/index">
                                    <i style='margin-left:-12px' class="icon-reddit">
                                    </i>
                                    Layouts(浏览订单)
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="/index.php/Admin/order/index"><i class="icon-shopping-cart"></i> 订单管理</a>
                        <ul>
                            <li>
                                <a href="/index.php/Admin/picc/index">
                                    <i style='margin-left:-12px' class="icon-reddit">
                                    </i>
                                    Layouts(浏览轮播图)
                                </a>
                            </li>

                            <li>
                                <a href="/index.php/Admin/picc/add">
                                    <i style='margin-left:-12px' class="icon-reddit">
                                    </i>
                                    Layouts(上传轮播图)
                                </a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start 主题内容开始 -->
        

<div id="mws-container" class="clearfix">

<!-- Inner Container Start -->
<div class="container">
    <!-- 信息提示 -->
        <?php if(count($_SESSION["jump"]["success"]) > 0): ?><div class="mws-form-message success">
		<ol>
			<?php echo success();?>

		</ol>
	</div><?php endif; ?>

<?php if(count($_SESSION["jump"]["error"]) > 0): ?><div class="mws-form-message error">
		
		<ul>
			<?php echo error();?>
		</ul>

	</div><?php endif; ?>
    <!-- 信息提示 -->
<!-- 管理员列表 -->
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>
                <i class="icon-table"></i>商品列表
            </span>
        </div>

        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                <form action='/index.php/Admin/Good/index' method='get'>
                    <div id="DataTables_Table_1_length" class="dataTables_length">
                        <label>Show 
                            <select size="1" name="size" aria-controls="DataTables_Table_1">
                                <option value="2" <?php if($_GET["size"] == 2): endif; ?>>2</option>
                                <option value="12" <?php if($_GET["size"] == 12): endif; ?>>12</option>
                                <option value="14" <?php if($_GET["size"] == 14): endif; ?>>14</option>
                                <option value="16" <?php if($_GET["size"] == 16): endif; ?>>16</option>
                                <option value="18" <?php if($_GET["size"] == 18): endif; ?>>18</option>
                                <option value="20" <?php if($_GET["size"] == 20): endif; ?>>20</option>
                            </select> entries
                        </label>
                    </div>

                    <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>Search: <input value = '' onclick='this.value=""' name = 'name' type="text" aria-controls="DataTables_Table_1">
                            
                            <button class='btn btn-primary'>搜索</button>
                        </label>
                    </div>
                </form>

                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                    <thead>
                        <tr role="row">
                            <th width='10%' class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 133px;">ID
                            </th>

                             <th width='10%' class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 133px;">Cate
                            </th>


                            <th width='30%' class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 133px;">Pic
                            </th>

                            <th width='30%' class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 133px;">Name
                            </th>

                            <th width='30%' class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 133px;">Company
                            </th>

                            <th width='30%' class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 133px;">Sale
                            </th>

                            <th width='30%' class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 133px;">Click Num
                            </th>

                            <th width='30%' class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 133px;">Staus
                            </th>

                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 178px;">Desc
                            </th>

                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 165px;">Action
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php if(is_array($list)): foreach($list as $k=>$vo): if($k%2 == 0): ?><tr class="odd">
                            <?php else: ?>
                                <tr class="even"><?php endif; ?>
                                <td class="  "><?php echo ($vo['id']); ?></td>
                                <td class="  "><?php echo ($vo['cate']); ?></td>
                                <td class="  " width='8%'><img src="<?php echo ($vo['path']); ?>" alt=""></td>
                                <td class="  ">
                                    
                                    <div class="btn-group">

                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            <?php echo ($vo['name']); ?><span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu pull-right" style='width:320px;'>
                                            <?php if(is_array($vo["sku"])): foreach($vo["sku"] as $key=>$sku): ?><li style='width:320px;'>
                                                    <a href="#">
                                                        <img src="<?php echo ($sku['path']); ?>" width="40px">
                                                        <?php echo ($sku['skuid']); ?>
                                                        <?php echo ($sku['price']); ?>$
                                                        <?php echo ($sku['num']); ?>件
                                                    </a>
                                                </li><?php endforeach; endif; ?>

                                        </ul>

                                    </div>
                                
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Search Music Online</a></li>
                                        <li><a href="#">Music News</a></li>
                                        <li><a href="#">Exit Media Player</a></li>
                                    </ul>

                                </td>
                                <td class="  "><?php echo ($vo['company']); ?></td>
                                <td class="  "><?php echo ($vo['sale']); ?></td>
                                <td class="  "><?php echo ($vo['clicknum']); ?></td>
                                <td class="  "><?php echo goodStatus($vo['status']);?></td>
                                <td class="  ">
                                    <div class="" rel="popover" data-trigger="hover" data-placement="left" data-content="<?php echo ($vo['desc']); ?>" data-original-title="Good Desc"><?php echo (substr($vo['desc'],0,15)); ?>...</div>

                                </td>
                                
                                <td class=" " width='15%'>
                                    <a href="/index.php/Admin/Good/action/id/<?php echo ($vo['id']); ?>"><i class='btn btn-danger btn-small'>上架 /下架</i></a> 
                                    <a href="/index.php/Admin/Good/editDetail/id/<?php echo ($vo['id']); ?>"><i class='btn btn-warning btn-small'>更改详情</i></a> 
                                </td>
                            </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
                
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                <?php echo ($url); ?>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Inner Container End -->
                   
        <!-- Footer -->
        <div id="mws-footer">
            welcome to myweb
        </div>
        
    </div>


        <!-- Main Container End 主题内容结束-->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/Public/ad/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/Public/ad/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/Public/ad/js/libs/jquery.placeholder.min.js"></script>
    <script src="/Public/ad/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/Public/ad/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/Public/ad/jui/jquery-ui.custom.min.js"></script>
    <script src="/Public/ad/jui/js/jquery.ui.touch-punch.js"></script>

    <script src="/Public/ad/jui/js/globalize/globalize.js"></script>
    <script src="/Public/ad/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="/Public/ad/custom-plugins/picklist/picklist.min.js"></script>
    <script src="/Public/ad/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="/Public/ad/plugins/select2/select2.min.js"></script>
    <script src="/Public/ad/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/Public/ad/plugins/validate/jquery.validate-min.js"></script>
    <script src="/Public/ad/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="/Public/ad/plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="/Public/ad/plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="/Public/ad/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="/Public/ad/plugins/cleditor/jquery.cleditor.icon.min.js"></script>

    <!-- Core Script -->
    <script src="/Public/ad/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/ad/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/Public/ad/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/Public/ad/js/demo/demo.formelements.js"></script>
    <script src="/Public/ad/js/demo/demo.widget.js"></script>
    
    <script type="text/javascript">
         //获取当前页数
        var p = <?php echo ($p); ?>;
        $('#DataTables_Table_1_paginate a').each(function(){
            if(p==$(this).html()){
                $(this).addClass('paginate_active');//paginate_button
            }else{
                $(this).addClass('paginate_button');//paginate_button
            }
            console.log(p);

        });
    </script>

</body>
</html>