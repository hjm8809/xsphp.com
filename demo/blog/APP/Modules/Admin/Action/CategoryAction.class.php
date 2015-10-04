<?php
Class CategoryAction extends CommonAction{

	Public function index(){
		$cate = M('cate')->order('sort')->select();
		import('Class/Category',APP_PATH);
		$this->cate = Category::unlimitedForLevel($cate);
		// $cate = Category::unlimitedForLayer($cate);
		// $cate = Category::getParents($cate,18);
		// $cate = Category::getChildsId($cate,3);
		// p($cate);die;
		$this->display();
	}

	Public function cateAdd(){
		$this->pid = I('pid',0,'intval');
		$this->display();
	}

	Public function runCateAdd(){
		if(M('cate')->data($_POST)->add()){
			$this->success('添加成功',U(GROUP_NAME.'/Category/index'));
		}else{
			$this->error('插入失败');
		}
	}

	Public function sortCate(){
		foreach($_POST as $id=>$sort){
			M('cate')->where(array('id'=>$id))->setField('sort',$sort);
		}
		$this->redirect(GROUP_NAME.'/Category/index');
	}

	Public function delete() {
		$where = array('id'=>$_GET['id']);
		if(M('cate')->where($where)->delete()){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}

?>