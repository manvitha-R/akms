

<?php 
session_start();
// if(isset($_SESSION['authenticated']))
// {
//     $_SESSION['status'] = "You are already Logged In";
//     header('Location: dashboard.php');
//     exit(0);
// }

$page_title = "Login Form";
include('includes/header.php');
include('menu1.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
    
            <div class="col-md-6">
            <?php include('message1.php');?>
               <div class="card shadow">
          
                <div class="card-header">
                    <h5>Admin Form</h5>
                </div>
                <div class="card-body">
                   <form action="code.php" method="POST">
                    
                    <div class="form-group mb-3">
                        <label for="">Membership Type</label>
                        <input type="text" name="mem_type_name" class="form-control">

                    </div>
                    
                    
                    
                    <div class="from-group">
                        <button type="submit" name="save_btn" class="btn btn-primary">Save</button>
                        <a class="btn btn-danger" href="index1.php" >Cancel</a>
                        <!-- <a href="password-reset.php" class="float-end">Forgot Your Password?</a> -->

                    </div>
</form>
<hr>
<!-- <h5>
    Did not recieve your Verification Email?
    <a href="resend-email-verification.php">Resend</a>
</h5> -->
                </div>
               </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>