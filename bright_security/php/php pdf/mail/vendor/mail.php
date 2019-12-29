<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'autoload.php';

$mail = new PHPMailer();                              // Passing `true` enables exceptions
    //Server settings
   // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'email-smtp.eu-west-1.amazonaws.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'AKIAJ24KTO33P4PEX2UA';
$mail->Password = 'LmXd9L4omhd2OcQa5j91nGtPbmH9ObUHT541N27w';                        // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

   $mail->setFrom('kanestrelentlessly@gmail.com', 'JMV Developers');
$mail->Subject ='Thank You For Visiting';
$mail->AddEmbeddedImage('harit-actual1.jpg', 'http://www.jmvdevelopers.com/images/harit/actual/harit-actual1.jpg');
$mail->AddEmbeddedImage('JMV-harit-homes-jewar-air.jpg', 'http://www.jmvdevelopers.com/images/JMV-harit-homes-jewar-air.jpg');
$mail->AddEmbeddedImage('JMV-harit-homes-jewar-air.jpg', 'http://www.jmvdevelopers.com/images/JMV-harit-homes-jewar-air.jpg');
$mail->AddEmbeddedImage('JMV-harit-homes.jpg','http://www.jmvdevelopers.com/images/harit/JMV-harit-homes.jpg');
$mail->Body ='Message for visitor';
$mail->Addaddress('555sachinkumartermination@gmail.com','Sachin');




if(!$mail->send()) {
    echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
} else {
    echo "Email sent!" , PHP_EOL;
}
  
  
?>