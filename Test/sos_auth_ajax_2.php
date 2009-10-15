<?php
// page1.php

session_start();

$link = mysql_connect('localhost', 'root', '');
mysql_select_db('test',$link);

$verify = '';

$CheckSessionId = $_GET['q'];
$CheckUserId = $_GET['u'];

$sql = "select id from neelam_user_session where user_session='$CheckSessionId' and user_id='$CheckUserId'";
$result = mysql_query($sql);
if(mysql_num_rows($result)>=1) {
	//$verify = 'true';
//header("Location: http://www.point-star.net/projects/devplasa2/trunk/template/admin/web_auth_second.php?sid=" . $CheckSessionId . "&uid=" . $CheckUserId ."&verify=" . $verify);
echo "true";
} else {
	echo "false";
	//$verify = 'false';
//header("Location: http://www.point-star.net/projects/devplasa2/trunk/template/admin/web_auth_second.php?sid=" . $CheckSessionId . "&uid=" . $CheckUserId ."&verify=" . $verify);
}
?> 