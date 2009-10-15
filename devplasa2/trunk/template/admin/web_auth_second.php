<?php
// Web Second page
session_start();

$inactive = 500; 
	if(isset($_SESSION['timeout']) ) {
		$session_life = time() - $_SESSION['timeout'];
		if($session_life > $inactive)
        { session_destroy(); header("Location: logout.php"); }
	}
	$_SESSION['timeout'] = time();

$sessionid = $_REQUEST['sid'];
$userid = $_REQUEST['uid'];
$verifyvalue = $_REQUEST['verify'];

echo 'Welcome to Web Server 2<br />';
if($verifyvalue=='true')
{
	echo "<br/>Valid Login";
	$_SESSION['WebSessionId'] = $sessionid;
	$_SESSION['WebUserId'] = $userid;
}
else
{
	echo "<br/>Invalid Login";
}
echo "<br/><br/>";
echo '<br /><a href="http://localhost/Neelam/Test/sos_auth.php?s=' . $sessionid . '&u=' . $userid .'">SSO Main Page</a>';

?> 