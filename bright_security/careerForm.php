<?php

$servername = "localhost";
$username = "root";
$password = "281198";
$db = "brightsecurity";


// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    // echo "connection failed!";
}
else{
	// echo "connected successfully!";
} 

$display['data']=array();

 if(isset($_POST['vfname']) && isset($_POST['vphone']) && isset($_POST['vemail']) && isset($_POST['vaddress'])) { 

	$visitor_first_name =$_POST['vfname'];
	$visitor_last_name = $_POST['vlname'];
	$visitor_phone = $_POST['vphone'];
	$visitor_email = $_POST['vemail'];
	$visitor_address = $_POST['vaddress'];


	$sql = "INSERT INTO career_form(first_name, last_name, phone, email, address) VALUES('$visitor_first_name','$visitor_last_name','$visitor_phone','$visitor_email','$visitor_address')";

	if($conn->query($sql) == TRUE) {
		//echo "true";
		$query_error=array(
						"error"=>"false",
					);
	    array_push($display['data'],$query_error);
	    
	    	echo json_encode($display);
		}
	else {
		echo "Error: " .$sql . "<br>" .$conn->error;
	}
}

$conn->close();

?>

