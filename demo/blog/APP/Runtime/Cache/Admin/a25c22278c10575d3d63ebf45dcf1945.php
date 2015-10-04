<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<title>属性列表</title>
</head>
<body>
	<table class="table">
		<tr>
			<td colspan="4" align="center"><strong>属性列表</strong></td>
		</tr>
		<tr>
			<td>ID</td>
			<td>属性名称</td>
			<td>颜色</td>
			<td>操作</td>
		</tr>
		<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><div style="width:80px; height:20px; background-color:<?php echo ($v["color"]); ?>;"></div></td>
				<td>[<a href="">修改</a>]&nbsp;[<a href="">删除</a>]</td>
			</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>