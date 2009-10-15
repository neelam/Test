<?php
include_once('../../classes/model/Users.php');

class forgotpassword
{
	public function forgotpassword() {
		$this->users = new users();

		if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'forgotpassword')
			$this->requestPassword();
	}

	function validate()
	{
		$result = false;

		if(isset($this->userInfo))
		{
			if(!$this->users->common->validator('require', $this->userInfo->getEmail())) return $result;
			if(!$this->users->common->validator('email', $this->userInfo->getEmail())) return $result;
			if(!$this->users->common->validator('maxlen', $this->userInfo->getEmail(), 100)) return $result;

			$result = true;
		}

		return $result;
	}
	function requestPassword()
	{
		$this->userInfo = new userInfo();
		$this->userInfo->setEmail((isset($_POST['email']))?$_POST['email']:'');
		$this->userInfo->setStatus(1);
		$this->userInfo->setUsertype(1);
		$this->users->setUserinfo($this->userInfo);

		if($this->validate())
		{
			if($this->users->requestPassword())
			{
				$subject = 'Your password @ Plasa!';

				$body = "Dear ".$this->users->getUserinfo()->getUsername().", <br/><br/> ";
				$body .= "Your user id : ".$this->users->getUserinfo()->getUsername()." <br /><br />";
				$body .= "Your password : ".$this->users->getUserinfo()->getPassword()."<br /><br />";
				$body .= "<a href='".$this->users->config->absolute_live_site."template/admin/login.php'>Click here</a> to go to the log-in page.";

				$this->users->common->sendMail($this->users->getUserinfo()->getEmail(), $this->users->getUserinfo()->getUsername(), $subject, $body);
				$this->msg = 'Your password have been sent Successfully!';
			}
		}
	}
}

?>