<?php 
session_set_save_handler("SessionStart", "Sessionend", "SessionRead", "SessionWrite", "SessionDestroy", "SessionGarbageCollect"); 
$id = session_id(); 
$lifetime = get_cfg_var("session.gc_maxlifetime"); 

function SessionStart($session_save_path,$session_name) { 
mysql_pconnect("host","username","password") or die("Can't connect to MySQL server!"); 
mysql_select_db("database") or die("Can't select MySQL sessions database"); 
} 

function Sessionend() { 
return 1; 
} 

function SessionRead($id) { 
$result = mysql_query("SELECT data from sessions WHERE sessionid='".session_id()."' AND expires>".time()); 

if($result && mysql_num_rows($result)) { 
$var = mysql_fetch_row($result); 
$temp = $var[0]; 
return $temp; 
} 

else { 
global $whatever; 
global $lifetime; 
$expires = time()+$lifetime; 
$result = mysql_query("INSERT INto sessions (sessionid,expires,data) VALUES('".session_id()."','$expires','$whatever')"); 
return ""; 
} 

} 

function SessionWrite($id,$whatever) { 
global $lifetime; 
$expires = time()+$lifetime; 
$result = mysql_query("UPDATE sessions SET expires='$expires',data='$whatever' WHERE sessionid='".session_id()."' AND expires>".time()); 
} 

function SessionDestroy($id) { 
$result = mysql_query("DELETE from sessions WHERE sessionid='".session_id()."'"); 
} 

function SessionGarbageCollect($lifetime) { 
$result = mysql_query("DELETE from sessions WHERE expires<".time()); 
} 

/*

The variable name $whatever should be something that is hard for others to guess, but makes sense to you. 
You'll have to do this to decode the session variables on subsequent pages: 

session_start(); 
session_decode($temp); 

As far as table structure, this works for me: 

sessionid - varchar(32), primary key 
expires - int(11) 
data - text 



*/
?> 


