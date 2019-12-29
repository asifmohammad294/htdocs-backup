<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require './mail/vendor/autoload.php';

 if(isset($_POST['vname']) && isset($_POST['vemail']) && isset($_POST['vmessage'])) { 

$visitor_name =$_POST['vname'];
 $visitor_email = $_POST['vemail'];
$visitor_message = $_POST['vmessage'];
	 
$servername = "localhost";
$username = "root";
$password = "281198";
$db = "brightsecurity";

$display['data']=array();
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 	
//echo "connected successfully";

$sql = "INSERT INTO contact_form(vname, vemail, vmessage) VALUES('$visitor_name', '$visitor_email','$visitor_message')";

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



$mail = new PHPMailer(true);



	$content = '
            <style type="text/css">
                  @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600|Roboto:300,400,500");
                  table {
                  border-collapse: collapse;
                  width: 100%;
                  font-family: sans-serif;
                  }
                  th, td {
                  text-align: left;
                  padding:4px !important;
                  border:1px solid #d1d1d1;
                  }
                  label{
                  font-size:14px;
                  font-weight:bold;
                  padding:4px !important;
                  color:#000;
                  }
                  table span{
                  color:#000;
                  }
                  .h3Head{ 
                     text-align:center; 
                     font-family:sans-serif;
                  }
               </style>
            <div>
               <div  class="container-fluid ">
                  <table border=1 cellpadding="10">
                  	 <tr>
                  	 	<td colspan="12" style="background: #862120; padding: 10px;">
			                  <h3 class="h3Head" style="color: white;">BRIGHT SECURITY SYSTEM</h3>
		               </td>
                  	 </tr>
                     <tr>
                        <td colspan="12" style="text-align:center;">
                           <label style="text-align:center; font-size:20px; margin-top: 5px; margin-bottom: 5px;">Contact form information  
                           </label>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <label>First Name &nbsp; <span style="font-size:20px;">:</span></label>
                        </td>
                        <td colspan="10">
                           <span style="font-weight: lighter; ">'.$visitor_name.'</span>
                        </td>
                     </tr>

                     <tr>
                        <td colspan="2">
                           <label>Email &nbsp; <span style="font-size:20px;">:</span></label>
                        </td>
                        <td colspan="10">
                           <span style="font-weight: lighter;">'.$visitor_email.'</span>
                        </td>
                     </tr>

                     <tr>
                        <td colspan="2">
                           <label>Full Residence Address  &nbsp; <span style="font-size:20px;">:</span></label>
                        </td>
                        <td colspan="10">
                           <span style="font-weight: lighter;">'.$visitor_message.'</span>
                        </td>
                     </tr>

                  </table>
               </div>
               <br><br><br>
               <div class="row">
                  <label>For more info please visit:  &nbsp; <span style="color: blue;"> www.brightsecurity.com</span></label>
               </div>
            </div>

';




    try {
        
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.zoho.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'info@brightsecuritysystem.com'; // SMTP username
        $mail->Password   = 'bright1234'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465; // TCP port to connect to
        
        //Recipients
        $mail->setFrom('info@brightsecuritysystem.com');
       // $mail->addAddress('bright.securitysystem@gmail.com');
       // $mail->addAddress('info@brightsecuritysystem.com');
         $mail->addAddress('kanestrelentlessly@gmail.com');
        // $mail->addAddress('kanestrelentlessly@gmail.com');
        // Add a recipient
        //   $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
         $mail->addCC('amitrobinns@gmail.com');
        //$mail->addBCC('bcc@example.com');
        
        //Attachments
     //   $mail->addAttachment($namegen); // Add attachments
        //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Career Form';
        //$message = file_get_contents( 'index.html' );
        $mail->Body    = $content;
        //$mail->AltBody = ;
        
        $mail->send();
        // echo 'Message has been sent';
        
    }
    catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }




$conn->close();

}

?>

