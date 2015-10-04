<?php
return array(
	'TMPL_PARSE_STRING'=>array(
				'__PUBLIC__'	=>	__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Tpl/Public',
					),
	'APP_AUTOLOAD_PATH' => '@.TagLib',
	'TAGLIB_BUILD_IN' => 'Cx,Hd',
	


	//开启静态缓存
	'HTML_CACHE_ON'	=>TRUE,
	//设置静态缓存规则
	'HTML_CACHE_RULES'	=>array(
		//Show控制器下的index方法,缓存到Show_index_id.html文件,缓存3600秒
		'Show:index' =>array('{:module}_{:action}_{id}',10),
		),

	//开启动态缓存方式 File/Memcache/Redis

	'DATA_CACHE_TYPE'	=>'File', //默认值,缓存会存到Runtime/Temp下
/*
	或:
	'DATA_CACHE_TYPE'	=>'Memcache',
	'MEMCACHE_HOST'		=>'127.0.0.1',
	'MEMCACHE_PORT'		=> 11211,
	或:
	'DATA_CACHE_TYPE'	=>'Redis',
	'MEMCACHE_HOST'		=>'127.0.0.1',
	'MEMCACHE_PORT'		=> 6379,
*/
);
?>