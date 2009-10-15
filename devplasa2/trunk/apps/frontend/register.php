<?php
include_once('../../classes/model/Users_webstore.php');
include_once('../../classes/controller/merchant_group_info.php');
include_once('../../lib/parse.xml.class.php');

class register
{
	public function register() {
		$this->users = new users();
		$this->parseData();

		if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'signup')
			$this->signupUser();
	}

	function validate()
	{
		$result = false;

		if(isset($this->userInfo))
		{
			if(!$this->users->common->validator('require', $this->userInfo->getUsername())) return $result;
			if(!$this->users->common->validator('minlen', $this->userInfo->getUsername(), 3)) return $result;
			if(!$this->users->common->validator('maxlen', $this->userInfo->getUsername(), 30)) return $result;

			if(!$this->users->common->validator('require', $this->userInfo->getEmail())) return $result;
			if(!$this->users->common->validator('email', $this->userInfo->getEmail())) return $result;
			if(!$this->users->common->validator('maxlen', $this->userInfo->getEmail(), 100)) return $result;

			if(!$this->users->common->validator('require', $this->userInfo->getPassword())) return $result;

			if(!(isset($_POST['upassword']) && !empty($_POST['upassword'])
				&& $this->users->common->validator('maxlen', $_POST['upassword'], 50))) return $result;

			if(!(isset($_POST['upasswordconfirm']) && !empty($_POST['upasswordconfirm'])
				&& $this->users->common->validator('maxlen', $_POST['upasswordconfirm'], 50))) return $result;

			if(!(isset($_POST['termscondition']) && !empty($_POST['termscondition']) && $_POST['termscondition'] == 'on')) return $result;

			if($this->users->checkusername()) return $result;
			if($this->users->checkemail()) return $result;

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
		$this->userInfo->setUsertype(2);//Client User

		$this->userInfo->setCreatedat(date('Y-m-d H:i:s'));
		$this->userInfo->setUpdatedat(date('Y-m-d H:i:s'));
		$this->userInfo->setAcceptance(1);//The user accept the terms and conditions.

		$this->users->setUserinfo($this->userInfo);

		if($this->validate())
		{
			if($this->users->signupUser()) {
				$subject = 'Activate your account @ Plasa!';
				$body = "Dear ".$this->userInfo->getUsername().", <br/><br/> Welcome to Plasa!<br/><br/>Before you can start use your account please ";
			    $body .= "<a href='http://point-star.net/projects/devplasa/trunk/template/frontend/activation.php?do=activate&code=".$this->userInfo->getActivationcode()."&email=".$this->userInfo->getEmail()."' target='_blank' type='html'>click here</a>";
			    $body .= " to confirm your email address and activate your account.";

				$this->users->common->sendMail($this->userInfo->getEmail(), $this->userInfo->getUsername(), $subject, $body);
				$this->users->common->redirect('activation.php?do=show_success');
			}
		}
		else $this->msg = 'Validation invalid';
	}
	function parseData()
	{
		$xml_parser = xml_parser_create();
		$obj_parser = new parseXml("register");
		xml_set_object($xml_parser,&$obj_parser);
		xml_set_element_handler($xml_parser, "startElement", "endElement");
		xml_set_character_data_handler($xml_parser, "characterData");
		$fp = fopen($this->users->config->xml_data_path,"r") or die("Error reading data.");
		while ($data = fread($fp, 4096)) {
		   xml_parse($xml_parser, $data, feof($fp))
		   or die(sprintf("XML error: %s at line %d",
		   xml_error_string(xml_get_error_code($xml_parser)),
		   xml_get_current_line_number($xml_parser)));
		}
		fclose($fp);
		xml_parser_free($xml_parser);

		$this->merchant_group_list = $obj_parser->merchant_group_list;
	}
}

?>