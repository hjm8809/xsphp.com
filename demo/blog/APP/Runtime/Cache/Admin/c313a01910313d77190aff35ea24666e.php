<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>验证码设置</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<form action="<?php echo U('System/updateVerify');?>"  method="post">
	<table class="table">
		<tr>
			<td colspan="2" align="center"><strong>验证码配置</strong></td>
		</tr>
		<tr>
			<td align="right">验证码长度</td>
			<td>
				<input type="text" name="VERIFY_LENGTH" value='<?php echo (C("verify_length")); ?>' />
			</td>
		</tr>
		<tr>
			<td align="right">验证码宽度(像素)</td>
			<td>
					<input type="text" name="verify_width" value="<?php echo (C("verify_width")); ?>" />
				
			</td>
		</tr>
		<tr>
			<td align="right">验证码图片高度(像素)</td>
			<td>
					<input type="text" name="VERIFY_HEIGHT" value="<?php echo (C("VERIFY_HEIGHT")); ?>" />
				
			</td>
		</tr>
		<tr>
			<td align="right">验证码背影颜色(16进制色值)</td>
			<td>
					<input type="text" name="VERIFY_BGCOLOR" value="<?php echo (C("VERIFY_BGCOLOR")); ?>" />
				
			</td>
		</tr>
		<tr>
			<td align="right">验证码字体文件(当前目录为网站根目录)</td>
			<td>
					<input type="text" name="VERIFY_FONTFILE" value="<?php echo (C("VERIFY_FONTFILE")); ?>" />
				
			</td>
		</tr>
		<tr>
			<td align="right">验证码字体大小</td>
			<td>
					<input type="text" name="VERIFY_SIZE" value="<?php echo (C("VERIFY_SIZE")); ?>" />
				
			</td>
		</tr>
		<tr>
			<td align="right">验证码字体颜色(16进制色值)</td>
			<td>
					<input type="text" name="VERIFY_COLOR" value="<?php echo (C("VERIFY_COLOR")); ?>" />
				
			</td>
		</tr>
		<tr><td colspan="2" align="center"><input type="submit" value="提交" /></td></tr>
	</table>
		<input type="hidden" name="VERIFY_SEED" value="<?php echo (C("VERIFY_SEED")); ?>" />
		<input type="hidden" name="VERIFY_NAME" value="<?php echo (C("VERIFY_NAME")); ?>" />
		<input type="hidden" name="VERIFY_FUNC" value="<?php echo (C("VERIFY_FUNC")); ?>" />
	</form>
</body>
</html>