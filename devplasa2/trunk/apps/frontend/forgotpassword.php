<?php
include_once('../../classes/model/Users_webstore.php');
include_once('../../classes/controller/merchant_group_info.php');
include_once('../../lib/parse.xml.class.php');

class forgotpassword
{
	public function forgotpassword() {
		$this->users = new users();
		$this->parseData();
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
		$this->userInfo->setUsertype(2);
		$this->users->setUserinfo($this->userInfo);

		if($this->validate())
		{
			if($this->users->requestPassword())
			{
				$subject = 'Your password @ Plasa!';

				$body = "Dear ".$this->users->getUserinfo()->getUsername().", <br/><br/> ";
				$body .= "Your user id : ".$this->users->getUserinfo()->getUsername()." <br /><br />";
				$body .= "Your password : ".$this->users->getUserinfo()->getPassword()."<br /><br />";
				$body .= "<a href='".$this->users->config->absolute_live_site."template/frontend/index.php'>Click here</a> to go to the log-in page.";

				$this->users->common->sendMail($this->users->getUserinfo()->getEmail(), $this->users->getUserinfo()->getUsername(), $subject, $body);
				$this->msg = 'Your password have been sent Successfully!';
			}
		}
	}
	function parseData()
	{
		$xml_parser = xml_parser_create();
		$obj_parser = new parseXml("forgotpassword");
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