<?php 

session_start();
	
if ( isset ($username) )
   echo $username;
else
   echo "Not authenticated!";
?>

