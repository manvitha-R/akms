<?php
session_start();
include('dbcon.php');

if(isset($_POST['submit_btn']))
{
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$display = mysqli_real_escape_string($con, $_POST['display']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
	$mtounge = mysqli_real_escape_string($con, $_POST['mtounge']);
	$dob = mysqli_real_escape_string($con, $_POST['dob']);
	$age = mysqli_real_escape_string($con, $_POST['age']);
	$street = mysqli_real_escape_string($con, $_POST['street']);
	$taluk = mysqli_real_escape_string($con, $_POST['taluk']);
	// $display = mysqli_real_escape_string($con, $_POST['display']);
	$district =  mysqli_real_escape_string($con, $_POST['district']);
	$state =  mysqli_real_escape_string($con, $_POST['state']);
	$pin =  mysqli_real_escape_string($con, $_POST['pin']);
	$prm_street = mysqli_real_escape_string($con, $_POST['prm_street']);
	$prm_taluk = mysqli_real_escape_string($con, $_POST['prm_taluk']);
    $prm_district =  mysqli_real_escape_string($con, $_POST['prm_district']);
	$prm_state =  mysqli_real_escape_string($con, $_POST['prm_state']);
	$prm_pin =  mysqli_real_escape_string($con, $_POST['prm_pin']);
	$education =  mysqli_real_escape_string($con, $_POST['education']);
	$work_place =  mysqli_real_escape_string($con, $_POST['work_place']);
	$aadhar =  mysqli_real_escape_string($con, $_POST['aadhar']);
	$mem_type_name =  mysqli_real_escape_string($con, $_POST['mem_type_name']);
	
	$images = mysqli_real_escape_string($con, $_FILES["image"]['name']);
	
	if(file_exists("uploads/". $_FILES["image"]["name"]))

	{
		$store = $_FILES["image"]["name"];
		$_SESSION['status']= "Image already exists. '.$store.'";
		header("Location: membership.php");
	
	}
	else
	{
		$query = "INSERT INTO membership_form (name,gender,mtounge,dob,age,display,email,phone,street,taluk,district,state,pin,prm_street,prm_taluk,prm_district,prm_state,prm_pin,education,work_place,aadhar,mem_type_name,images) 
		         VALUES ('$name','$gender','$mtounge','$dob','$age','$display','$email','$phone','$street','$taluk','$district','$state','$pin','$prm_street','$prm_taluk','$prm_district','$prm_state','$prm_pin','$education','$work_place','$aadhar','$mem_type_name','$images')";
	
	    $query_run = mysqli_query($con, $query);
	
		
	
	if($query_run)
	{
		move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$_FILES["image"]["name"]);
		$_SESSION['message'] = "Member Created Successfully";
		header("Location: index1.php");
		exit(0);
		
	}
	else
	{
		
		$_SESSION['message'] = "Member Not Created ";
		header("Location: index1.php");
		exit(0);
		
	}

	}
	
}



if(isset($_POST['update_member']))
{
	$membership_form_id = $_POST['id'];
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$display = $_POST['display'];
	$gender = $_POST['gender'];
	$mtounge = $_POST['mtounge'];
	
	$dob = $_POST['dob'];
	$age = $_POST['age'];
	$street = $_POST['street'];
	$taluk =  $_POST['taluk'];
	$district =  $_POST['district'];
	$state =  $_POST['state'];
	$pin =  $_POST['pin'];
	$prm_street =  $_POST['prm_street'];
	$prm_taluk =  $_POST['prm_taluk'];
	$prm_district =  $_POST['prm_district'];
	$prm_state =  $_POST['prm_state'];
	$prm_pin =  $_POST['prm-pin'];
	$education =  $_POST['education'];
	$work_place =  $_POST['work_place'];
	$aadhar =  $_POST['aadhar'];
	$mem_type_name =  $_POST['mem_type_name'];
	$images = $_FILES["images"]['name'];
	$old_images = $_POST["old_images"];
    //  $display = $_POST["display"];
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
		if(file_exists("uploads/". $_FILES["images"]["name"]))
		{
		$filename = $_FILES["images"]["name"];
		$_SESSION['status']= "Image already Exists. '.$filename.'";
		header("Location: index1.php");
		}
	}
	else
	{ 
	 
	
		$query = "UPDATE membership_form SET name='$name', gender='$gender',mtounge='$mtounge', dob='$dob', age='$age', display='$display', email='$email', phone='$phone', street='$street', taluk='$taluk', district='$district', state='$state', pin='$pin', prm_street='$prm_street', prm_taluk='$prm_taluk', prm_district='$prm_district', prm_state='$prm_state', prm_pin='$prm_pin', education='$education', work_place='$work_place', aadhar='$aadhar', mem_type_name='$mem_type_name', images='$update_filename' WHERE id='$membership_form_id' ";
		$query_run = mysqli_query($con, $query);
		
			if($query_run)
			{
				if($_FILES['images']['name'] !='')
				{
					move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$_FILES["image"]["name"]);
				    unlink("uploads/".$old_image);
					
				}
				$_SESSION['message'] = "Member updated  Successfully";
				header("Location: index1.php");
			}
			else
			{
				$_SESSION['message'] = "Member not updated Successfully";
				header("Location: index1.php");
			}

		}
}



?>