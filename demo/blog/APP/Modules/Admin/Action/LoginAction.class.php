<?php
Class LoginAction extends Action{

	Public function index(){
		$this->display();
	}


	Public function verify(){
		import('Class.Image',APP_PATH);
		Image::verify();
	}

	Public function login(){
			
		//若不是POST过来的数据,则报错
		if(!IS_POST) halt('页面不存在');
		//比对验证码
		// p($_SESSION);die;
		$_SESSION['verify'] == I('code','','strtolower') || $this->error('验证码错误');
		//比对账号信息
		$db = M('user');
		$user = $db->where(array('username'=>I('username')))->find();
		if(!$user||$user['password']!=I('password','','md5')) {
			$this->error('帐号或密码错误');
		}
			$data = array(
				'id'=>$user['id'],
				'logintime'=>time(),
				'loginip'=>get_client_ip()
				);
			$db->save($data);
			session('uid',$user['id']);
			session('username',$user['username']);
			session('logintime',date('Y-m-d H:i:s',$user['logintime']));
			session('loginip',$user['loginip']);
			redirect(__GROUP__);
			
	}
}
?>