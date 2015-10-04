<?php
Class ListAction extends Action {
	Public function Index() {
		import('Class.Category',APP_PATH);
		import('ORG.Util.Page');
		$id = (int) $_GET['id'];
		$cate = M('cate')->order('sort')->select();
		$cids = Category::getChildsId($cate,$id);
		$cids[] = $id;
		// p($cids);die;
		$where = array('cid'=>array('IN',$cids),'del'=>0);
		$count = M('blog')->where($where)->count();
		$page = new Page($count,4);
		$limit = $page->firstRow.','.$page->listRows;
		$this->blog = D('BlogView')->where($where)->limit($limit)->select();
		$this->page = $page->show();
		$this->display();
	}
}

?>