<?php
include_once('../../classes/model/Users_webstore.php');

class activation
{
	public function activation() {
		$this->users = new users();

		if(isset($_REQUEST['do']) && !empty($_REQUEST['do']) && $_REQUEST['do'] == 'activate' &&
			isset($_REQUEST['code']) && !empty($_REQUEST['code']) && isset($_REQUEST['email']) && !empty($_REQUEST['email']))
		{
			$this->activateUser();
		}
	}
	function activateUser()
	{
		$this->userInfo = new userInfo();
		$this->userInfo->setEmail($_REQUEST['email']);
		$this->userInfo->setActivationcode($_REQUEST['code']);
		$this->userInfo->setStatus(1);//Activate

		$this->users->setUserinfo($this->userInfo);

		$this->users->activateUser();

		if($this->users->getUserinfo() != null) $this->msg = 'Activation Successfully!';
		else $this->msg = 'Activation Failed!';
	}
}

?>