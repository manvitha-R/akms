<?php 
session_start();
include('dbcon.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function  send_password_reset($get_name,$get_email,$token)
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
		$mail->setFrom('amruthss19@gmail.com',$get_name);
		$mail->addAddress($get_email);     //Add a recipient
		
		//Attachments
		// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
	
		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Reset Password Notification';
		// $mail->Body    = "Thanks for registration!
		//   Click the link below to verify the email address
		//   <a herf='http://localhost/form1/verify.php?email=$email&v_code=$v_code'>Verify</a>";
		  $mail->Body ="
      <h2>Hello</h2>
	  <h3>You are receiving this email because we received a password reset request for your account.</h3>
      <h4>Click the link below to reset password..</h4>
      <br/><br/>
      <a href='http://localhost/Akm/password-change.php?token=$token&email=$get_email'> Click Me </a>
      ";
  
		$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}


}

if(isset($_POST['password_reset_link']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM register WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_token = "UPDATE register SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            send_password_reset($get_name,$get_email,$token);
            $_SESSION['status'] = "We e-mailed you a password reset link";
            header("Location: password-reset.php");
            exit(0);

        }
        else
        {
            $_SESSION['status'] = "Something went wrong. #1";
        header("Location: password-reset.php");
        exit(0);

        }



    }
    else
    {
        $_SESSION['status'] = "No Email Found";
        header("Location: password-reset.php");
        exit(0);
    }
    
}

if(isset($_POST['password_update']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password))
        {
            $check_token = "SELECT verify_token FROM register WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token);

            if(mysqli_num_rows($check_token_run) > 0)
            {
                if($new_password == $confirm_password)
                {
                    $update_password = "UPDATE register SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($con, $update_password);

                    if($update_password_run)
                    {
                        $new_token = md5(rand())."AKMS";
                        $update_to_new_token = "UPDATE register SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($con, $update_to_new_token);
    
                        $_SESSION['status'] = "New Password Successfully Updated..!";
                        header("Location: login.php");
                        exit(0);

                    }
                    else
                    {
                    $_SESSION['status'] = "Did not update password.. Something went wrong..!";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);
    
                    }    
                    
                }
                else
                {
                $_SESSION['status'] = "Password and confirm Password does not match";
                header("Location: password-change.php?token=$token&email=$email");
                exit(0);

                }    
            }

            else
            {
                $_SESSION['status'] = "Invalid Token";
        header("Location: password-change.php?token=$token&email=$email");
        exit(0);


            }

        }
        else
        {
            $_SESSION['status'] = "All Filed are Mandetory";
        header("Location: password-change.php?token=$token&email=$email");
        exit(0);

        }

    }
    else
    {
        $_SESSION['status'] = "No Token Available";
        header("Location: password-change.php");
        exit(0);

    }

}

?>