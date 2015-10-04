<?php
Class BlogRelationModel extends RelationModel{
	Protected $tableName = 'blog';

	Protected $_link = array(
		/**
		 * 关联表间的关系[以主表blog为中心]
		 * 一对一 HAS_ONE
		 * 一对多 HAS_MANY
		 * 多对一 BELONGS_TO
		 * 多对多 MANY_TO_MANY
		 */
			'attr' => array(
					'mapping_type' => MANY_TO_MANY,
					'mapping_name' => 'attr',
					'foreign_key' => 'bid',
					'relation_foreign_key' =>'aid',
					'relation_table' => 'hd_blog_attr',
				),
			'cate' => array(
					'mapping_type' => BELONGS_TO,
					'foreign_key' => 'cid',
					'mapping_fields' => 'name', /*过滤字段[此例仅显示name]*/
				),
		);

	Public function getBlog($type = 0) {
		$field = array('id','title','content','time','click','cid');
        $where = array('del'=>$type);
        return $this->field($field)->relation(true)->where($where)->select();
	}
}
?>