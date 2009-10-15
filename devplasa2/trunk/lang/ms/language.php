<?php
//Malay
class language_class{

	private $language;
	public function language_class(){ $this->doStart(); }
	public function getLanguage()
	{
		return $this->language;
	}
	public function getSinglelanguage($lan_name)
	{
		if(isset($this->language) && $this->language != null)
			return $this->language[$lan_name];

		return '';
	}
	private function setLanguage($v)
	{
		$this->language= $v;
	}

	private function doStart()
	{
		$this->language = array('FORGOT_PASSWORD?' => 'Lupa Password?',
		'NOT_A_MEMBER_YET?_SIGN_UP_HERE!' => 'NOT A MEMBER YET? SIGN UP HERE!', 'MEMBER_LOGIN' => 'Member Masuk');

	}
}

?>