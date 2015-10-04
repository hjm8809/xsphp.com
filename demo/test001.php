
<?php  echo "<h1>内容:";
    	if(isset($_POST['cbd'])){
    	echo $_POST['cbd']; 
    	}else{echo "无值";}
    	echo "<br />";
    	print_r($_POST);
    	echo "</h1>";
    	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>新建网页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="布尔教育 http://www.itbool.com" />
</head>
    <body>
    	
    	<form method="post" >
    		<input type="text" name="cbd"  />
    		<input type="submit" value="提交" />
    	</form>
    	

    </body>
</html>