<?php
include_once("phpMailer21/class.phpmailer.php");

class commonClass
{
	private $config;

	public function commonClass(){}

	public function getConfig()
	{
		return $this->config;
	}
	public function setConfig($v)
	{
		$this->config = $v;
	}
	public function redirect($url)
	{
		echo "<script type='text/javascript'>document.location = '".$url."'; </script>";
		return;
	}
	function getConnection()
	{
		return mysql_connect($this->config->db_host, $this->config->db_user, $this->config->db_password);
	}
	function generateActivationCode($length = 10)
	{
	   $result = '';
	   $chars = $this->config->activation_key;
	   srand((double)microtime()*1000000);
	   for ($i=0; $i<$length; $i++)
	   {
	      $result .= substr ($chars, rand() % strlen($chars), 1);
	   }
	   return $result;
	}
	function data_encrypt($datato_enc)
	{
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($this->config-security_key), $datato_enc, MCRYPT_MODE_CBC, md5(md5($this->config-security_key))));
	}
	function data_decrypt($datato_dec)
	{
		return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($this->config-security_key), base64_decode($datato_dec), MCRYPT_MODE_CBC, md5(md5($this->config-security_key))), "\0");
	}
	function showMessage($msg, $type = 'error')
	{
		if($type == 'error') return "<div class='error-message'><h2>".$msg."</h2><p>Please try again...</p></div>";
		if($type == 'info') return "<div class='error-message' style='border:0;'><h2>".$msg."</h2></div>";
	}
	function validator($validation_type = 'require', $input_string = '', $compare_string = '')
	{
		$result = false;

		switch($validation_type)
		{
			case 'require' : if(isset($input_string) && !empty($input_string)) $result = true; break;
			case 'numeric' : $result = is_numeric($input_string); break;
			case 'email' : if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $input_string)) $result = true; break;
			//case 'email' : if(eregi("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])?*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $input_string)) $result = true; break;
			case 'website' : if (eregi("/^[a-z0-9][a-z0-9\-]+[a-z0-9](\.[a-z]{2,4})+$/i", $input_string)) $result = true; break;
			case 'minlen'  : if(is_numeric($compare_string)) { if(strlen($input_string) >= $compare_string)  $result = true; } break;
			case 'maxlen'  : if(is_numeric($compare_string)) { if(strlen($input_string) <= $compare_string)  $result = true; } break;
			default: if(isset($input_string) && !empty($input_string)) $result = true; break;
		}

		return $result;
	}
	function sendMail($email_to, $name_to, $subject, $body)
	{
		$mail             = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = $this->config->mail_SMTP;      // sets GMAIL as the SMTP server
		$mail->Port       = $this->config->mail_port;      // set the SMTP port for the GMAIL server

		$mail->Username   = $this->config->mail_user;  // GMAIL username
		$mail->Password   = $this->config->mail_password;  // GMAIL password

		$mail->From       = $this->config->mail_user;
		$mail->FromName   = $this->config->mail_user_name;
		$mail->Subject    = $subject;

		$mail->MsgHTML($body);

		$mail->AddAddress($email_to, $name_to);
		//$mail->AddAttachment("images/phpmailer.gif");             // attachment
		$mail->IsHTML(true); // send as HTML

		if(!$mail->Send()) {
		  echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  //echo "Message sent!";
		}
	}
	function readXML($xpath_query = '', $url = '')
	{
		if(empty($url)) $url = $this->config->xml_data_path;
		$doc = new DOMDocument;
		$doc->preserveWhiteSpace = false;
		$doc->Load($url);
		$xpath = new DOMXPath($doc);

		return $xpath->query($xpath_query);//Array
	}
	function evaluateXML($xpath_query = '', $url = '')
	{
		if(empty($url)) $url = $this->config->xml_data_path;
		$doc = new DOMDocument;
		$doc->preserveWhiteSpace = false;
		$doc->Load($url);
		$xpath = new DOMXPath($doc);

		return $xpath->evaluate($xpath_query);//Array
	}
}
?>