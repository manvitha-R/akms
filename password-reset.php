<?php 
session_start();

$page_title = "Password Reset Form";
include('includes/header.php');
include('navbar.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
    
            <div class="col-md-6">
            <?php include('message.php');?>
               <div class="card shadow">
          
                <div class="card-header">
                    <h5>Reset Password</h5>
                </div>
                <div class="card-body">
                   <form action="password-reset-code.php" method="POST">
                    
                    <div class="form-group mb-3">
                        <label for="">Email Address</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email Address">

                    </div>
                    
                   
                    
                    <div class="from-group mb-3">
                        <button type="submit" name="password_reset_link" class="btn btn-primary">Send</button>
                        <a class="btn btn-danger" href="login.php" >Cancel</a>
                        
                    </div>
</form>

                </div>
               </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>