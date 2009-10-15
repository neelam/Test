<?php
@ini_set('include_path', 'C:/xampp/htdocs/Neelam/devplasa2/trunk/lib/');
ini_set('register_globals', 'on');
ini_set('session.save_handler', 'user');
class config
{
	public $live_site = '/Neelam/devplasa2/trunk/';
	public $absolute_live_site = 'http://localhost/Neelam/devplasa2/trunk/';
	public $absolute_url = 'C:/xampp/htdocs/Neelam/devplasa2/trunk/';
	public $page_title = 'plasa.com';

	/*DB*/
	public $db_host = 'localhost';
	public $db_port = '3306';
	public $db_user = 'root';
	public $db_password = '';
	public $db_name = 'plasa';

	/*Mail*/
	public $mail_SMTP = 'smtp.gmail.com';
	public $mail_port = 465;
	public $mail_user = 'codepedia@gmail.com';
	public $mail_user_name = 'Plasa - Admin';
	public $mail_password = 'psychogmail2';

	public $is_offline = false;
	public $security_key = 'p@int-sT@r.Ne7';

	public $activation_key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

	public $xml_data_path = 'http://localhost/Neelam/devplasa2/trunk/samplePlasa.xml';

}

?>