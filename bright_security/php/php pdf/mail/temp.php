<?php

//Add the message body
//$message = file_get_contents( 'index.html' );

$username ="Vishal";

setcookie('username',$username,time()+3600);
$email="grandprix2811@gmail.com";
setcookie('email',$email,time()+3600);

if (!isset($_COOKIE['username']) && isset($_COOKIE['email'])){
	
	echo "cookies not set";
}
else{
	
	echo $_COOKIE['username'] ."\n". $_COOKIE['email'];
header('Location: mail.php');
}
?>
