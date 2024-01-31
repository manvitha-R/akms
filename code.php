<?php
session_start();
include('dbcon.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name,$email,$verify_token)
{
   
    // require ("PHPMailer/PHPMailer.php");
	// require ("PHPMailer/SMTP.php");
	// require ("PHPMailer/Exception.php");

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
		$mail->Subject = 'Email Verification from AKMS';
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

if(isset($_POST['register_btn']))
{
    $name = $_POST['name'];  
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


    $verify_token = md5(rand());
 
   
	
    
    
    // Email Exists or not
    $check_email_query = "SELECT email FROM register WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0 )
    {
        $_SESSION['status'] = "Email Id already Exists";
        header("Location: register.php");
    }
    else
    {
     
        // Insert User / Registered User Data
        $query = "INSERT INTO register (name,email,phone,password,verify_token) VALUES ('$name','$email','$phone','$password','$verify_token')";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            sendemail_verify("$name","$email","$verify_token");
      
            $_SESSION['status'] = "Register Successfull..! Please verify your Email Address";
            header("Location: register.php");
        }
        else
        {
            $_SESSION['status'] = "Registration Failed";
            header("Location: register.php");
        }
    }
}




if(isset($_POST['save_btn']))
{
	$mem_type_name = mysqli_real_escape_string($con, $_POST['mem_type_name']);
	// $mem_type_amount = mysqli_real_escape_string($con, $_POST['mem_type_amount']);
	
		$query = "INSERT INTO membership_type (mem_type_name) VALUES ('$mem_type_name')";
	
	    $query_run = mysqli_query($con, $query);
	 
		
	if($query_run)
	{
		
		$_SESSION['message'] = "Membership Type Added Successfully";
		header("Location: mtype-index.php");
		exit(0);
		
	}
	else
	{
		
		$_SESSION['message'] = "Membership Type Not Created ";
		header("Location: create-member.php");
		exit(0);
		
	}
	
}

if(isset($_POST['update_btn']))
{
	$membership_type_id = $_POST['id'];
	
	$mem_type_name = $_POST['mem_type_name'];


	if($images != '')
	{
       $update_filename = $_FILES['images']['name'];
	}
	else
	{
       $update_filename = $old_images;
	}
    if($_FILES['images']['name'] !='')
	{
		if(file_exists("upload/". $_FILES["images"]["name"]))
		{
		$filename = $_FILES["images"]["name"];
		$_SESSION['status']= "Image already Exists. '.$filename.'";
		header("Location: index1.php");
		}
	}
	else
	{
		$query = "UPDATE membership_type SET mem_type_name='$mem_type_name' WHERE id='$membership_type_id' ";
		$query_run = mysqli_query($con, $query);
		
			if($query_run)
			{
				// if($_FILES['images']['name'] !='')
				// {
				// 	move_uploaded_file($_FILES["image"]["tmp_name"], "upload/".$_FILES["image"]["name"]);
				//     unlink("upload/".$old_image);
					
				// }
				$_SESSION['message'] = "Member updated  Successfully";
				header("Location: mtype-index.php");
			}
			else
			{
				$_SESSION['message'] = "Member not updated Successfully";
				header("Location: mtype-index.php");
			}

		}
}

if(isset($_POST['Save_Upload'])) 
	{
		$mem_doc_name = mysqli_real_escape_string($con, $_POST['mem_doc_name']);
		$mem_date = mysqli_real_escape_string($con, $_POST['mem_date']);
	
		$pdf=$_FILES['pdf']['name'];
		$pdf_type=$_FILES['pdf']['type'];
		$pdf_size=$_FILES['pdf']['size'];
		$pdf_tem_loc=$_FILES['pdf']['tmp_name'];
		$pdf_store="pdf/".$pdf;

		move_uploaded_file($pdf_tem_loc,$pdf_store);

		$query="INSERT INTO document (pdf,mem_doc_name,mem_date) VALUES('$pdf','$mem_doc_name','$mem_date')";
		$query=mysqli_query($con,$query);

		
if($query_run)
{
	
	$_SESSION['message'] = "PDF upload Successfully";
	header("Location: document-index.php");
	exit(0);
	
}
else
{
	
$_SESSION['message'] = "PDF  upload successfully ";
	header("Location: document-index.php");
	exit(0);
	}

	}



	
if(isset($_POST['Save_Video']))
{
	$title = mysqli_real_escape_string($con, $_POST['title']);
	// $date = mysqli_real_escape_string($con, $_POST['date']);
	
	$youtube_link = mysqli_real_escape_string($con, $_POST['youtube_link']);
	
	
	
		$query = "INSERT INTO video (title,youtube_link) VALUES ('$title','$youtube_link')";
	
	    $query_run = mysqli_query($con, $query);
	
	
	if($query_run)
	{
		
		$_SESSION['message'] = "Notification Send  Successfully";
		header("Location: index1.php");
		exit(0);
		
	}
	else
	{
		
		$_SESSION['message'] = "Notifiaction Not Created ";
		header("Location: notification.php");
		exit(0);
		
	}

	}

	if(isset($_POST['Save_uploded']))
    {
	
	$images = mysqli_real_escape_string($con, $_FILES["image"]['name']);
	
	
	if(file_exists("uploads/". $_FILES["image"]["name"]))

	{
		$store = $_FILES["image"]["name"];
		$_SESSION['status']= "Image already exists. '.$store.'";
		header("Location: add-image.php");
	
	}
	
	else
	{
		$query = "INSERT INTO photo (images) VALUES ('$images')";
	
	    $query_run = mysqli_query($con, $query);
	
		
	
	if($query_run)
	{
		move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$_FILES["image"]["name"]);
		$_SESSION['message'] = "Image upload Successfully";
		header("Location: add-image.php");
		exit(0);

		
		
	}
	else
	{
		
		$_SESSION['message'] = "Image Not upload Created ";
		header("Location: student-image.php");
		exit(0);
		
	}

	}
	
}

?>