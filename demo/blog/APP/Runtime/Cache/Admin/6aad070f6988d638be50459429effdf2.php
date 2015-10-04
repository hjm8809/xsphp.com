<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<!-- 引入配置文件 -->
	<script type="text/javascript" src="__ROOT__/Data/Ueditor/ueditor.config.js"></script>
	<!-- 引入源码文件 -->
	<script type="text/javascript" src="__ROOT__/Data/Ueditor/ueditor.all.min.js"></script>
	<!-- 实例化 -->
	<script type="text/javascript">
			window.UEDITOR_HOME_URL = "__ROOT__/Data/Ueditor/";
			window.onload = function(){
				//图片上传配置区
				window.UEDITOR_CONFIG.imageUrl = "<?php echo U(GROUP_NAME.'/Blog/upload/');?>";   //图片上传提交地址
				window.UEDITOR_CONFIG.imagePath = "__ROOT__/uploads/";           //图片修正地址
				window.UEDITOR_CONFIG.initialFrameHeight = 600;
				window.UEDITOR_CONFIG.initialFrameWidth = 1200;
				window.UEDITOR_CONFIG.initialContent = '<?php echo ($blog['content']); ?>';
				UE.getEditor("content");
			}
	</script>
	<title><?php if($status == 0): ?>添加博文<?php elseif($status == 1): ?>修改博文<?php endif; ?></title>
</head>
<body>
	<form action="<?php echo U(GROUP_NAME.'/Blog/addBlog');?>" method="post" >
		<table class="table">
			<tr>
				<td colspan="2" align="center"><strong><?php if($status == 0): ?>添加博文<?php elseif($status == 1): ?>修改博文<?php endif; ?></strong></td>
			</tr>
			<tr>
				<td align="right">所属分类</td>
				<td>
					<select name="cid" >
						<option value=""><?php echo ($blog['cate']['name']); ?></option>
						<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">博文属性</td>
				<td>
					<?php if(is_array($attr)): foreach($attr as $key=>$attr_v): ?><input type="checkbox" value="<?php echo ($attr_v['id']); ?>" name="aid[]" <?php if(is_array($blog["attr"])): foreach($blog["attr"] as $key=>$blog_v): if($attr_v['name'] == $blog_v['name'] ): ?>checked='checked'<?php endif; endforeach; endif; ?> /><?php echo ($attr_v['name']); ?>&nbsp;&nbsp;<?php endforeach; endif; ?>
				</td>
			</tr>
			<tr>
				<td align="right">点击次数</td>
				<td><input type="text" name="click" value="<?php echo ($blog['click']?$blog['click']:100); ?>" /></td>
			</tr>
			<tr>
				<td align="right">标题</td>
				<td><input type="text" name="title" value="<?php echo ($blog['title']); ?>" /></td>
			</tr>
			<tr>
				<td align="right">概要</td>
				<td><input type="text" name="summary" value="<?php echo ($blog['summary']); ?>" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<textarea id="content" name="content" ></textarea> 
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="<?php if($status == 0): ?>保存添加<?php elseif($status == 1): ?>保存修改<?php endif; ?>" /></td>
			</tr> 
		</table>
			<input type="hidden" name="status" value="<?php echo ($status); ?>" />
			<input type="hidden" name="id" value="<?php echo ($blog['id']); ?>" />
	</form>
</body>
</html>