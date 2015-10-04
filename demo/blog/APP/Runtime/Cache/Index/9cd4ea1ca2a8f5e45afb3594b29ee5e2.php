<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
	<script type="text/JavaScript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
	<script type="text/JavaScript" src='__PUBLIC__/Js/common.js'></script>
	<link rel="stylesheet" href="__PUBLIC__/Css/show.css" />
</head>
<body>
<!--头部-->
	<div class='top-list-wrap'>
		<div class='top-list' style="display:none;">
			<ul class='l-list'>
				<li><a href="http://www.xsphp.com" target='_blank'>XSPHP</a></li>
				<li><a href="http://www.xsphp.com" target='_blank'>XSPHP</a></li>
				<li><a href="http://www.xsphp.com" target='_blank'>XSPHP</a></li>
			</ul>
			<ul class='r-list'>
				<li><a href="http://www.xsphp.com" target='_blank'>XSPHP</a></li>
				<li><a href="http://www.xsphp.com" target='_blank'>XSPHP</a></li>
			</ul>
		</div>
	</div>
	<div class='top-search-wrap'>
		<div class='top-search'>
			<a href="http://www.xsphp.com" target='_blank' class='logo'>
				<img src="__PUBLIC__/Images/logo.png"/>
			</a>
			<div class='search-wrap'>
				<form action="" method='get'>
					<input type="text" name='keyword' class='search-content'/>
					<input type="submit" name='search' value='搜索'/>
				</form>
			</div>
			<a href="<?php echo U('/'.'Admin/');?>"><p style="color:white;text-align:right;">登陆</p></a>
		</div>
	</div>
	<div class='top-nav-wrap'>
		<ul class='nav-lv1'>
			<li class='nav-lv1-li'>
				<a href="__ROOT__" class='top-cate'>博客首页</a>
			</li>
			<?php
 $cate = M('cate')->order('sort')->limit('50')->select(); import('Class.Category',APP_PATH); $cate = Category::unlimitedForLayer($cate); foreach ( $cate as $v ) : ?><li class='nav-lv1-li'>
					<a href="<?php echo U('/c_'.$v["id"]);?>" class='top-cate'><?php echo ($v["name"]); ?></a>
						<ul>
					<?php if(is_array($v["child"])): foreach($v["child"] as $key=>$child): ?><li><a href="<?php echo U('/c_'.$child["id"]);?>"><?php echo ($child["name"]); ?></a></li><?php endforeach; endif; ?>
						</ul>
				</li><?php endforeach; ?>
		</ul>
	</div>

<!--主体-->
	<div class='main'>
		<div class='main-left'>
			<div class='location'>
				<a href="__ROOT__">首页</a>
				<?php if(is_array($parentIds)): foreach($parentIds as $key=>$v): ?>><a href="<?php echo U('/c_'.$v['id']);?>"><?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
			</div>
			<div class="title">
				<p><?php echo ($blog["title"]); ?></p>
				<div>
					<span class='fl'>发布于：<?php echo (date('Y年m月d日',$blog["time"])); ?></span>
					<span class='fr'>已被阅读
						<script src="<?php echo U(GROUP_NAME.'/Show/clickNum',array('id'=>$blog['id']));?>"></script>
						次</span>
				</div>
			</div>
			<div class='content'><?php echo ($blog["content"]); ?></div>
		</div>
	<!--主体右侧-->
		<div class='main-right'>
			<dl>
				<dt>热门博文</dt>
				<?php
 $hots = M('blog')->order('click DESC')->limit('5')->select(); foreach ($hots as $value) : ?><dd>
						<a href="<?php echo U('/'.$value['id']);?>"><?php echo ($value['title']); ?></a>
						<span>(<?php echo ($value['click']); ?>)</span>
					</dd><?php endforeach; ?>
			</dl>

			<dl>
				<dt>最发布发</dt>
				<?php
 $news = M('blog')->order('time DESC')->limit('5')->select(); foreach ($news as $value) : ?><dd>
						<a href="<?php echo U('/'.$value['id']);?>"><?php echo ($value['title']); ?></a>
						<span>(<?php echo ($value['click']); ?>)</span>
					</dd><?php endforeach; ?>
			</dl>

			<dl>
				<dt>友情连接</dt>
				<dd>
					<a href="http://www.xsphp.com">PHPDEMO</a>
				</dd>

				<dd>
					<a href="http://www.baidu.com">百度</a>
				</dd>
				<dd>
					<a href="http://www.163.com">网易</a>
				</dd>
			</dl>
		</div>
	</div>
<!--底部-->
	<div class='bottom'>
		<div></div>
	</div>
</body>
</html>