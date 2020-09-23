<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
 error_reporting(0);
include_once 'config.php';
?>
<html>
   <head>
      <title>Welcome Employee</title>
	<style>
.selectBox{
  border-radius:4px;border:1px solid #AAAAAA;background: none repeat scroll 0 0 #FFFFFF;
  background-color:  #e0e0eb; height: 23px;
}
  .navbar a:hover {
  background: #ddd;
  color: black;
}
.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.navbar {
  overflow: hidden;
  background-color: #333;
  top: 0;
  width: 100%;
}
	</style>
   </head>
   <body> 
	
	<?php
	$server= strval($_POST['server']);
	$username= strval($_POST['username']);
	$password= strval($_POST['password']);
	$mailbody = strval($_POST['mailbody']);
	$mail = new PHPMailer(true);
try {
    //Server settings smtp.gmail.com
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = $server;                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $username;                      // SMTP username
    $mail->Password   = $password;                          // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($username, 'Mailer');
	
	$query = "SELECT distinct * FROM invite";
	$result1 = mysqli_query($db, $query);
	if(mysqli_num_rows($result1) > 0){
	//write for each here
	while ($row = mysqli_fetch_array($result1))
	{
		$mail->addAddress($row[1], $row[0]); 
	//echo $row['email'];
	}
	
	mysqli_free_result($result1);
	}
 // Add a recipient
 //   $mail->addAddress('jenyraval@gmail.com');               // Name is optional
 //   $mail->addReplyTo('jenyraval@gmail.com', 'Information');
 //   $mail->addCC('jenyraval@gmail.com');
 //   $mail->addBCC('jenyraval@gmail.com');
	 // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Invite!';
	$base_url = 'http://localhost/mails/';
	//$base_url='https://testingskynet.000webhostapp.com/';
	$track_code = md5(rand());
	//$track_code="edd01942d7740ac906238c8331d45b3d";
	$mailbody.='<img src="'.$base_url.'email_track.php?code='.$track_code.'" width=0 height=0><br><a href="http://localhost/mails/fakelink.php">Click here to avail the offer</a>';
	//$mailbody.='<img src="http://localhost/mails/bg.jpg">';
    $mail->Body    = $mailbody;
    $mail->AltBody = $mailbody;
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
    $mail->send();
    echo 'Message has been sent';
	$query = "
		INSERT INTO email_data (email_subject, email_body, email_address, email_track_code) VALUES 
		('subject', '$mailbody', 'email', '$track_code')
		";
	$r=mysqli_query($db,$query);

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
	?>