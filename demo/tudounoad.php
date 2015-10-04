<?php
error_reporting(0);
/***
土豆无广告应用
***/

/*
1.获取正常土豆视频地址(含广告)
=====
申请土豆帐号
=>创建新的应用
App Key:23365aeb6a339f06
=>使用API中获取视频信息的方法
http://api.tudou.com/v6/video/info?app_key=23365aeb6a339f06&format=xml&itemCodes=sample
=====
2.通过API获取视频信息(XML格式)
3.分析XML,并获得无广告地址
4.输出
*/
if($_POST['tudou']){
	//1.获取视频的ID	
	$tudou = $_POST['tudou'];
	$id = basename($tudou,'.html');
	$app_key = '23365aeb6a339f06';
	$api = 'http://api.tudou.com/v6/video/info?app_key='.$app_key.'&format=xml&itemCodes='.$id;
	$xml = file_get_contents($api);
	$dom = new DOMdocument('1.0','utf-8');
	$dom->loadxml($xml);
	$nl = $dom->getElementsByTagName('outerGPlayerUrl');
	$tudou2 = $nl->item(0)->textContent;		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>xml demo-利用XML获取无广告土豆视屏</title>
<p></p>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
</head>
    <body>
    	<h1>感觉不会再看土豆广告了</h1>    	
    	<p>测试地址：</p>
    	<table border="1">
	<tr><th>电影名称<th/><th align="center">电影地址<th/></tr>
	<tr><td>《把爱带回家》<td/><td>http://www.tudou.com/albumplay/BvfFAFNLY-Y/c7P9dv3CZ_Y.html<td/></tr>
	<tr><td>《美国好声音》<td/><td>http://www.tudou.com/albumplay/Yo3xFs_fWdY/60l8lu8KVCk.html<td/></tr>
	<tr><td>《没关系是爱情》<td/><td>http://www.tudou.com/albumplay/4Eo9FRy41pw/36f-W_GxW_o.html<td/></tr>
	</table>    	
    	<p>使用说明：通过下方表单,输入土豆视频地址,点击去广告按钮,即可获取无广告视频地址[高清无码]</p>
    	<p>PS:暂不支持电影和动漫频道</p>
    	<hr />
    	<form method="post" >
    	输入视频地址(含广告):<input type='text' name='tudou' size="90" /> 
    	   	<br />
	输出视频地址(去广告):
	<?php 		
	if(!isset($_POST['tudou'])){
		echo '请输入土豆视频链接地址';
	}else if(mb_substr($tudou,0,20)=='http://www.tudou.com'){
	echo $tudou2.' <a target=_blank href ="'.$tudou2.'">传送门</a>';
		}else{ 
			echo '你的输入的地址不是土豆视频或者输入有误,请重新输入';
	} 
	?><br />
	<input type="submit" value='去广告' name='noadvedio' />
   	 </form>
    </body>
</html>