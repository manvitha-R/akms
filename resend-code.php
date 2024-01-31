<?php
session_start();
include('dbcon.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function resend_email_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);

	try {
		//Server settings

		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'amruthss19@gmail.com';                     //SMTP username
		$mail->Password   = 'vmecueyjvjyffukp';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
		//Recipients
		$mail->setFrom('amruthss19@gmail.com', 'AKMS');
		$mail->addAddress($email);     //Add a recipient
		
		//Attachments
		// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
	
		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Resend - Email Verification from AKMS';
		// $mail->Body    = "Thanks for registration!
		//   Click the link below to verify the email address
		//   <a herf='http://localhost/form1/verify.php?email=$email&v_code=$v_code'>Verify</a>";
		  $mail->Body ="
      <h2>Hello</h2>
	  <h3>Thanks For Registration!!!</h3>
      <h4>Click the link below to verify the email address..</h4>
      <br/><br/>
      <a href='http://localhost/Akm/verify-emails.php?token=$verify_token'> Click Me </a>
      ";
 
		$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

}

if(isset($_POST['resend_email_verify_btn']))
{
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);

        $checkemail_query = "SELECT * FROM register WHERE email='$email' LIMIT 1";
        $checkemail_query_run = mysqli_query($con, $checkemail_query);

        if(mysqli_num_rows($checkemail_query_run) > 0)
        {
            $row = mysqli_fetch_array($checkemail_query_run);
            if($row['verify_status'] == "0")
            {
                $name = $row['name'];
                $email = $row['email'];
                $verify_token = $row['verify_token'];

                resend_email_verify($name,$email,$verify_token);
                $_SESSION['status'] = "Verification Email Link has been sent to your email address..!";
                header("Location: login.php");
                exit(0);

            }
            else
            {
                $_SESSION['status'] = "Email already verified. Please Login";
                header("Location: login.php");
                exit(0);

            }

        }
        else
        {
            $_SESSION['status'] = "Email is not registered. Please Register now..!";
            header("Location: register.php");
            exit(0);

        }
    }
    else
    {
        $_SESSION['status'] = "Please enter the email field";
        header("Location: resend-email-verification.php");
        exit(0);
    }
}

?>