<?php
Class ShowAction extends Action {
	Public function Index() {
		$id = $_GET['id'];
		$field = array('id','name','pid');
		$cate = M('cate')->field($field)->order('sort')->select();
		import('Class.Category',APP_PATH);
		$this->parentIds = Category::getParents($cate, $id);

		$where = array('id'=>$id);
		$this->blog = M('blog')->where($where)->find();
		// p($blog);
		$this->display();
	}

	Public function clickNum(){
		$id = (int) $_GET['id'];
		$where =array('id'=>$id);
		$click = M('blog')->where($where)->getField('click');
		M('blog')->where($where)->setInc('click');
		echo 'document.write('.$click.')';
	}
}
?>