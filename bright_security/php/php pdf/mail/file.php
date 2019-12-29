<?php

if(isset($_COOKIE['username']) && isset($_COOKIE['email']) ) {
	
	//echo 'user' . $_COOKIE['username'] . 'and email is' . $_COOKIE['email'] . 'is set';
	
	header("Location : mail.php");
}
else{
	
	echo 'User name is name not set';
	
}


?>