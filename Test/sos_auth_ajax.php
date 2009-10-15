<?php
$link = mysql_connect('localhost', 'root', '');
mysql_select_db('test',$link);

session_start();

echo 'Welcome to SSO Login Page<br/>';
$ses_id = session_id(); 
$_SESSION['userid'] = '7';

$varUserId = $_SESSION['userid'];

$sql = "insert into neelam_user_session(user_session,user_id) values('$ses_id','$varUserId')";
$result = mysql_query($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table>
	<tr>
    	<td>
        	<a href="http://www.point-star.net/projects/devplasa2/trunk/template/admin/web_auth_ajax.php?sid=$ses_id&uid=$varUserId">Click here</a>
        </td>
    </tr>
</table>
</body>
</html>
