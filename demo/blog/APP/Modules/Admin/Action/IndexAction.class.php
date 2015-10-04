<?php
Class IndexAction extends CommonAction{
	
	Public function index(){
		$this->display();
	}

	Public function logout(){
		session_unset();
		session_destroy();
		redirect(__GROUP__);
	}
}

?>