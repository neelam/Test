<?php 

session_start();
session_register("username");
		
$username = "justme";
			
Header("Location: ./test_login.php");

?>

