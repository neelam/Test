<?php
include_once('../../classes/model/Users.php');

class login
{
	public function login() {

		$this->users = new users();
		//echo $this->users->common->data_encrypt('mojopia');
		if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'login')
		{
			$this->loginUser();
		}
		else if(isset($_REQUEST['do']) && $_REQUEST['do'] == "logout")
			session_destroy();
	}
	function validate()
	{
		$result = false;

		if(isset($this->userInfo))
		{
			if(!$this->users->common->validator('require', $this->userInfo->getUsername())) { return $result;  }
			if(!$this->users->common->validator('minlen', $this->userInfo->getUsername(), 3)) { return $result; }
			if(!$this->users->common->validator('maxlen', $this->userInfo->getUsername(), 30)) { return $result;  }
			if(!$this->users->common->validator('require', $this->userInfo->getPassword())) { return $result; }

			if(!(isset($_POST['password']) && !empty($_POST['password']) && $this->users->common->validator('maxlen', $_POST['password'], 50))) { return $result; }

			$result = true;
		}

		return $result;
	}
	function loginUser()
	{
		$this->userInfo = new userInfo();
		$this->userInfo->setUsername((isset($_POST['username']))?$_POST['username']:'');

		if(isset($_POST['password']) && !empty($_POST['password']))
		$this->userInfo->setPassword($this->users->common->data_encrypt($_POST['password']));
		else $this->userInfo->setPassword('');

		$this->userInfo->setStatus(1);
		$this->userInfo->setUsertype(1);

		$this->users->setUserinfo($this->userInfo);

		if($this->validate())
		{
			$result = $this->users->loginUser();
			if(isset($result) && !empty($result))
			{
				//if(!isset($_SESSION['session_userid']) || empty($_SESSION['session_userid'])) session_destroy();
				$this->msg = 'Login Successfully!';
				session_register('session_userid');
				$_SESSION['session_userid'] = $result;
				$this->users->updateLastAccess($result, date('Y-m-d H:i:s'));
				$this->users->common->redirect('dashboard.php');
			}
			else $this->msg = "Invalid username or password.";
		}
		else $this->msg = 'Validation invalid';
	}
}

?>