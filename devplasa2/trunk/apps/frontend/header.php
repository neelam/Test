<?php
include_once('../../config/config_webstore.php');
include_once('../../lib/sessions/session_mysql.php');
include_once('../../apps/common_class.php');
include_once('../../classes/model/Users_webstore.php');
session_start();

class header
{
	public function header() {
		if(isset($_POST['hid_lang']) && !empty($_POST['hid_lang'])) {
			if(isset($_COOKIE['lang']) && !empty($_COOKIE['lang']) && $_COOKIE['lang'] != $_POST['hid_lang']) {
				setcookie('lang', $_POST['hid_lang']);
			}
			else if(!isset($_COOKIE['lang']) && empty($_COOKIE['lang']))
				setcookie('lang', $_POST['hid_lang']);
		}

		if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'login') {
			$this->login();
		}
		else if(isset($_POST['__EVENTTARGET_PRODUCT']) && !empty($_POST['__EVENTTARGET_PRODUCT']) && $_POST['__EVENTTARGET_PRODUCT'] == 'addproduct') {
			if($_SESSION['session_xml'] == null) session_register('session_xml');
			if($_SESSION['session_pcount'] == null) session_register('session_pcount');
			if($_SESSION['session_pmerchant'] == null) session_register('session_pmerchant');
		}
		else if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'doViewcart')
			$this->doViewcart();

		$lang_folder = (isset($_POST['hid_lang']) && !empty($_POST['hid_lang']))? $_POST['hid_lang'] : ((isset($_COOKIE['lang']) && !empty($_COOKIE['lang']))? $_COOKIE['lang']: 'en');
		$lang_folder = '../../lang/'.$lang_folder.'/language.php';
		include_once($lang_folder);
		$this->lang = new language_class();
		$this->pagetitle = $this->getPageTitle();
	}
	function doViewcart()
	{
		if(isset($_SESSION['session_xml']) && $_SESSION['session_xml'] != null)
		{

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://point-star.net/projects/devplasa2/trunk/template/frontend/howtobuy.php");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 4);
			curl_setopt($ch, CURLOPT_POST, 1) ;
			curl_setopt($ch, CURLOPT_POSTFIELDS, $_SESSION['session_xml']);
    		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close'));

    		$result = curl_exec($ch);

    		var_dump($result);

    curl_close($ch);

/*
     		$url = fsockopen ('www.point-star.net', 80);

			$length = strlen ($_SESSION['session_xml']);

			$post = "POST /path/to/script HTTP /1.0\n";
			$post .= "Content-Length: $length\n";
			$post .= "Content-Type: application/x-www-form-urlencoded\n";
			$post .= "Connection: Close\n\n";
			$post .= "$_SESSION[session_xml]\n\n";

			fputs ($url, $post);
			fclose ($url);
*/
		}
	}
	private function validate()
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
	private function login()
	{
		$this->users = new users();
		$this->userInfo = new userInfo();
		$this->userInfo->setUsername((isset($_POST['username']))?$_POST['username']:'');

		if(isset($_POST['password']) && !empty($_POST['password']))
		$this->userInfo->setPassword($this->users->common->data_encrypt($_POST['password']));
		else $this->userInfo->setPassword('');

		$this->userInfo->setStatus(1);
		$this->userInfo->setUsertype(2);

		$this->users->setUserinfo($this->userInfo);

		if($this->validate())
		{
			$result = $this->users->loginUser();
			if(isset($result) && !empty($result))
			{
				session_start();
				$this->msg = 'Login Successfully!';
				session_register('session_userid');
				$_SESSION['session_userid'] = $result;
				$this->users->updateLastAccess($result, date('Y-m-d H:i:s'));
				$this->users->common->redirect('index.php');
			}
			else $this->msg = "Invalid username or password.";
		}
		else $this->msg = 'Validation invalid';
	}
	private function getPageName()
	{
		if(strstr($_SERVER["PHP_SELF"] , 'register.php') == 'register.php') $this->currentpage = 'register';
		else if(strstr($_SERVER["PHP_SELF"] , 'forgotpassword.php') == 'forgotpassword.php') $this->currentpage = 'forgotpassword';
		else if(strstr($_SERVER["PHP_SELF"] , 'merchantdirectory.php') == 'merchantdirectory.php') $this->currentpage = 'merchantdirectory';
		else if(strstr($_SERVER["PHP_SELF"] , 'userprofile_edit.php') == 'userprofile_edit.php') $this->currentpage = 'editprofile';

		return $this->currentpage;
	}

	private function getPageTitle()
	{
		if($this->getPageName() == 'register') return 'Registration';
		if($this->getPageName() == 'forgotpassword') return 'Forgot Password';
		if($this->getPageName() == 'merchantdirectory') return 'Merchant Directory';
		if($this->getPageName() == 'editprofile') return 'Edit Profile';
	}
}

?>