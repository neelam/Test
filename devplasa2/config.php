<?php
@ini_set('include_path', '/var/www/www.point-star.net/projects/devplasa/trunk/lib/');
ini_set('register_globals', 'on');
ini_set('session.save_handler', 'user');
class config
{
	public $live_site = '/projects/devplasa/trunk/';
	public $absolute_live_site = 'http://www.point-star.net/projects/devplasa/trunk/';
	public $absolute_url = '/var/www/www.point-star.net/projects/devplasa/trunk/';
	public $page_title = 'plasa.com';

	/*DB*/
	public $db_host = 'localhost';
	public $db_port = '3306';
	public $db_user = 'plasa';
	public $db_password = 'plasa321';
	public $db_name = 'plasa';

	/*Mail*/
	public $mail_SMTP = 'smtp.gmail.com';
	public $mail_port = 465;
	public $mail_user = 'codepedia@gmail.com';
	public $mail_user_name = 'Plasa - Admin';
	public $mail_password = 'psychogmail2';

	public $is_offline = false;
	public $security_key = 'p@int-sT@r.Ne7';
}

?>