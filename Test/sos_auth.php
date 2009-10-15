<?php
// SSO Main Page

$link = mysql_connect('localhost', 'root', '');
mysql_select_db('test',$link);

$ip=$_SERVER['SERVER_ADDR'];
$ip = '172.19.153.223';

$sql = "select id from neelam_user_ip where ipaddress='$ip'";
$result = mysql_query($sql);
if(mysql_num_rows($result)>=1) 
{
	session_start();
	
	//$ses_id = $_REQUEST['s'];
	//$varUserId = $_REQUEST['u'];
	
	if($_REQUEST['s']!='') { $_SESSION['sessionid'] = $_REQUEST['s'];
							$ses_id = $_REQUEST['s'];}
	if($_REQUEST['u']!='') { $_SESSION['userid'] = $_REQUEST['u'];
							$varUserId = $_REQUEST['u'];}
		
	if($_SESSION['sessionid']!= '' ) { $ses_id = $_SESSION['sessionid'];}
	if($_SESSION['userid']!= '' ) { $varUserId = $_SESSION['userid'];}
	
	$inactive = 500; 
	if(isset($_SESSION['timeout']) ) {
		$session_life = time() - $_SESSION['timeout'];
		if($session_life > $inactive)
        { 	session_destroy();
			$sql = "delete from neelam_user_session where user_session='$ses_id' and user_id='$varUserId'";
			$result = mysql_query($sql);
		    header("Location: logout.php"); 
		}
	}
	$_SESSION['timeout'] = time();

	echo "Authorized IPADDRESS<br/>";
	echo 'Welcome to SSO Login Page<br/>';

	if($ses_id=='' && $varUserId=='') 
	{			
		$ses_id = session_id(); 
		$_SESSION['userid'] = '7';
		//$_SESSION['sessionid']=$ses_id;

		$varUserId = $_SESSION['userid'];

		$sql = "insert into neelam_user_session(user_session,user_id) values('$ses_id','$varUserId')";
		$result = mysql_query($sql);
	}
	echo 'Click the below link to go to Web Server<br/>';
	echo '<br /><a href="http://www.point-star.net/projects/devplasa2/trunk/template/admin/web_auth.php?sid=' . $ses_id . '&uid=' . $varUserId .'" target="_blank">Web Server Page 1</a>';
}
else
{
	echo "<br/>Not a authorized ip-address";
}
?> 