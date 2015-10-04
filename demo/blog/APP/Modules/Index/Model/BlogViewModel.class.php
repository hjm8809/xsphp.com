<?php

Class BlogViewModel extends ViewModel {

	Protected $viewFields = array(
		'blog' => array(
			'id','title','time','click','summary','cid',
			'_type' => 'LEFT',
			),
		'cate' => array(
			'name',
			'_on' => 'blog.cid = cate.id ',
			),
		);
}

?>