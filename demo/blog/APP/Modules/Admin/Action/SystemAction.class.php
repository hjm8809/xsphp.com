<?php
Class SystemAction extends CommonAction{

	Public function verify(){
		$this->display();
	}

	Public function updateVerify(){
		F('verify',$_POST,CONF_PATH);

	}

}

?>