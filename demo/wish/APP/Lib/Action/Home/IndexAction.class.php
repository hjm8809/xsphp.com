<?php
//HOME的首页
	class IndexAction extends Action{
		public function index(){
		$wish = M('wish')->select();
		$this->assign('wish',$wish)->display();
		}

		public function handle(){
			// p($_POST);
		// if(!IS_AJAX)halt('网页错误__404__');
		$data = array(
			'username' => I('username'),
			'content' => replace_phiz(I('content')),
			'time' => time(),
			);
		// 插入数据库
		
		if($id = M('wish')->data($data)->add()){
			$data['time'] = date('Y-m-d H:i',$data['time']);
			// p($data['time']);die;
			$data['status'] = 1;
			$data['id'] = $id;
			$this->ajaxReturn($data,'json');
		}else{
			$this->ajaxReturn(array('status'=>0),'json');
		}
		

		
		}
	}
?>