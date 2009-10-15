<?php
//Web Server main page
session_start();
$sessionid = $_REQUEST['sid'];
$userid = $_REQUEST['uid'];
header("Location: http://localhost/Neelam/Test/sos_auth_second.php?vsid=" . $sessionid . "&vuid=" . $userid);
?> 