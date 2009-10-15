<?php
include_once('../../classes/model/Users.php');

class register
{
	public function register() {
		$this->users = new users();

		if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'signup')
		{
			$this->signupUser();
		}
		/*
		else if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'checkusername')
		{
			$this->checkusername()
		}
		else if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'checkemail')
		{
			$this->checkemail()
		}
		*/
	}

	function checkusername()
	{
		$this->userInfo = new userInfo();
		$this->userInfo->setUsername((isset($_POST['username']))?$_POST['username']:'');
		$this->users->setUserinfo($this->userInfo);

		if($this->users->checkusername()) echo 'User already exists!';
		else echo 'User is available!';
	}

	function checkemail()
	{
		$this->userInfo = new userInfo();
		$this->userInfo->setEmail((isset($_POST['email']))?$_POST['email']:'');
		$this->users->setUserinfo($this->userInfo);

		//if($this->users->checkemail()) echo 'E-mail already exists!';
		//else
	}

	function validate()
	{
		$result = false;

		if(isset($this->userInfo))
		{
			if(!(isset($_POST['termscondition']) && !empty($_POST['termscondition']) && $_POST['termscondition'] == 'on')) return $result;
			if(!$this->users->common->validator('require', $this->userInfo->getUsername())) return $result;
			if(!$this->users->common->validator('require', $this->userInfo->getEmail())) return $result;
			if(!$this->users->common->validator('require', $this->userInfo->getPassword())) return $result;
			//if(!$this->users->common->validator('require', $_POST['upasswordconfirm'])) return $result;
			if(!$this->users->common->validator('email', $this->userInfo->getEmail())) return $result;

			$result = true;
		}

		return $result;
	}
	function signupUser()
	{
		$this->userInfo = new userInfo();
		$this->userInfo->setUsername((isset($_POST['username']))?$_POST['username']:'');
		$this->userInfo->setEmail((isset($_POST['email']))?$_POST['email']:'');

		if(isset($_POST['upassword']) && !empty($_POST['upassword'])) 			$this->userInfo->setPassword($this->users->common->data_encrypt($_POST['upassword']));
		else $this->userInfo->setPassword('');

		$this->userInfo->setLastaccess(date('Y-m-d H:i:s'));
		$this->userInfo->setActivationcode($this->users->common->generateActivationCode());
		$this->userInfo->setStatus(0);//Only register, but not activate yet.
		$this->userInfo->setUsertype(1);//Client User

		$this->userInfo->setCreatedat(date('Y-m-d H:i:s'));
		$this->userInfo->setUpdatedat(date('Y-m-d H:i:s'));
		$this->userInfo->setAcceptance(1);//The user accept the terms and conditions.

		$this->users->setUserinfo($this->userInfo);

		if($this->validate())
		{
			if($this->users->signupUser()) {
				$subject = 'Activate your account @ Plasa!';
				$body = "Dear ".$this->userInfo->getUsername().", <br/><br/> Welcome to Plasa!<br/><br/>Before you can start use your account please ";
			    $body .= "<a href='http://point-star.net/projects/devplasa/trunk/template/admin/activation.php?do=activate&code=".$this->userInfo->getActivationcode()."&email=".$this->userInfo->getEmail()."' target='_blank' type='html'>click here</a>";
			    $body .= " to confirm your email address and activate your account.";

				$this->users->common->sendMail($this->userInfo->getEmail(), $this->userInfo->getUsername(), $subject, $body);
				$this->msg = 'Register Successfully!';
			}
		}
		else $this->msg = 'Validation invalid';
	}
}

?>