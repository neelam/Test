<?php
include_once('../../config/config.php');
include_once('../../lib/sessions/session_mysql.php');
session_start();
class header
{
	public function header() {
		$this->setCurrentmenu();
	}
	function setCurrentmenu()
	{
		switch(basename($_SERVER["PHP_SELF"]))
		{
			case 'dashboard.php': $this->current_menu = 'dashboard'; break;
			case 'userlist.php':
			case 'userprofile.php': $this->current_menu = 'user'; break;
			default : $this->current_menu = 'dashboard'; break;
		}
	}
}

?>