<?php
Class IndexAction extends Action {
	Public function Index() {
		//读数据库,改刀数组,循环输出
		if(!$list = S('index_list')){	//如果缓存'index_lis'不存在,则走数据库
			//1st. hd_cate 中cid=0的所有数据
			$db = M('cate');
			$where = array('pid'=>0);
			$list = $db->where($where)->order('sort')->select();
			$cate = $db->select();
			import('Class.Category',APP_PATH);
			foreach ($list as $k=>$v){
				$cids = Category::getChildsId($cate,$v['id']);
				$cids[] = $v['id'];
				$field=array('id','title','time');
				$where = array('cid'=>array('IN',$cids));
				//事实证明, $list[$k]['blog'] !=$v['blog']
				$list[$k]['blog'] = M('blog')->order('time DESC')->field($field)->where($where)->limit('5')->select();
			}S('index_list',$list,10);	//将$list(数组)缓存到'index_list'中,缓存时间一天
		}
		
		$this->list = $list;
		$this->display();
	}

		
}

?>