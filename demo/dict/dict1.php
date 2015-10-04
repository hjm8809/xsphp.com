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
	// 实例化>>读取xml>>寻找节点列表>>寻找节点>>寻找同级兄弟节点>>输出内容
	$dom =  new DOMDocument('1.0','utf-8');
	$dom->load('cet4.xml');
	//找出所有word的NodeList
	$wordlist = $dom->getElementsByTagName('word');
	// var_dump($dom);echo '<br />'; //object(DOMDocument)[1]
	// var_dump($wordlist);  //object(DOMNodeList)[2]
	// var_dump($wordlist->item(0)); //object(DOMDocument)[3]
	// echo $wordlist->item(0)->textContent;
	
	//循环world标签的NodeList
	foreach ($wordlist as $v){
		if(strtolower($v->nodeValue) == strtolower($_POST['query'])){
		$row = array();
		$row['word'] = $v->nodeValue;
		$row['trans'] = $v->nextSibling->nodeValue;
		$row['phonetic'] = $v->nextSibling->nextSibling->nodeValue;
		$row['tags'] = $v->nextSibling->nextSibling->nextSibling->nodeValue;
		}
	}

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
    		<div><h1>简洁英汉词典_1.0</h1></div>
    		<p>[cet4词库]测试:cupboard</p>
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