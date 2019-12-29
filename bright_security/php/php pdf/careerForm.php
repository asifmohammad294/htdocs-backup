<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require './mail/vendor/autoload.php';

 if(isset($_POST['vfname']) && isset($_POST['vphone']) && isset($_POST['vemail']) && isset($_POST['vaddress'])) { 

$visitor_first_name =$_POST['vfname'];
 $visitor_last_name = $_POST['vlname'];
$visitor_phone = $_POST['vphone'];
$visitor_email = $_POST['vemail'];

$visitor_address = $_POST['vaddress'];
	 
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

$sql = "INSERT INTO career_form(first_name, last_name, phone, email, address) VALUES('$visitor_first_name','$visitor_last_name','$visitor_phone','$visitor_email','$visitor_address')";

if($conn->query($sql) == TRUE) {
		//echo "true";
		$query_error=array(
						"error"=>"false",
					);
	    array_push($display['data'],$query_error);
	    
	    	echo json_encode($display);


    // Mail Code

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
                      <td colspan="12" style="background: #254A93; padding: 10px;">
                        <h3 class="h3Head" style="color: white;">Career Opportunities at Bright Security System</h3>
                   </td>
                     </tr>
                     <tr>
                        <td colspan="12" style="text-align:center;">
                           <label style="text-align:center; font-size:20px; margin-top: 5px; margin-bottom: 5px;">Career form information 
                           </label>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <label>First Name &nbsp; <span style="font-size:20px;">:</span></label>
                        </td>
                        <td colspan="10">
                           <span style="font-weight: lighter; ">'.$visitor_first_name.'</span>
                        </td>
                     </tr>

                     <tr>
                        <td colspan="2">
                           <label>Last Name  &nbsp; <span style="font-size:20px;">:</span></label>
                        </td>
                        <td colspan="10">
                           <span style="font-weight: lighter;">'.$visitor_last_name.'</span>
                        </td>
                     </tr>

                     <tr>
                        <td colspan="2">
                           <label>Phone Number &nbsp; <span style="font-size:20px;">:</span></label>
                        </td>
                        <td colspan="10">
                           <span style="font-weight: lighter;">'.$visitor_phone.'</span>
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
                           <span style="font-weight: lighter;">'.$visitor_address.'</span>
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
        $mail->Username   = 'admin@brightsecuritysystem.com'; // SMTP username
        $mail->Password   = 'adminLand@Bright02'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465; // TCP port to connect to
        
        //Recipients
        $mail->setFrom('admin@brightsecuritysystem.com');
      $mail->addAddress('bright.securitysystem@gmail.com');
        $mail->addAddress('info@brightsecuritysystem.com');
        
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
		}
	else {
		echo "Error: " .$sql . "<br>" .$conn->error;
	}




$conn->close();

}

?>

