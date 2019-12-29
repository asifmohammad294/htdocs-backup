<?php

require 'vendor/autoload.php';
require 'mail/vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require './vendor/autoload.php';

if (isset($_REQUEST['modify'])) {
    
    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    
    $html = "<style>
table {
    border-collapse: collapse;
    width: 100%;
  
}

th, td {
    text-align: left;
    padding: 8px;
     border:1px solid #d1d1d1;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>

<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Points</th>
  </tr>
  <tr>
    <td>Peter</td>
    <td>Griffin</td>
    <td>$100</td>
  </tr>
  <tr>
    <td>Lois</td>
    <td>Griffin</td>
    <td>$150</td>
  </tr>
  <tr>
    <td>Joe</td>
    <td>Swanson</td>
    <td>$300</td>
  </tr>
  <tr>
    <td>Cleveland</td>
    <td>Brown</td>
    <td>$250</td>
  </tr>
</table>
";
    
    function generateRandomString($length = 5)
    {
        $characters       = '0123456789';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
            
        }
        $randomString .= "application_" . $randomString . ".pdf";
        return $randomString;
    }
    
    $namegen = generateRandomString();
    
    $myfile = fopen($namegen, "w") or die("Unable to open file!");
    //$txt="";
    
    $dompdf->loadHtml($html);
    
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    // Output the generated PDF to Browser
    //$dompdf->stream();
    
    $output = $dompdf->output();
    $newf   = fwrite($myfile, $output);
    
    //file_put_contents($newf, $output);
    echo $namegen. "\r\n";
    
    $mail = new PHPMailer(true);
    
    // Passing `true` enables exceptions
    try {
        
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.zoho.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'info@stackoverlow.in'; // SMTP username
        $mail->Password   = 'stack@2811'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465; // TCP port to connect to
        
        //Recipients
        $mail->setFrom('info@stackoverlow.in', 'Stack Overlow');
        $mail->addAddress('grandprix.xspf@gmail.com');
        $mail->addAddress('amitrobinns@gmail.com');
        
        // $mail->addAddress('kanestrelentlessly@gmail.com');
        // Add a recipient
        //   $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
         $mail->addCC('amitrobinns@gmail.com');
        //$mail->addBCC('bcc@example.com');
        
        //Attachments
        $mail->addAttachment($namegen); // Add attachments
        //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        //$message = file_get_contents( 'index.html' );
        $mail->Body    = 'This is the body in plain text for non-HTML mail clients';
        //$mail->AltBody = ;
        
        $mail->send();
        echo 'Message has been sent';
        
    }
    catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    
}


?>
<form>
<input type="submit" name="modify" value="CLick Here" />

</form>
