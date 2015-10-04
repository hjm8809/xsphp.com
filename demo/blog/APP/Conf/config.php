<?php
return array(
	//'配置项'=>'配置值'
	'APP_GROUP_LIST'=>'Index,Admin',
	'DEFAULT_GROUP'	=>'Index',
	'APP_GROUP_MODE'=>1,
	'APP_GROUP_PATH'=>'Modules',

	'LOAD_EXT_CONFIG'=>'verify,water',

	/* 数据库设置 */
	'DB_TYPE'				=>'mysql',
	'DB_HOST'				=>'localhost',
	'DB_NAME'				=>'blog',
	'DB_USER'				=>'root',
	'DB_PWD'				=>'111111',
	'DB_PREFIX'				=>'hd_',

	// 'SHOW_PAGE_TRACE' 		=>true,

	'URL_MODEL'=>2,

	'URL_ROUTER_ON'	=> true,
	'URL_ROUTE_RULES'	=> array(
			//将localhost/blog/index.php/c/9 路由到
			//localhost/blog/index.php/Index/List/index/id/9 
			// 'c/:id'	=>	'Index/List/index',

			'/^c_(\d+)$/'	=>	'Index/List/index?id=:1',
			':id\d'		=>	'Index/Show/index',

		),

	
);
?>