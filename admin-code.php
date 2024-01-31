<?php
session_start();
require 'dbcon.php';

if(isset($_POST['login_now_btn']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $log_query = "SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1";
    $log_query_run = mysqli_query($con, $log_query);

    if(mysqli_num_rows($log_query_run) > 0)
    {
        foreach($log_query_run as $row){
        $user_id = $row['id'];
        $user_name = $row['name'];
        $user_email = $row['email']; 
        
        $user_phone = $row['phone']; 
        
        }
        $_SESSION['auth'];
                $_SESSION['auth_user'] = [
            'user_id' =>$user_id,
            'user_name' =>$user_name,
            'user_email' =>$user_email,
            
            'user_phone' =>$user_phone,
            

        ];
            
        $_SESSION['message'] = "Logged In Successfully";
        header('Location: index1.php');

    }
    else
    {
        $_SESSION['message'] = "Invalid Email or Password";
        header('Location: student-admin.php');
    }

}
else
{
    $_SESSION['status'] = "Access Denied";
    header('Location: student-admin.php');
}

?>