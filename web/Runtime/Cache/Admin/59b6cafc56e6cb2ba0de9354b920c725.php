<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<ul>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li><?php echo ($vo['cate']); ?></li>
			<ol>
				<?php if(is_array($vo["sub"])): foreach($vo["sub"] as $key=>$voo): ?><li><?php echo ($voo['cate']); ?></li>
					<dl>
						<li>xxxx</li>
					</dl><?php endforeach; endif; ?>
			</ol><?php endforeach; endif; ?>
	</ul>
</body>
</html>