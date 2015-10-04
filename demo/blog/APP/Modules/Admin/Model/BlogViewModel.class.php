<?php

Class BlogViewModel extends ViewModel {

	Public $viewFields = array(
		'blog'=>array(
				'id','click','title','summary','content','cid',
				'_type'=>'LEFT',
			),
		'cate'=>array(
				'name',
				'_on'=>'blog.cid=cate.id',
			),
		);
}

?>