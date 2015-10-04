<?php
header("content-type:text/html;charset=utf-i;");
error_reporting(0);
/***
在线词典制作
xml作数据库

***/
/***
1.制作前端查询页
2.查询功能实现
a)载入xml词库
	<wordbook>
	    <item>    
	        <word>cupboard</word>
	        <trans><![CDATA[n. 食橱；碗柜]]></trans>
	        <phonetic><![CDATA[['kʌbəd]]]></phonetic>
	        <tags>CET4-EASY</tags>
	    </item>
	</wordbook>
b)查找对应单词信息
c)输出信息

***/

//2)

if(!empty($_POST['query'])){
	// 实例化>>读取xml>>利用XPATH寻找NodeList>>寻找同级兄弟节点>>输出内容
	//XPATH用法:实例化>>sql语句(返回NodeList)>>执行查询并返还NodeList
	$dom =  new DOMDocument('1.0','utf-8');
	$dom->load('cet4.xml');
	//找出所有word的NodeList
	$xpath = new DOMXPath($dom);
	$sql = "/wordbook/item[word = '". $_POST['query'] ."']/word";
	$rs = $xpath->query($sql);
	$row = array();
	$row['word'] = $rs->item(0)->nodeValue;
	$row['trans'] = $rs->item(0)->nextSibling->nodeValue;
	$row['phonetic'] = $rs->item(0)->nextSibling->nextSibling->nodeValue;
	$row['tags'] = $rs->item(0)->nextSibling->nextSibling->nextSibling->nodeValue;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>新建网页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="布尔教育 http://www.itbool.com" />
</head>
    <body>
    	<div>
    		<div><h1>简洁英汉词典_2.0</h1></div>
    		<p>[cet4词库]测试:cupboard/act/zoo/...</p>
    		<div><form method="post" action="#">
    			<input type="text" name="query"/>
    			<input type="submit" value="查询" />
    			<form/>
    		</div>
    		<div>
    			<table>
    				<tr><td>单词:</td><td> <?php echo $row['word'] ?></td></tr>
    				<tr><td>释义:</td><td><?php echo $row['trans'] ?></td></tr>
    				<tr><td>发音:</td><td><?php echo $row['phonetic'] ?></td></tr>
    				<tr><td>标签</td><td><?php echo $row['tags'] ?></td></tr>
    			</table>
    		</div>	
	</div>
    </body>
</html>