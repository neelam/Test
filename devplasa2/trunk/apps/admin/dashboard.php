<?php
include_once('../../config/config.php');
include_once('../../apps/common_class.php');

class dashboard
{
	public function dashboard() {
		$common = new commonClass();
		if(!isset($_SESSION['session_userid']) || empty($_SESSION['session_userid'])) $common->redirect('login.php');
	}
}

?>