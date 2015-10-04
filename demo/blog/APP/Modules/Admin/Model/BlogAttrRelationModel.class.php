<?php

Class BlogAttrRelationModel extends RelationModel{

	Protected $tableName = 'blog';
	Protected $_link = array(
			'attr' => array(
				/**
				 * 关联表间的关系[以主表blog为中心]
				 * 一对一 HAS_ONE
				 * 一对多 HAS_MANY
				 * 多对一 BELONGS_TO
				 * 多对多 MANY_TO_MANY
				 */
				'mapping_type' => MANY_TO_MANY,
				'mapping_name' => 'attr',
				'foreign_key' => 'bid',
				'relation_foreign_key' => 'aid',
				'relation_table' => 'hd_blog_attr',
				),
			'cate' => array(
				'mapping_type' => BELONGS_TO,
				'foreign_key' => 'cid',
				'mapping_fields' => 'name',//仅显示 name 字段
				),
		);
}

?>