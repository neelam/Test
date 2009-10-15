<?php
session_start();

session_start();
$sessionid = $_REQUEST['sid'];
$userid = $_REQUEST['uid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://localhost/Neelam/Test/selectuser.js"></script>
</head>

<body>
<table>
	<tr>
    	<td>
        	<a href="#" onclick="showUser($sessionid,$userid)">Click here</a>
            <div id="txtHint"><b>Person info will be listed here.</b></div>
       </td>
    </tr>
</table>
</body>
</html>
