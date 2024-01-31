<?php 
session_start();

$page_title = "Change Password Form";
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
                    <h5>Change Password</h5>
                </div>
                <div class="card-body">
                   <form action="password-reset-code.php" method="POST">
                    <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">

                    <div class="form-group mb-3">
                        <label for="">Email Address</label>
                        <input type="text" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" class="form-control" placeholder="Enter Email Address">

                    </div>
                    <div class="form-group mb-3">
                        <label for="">New Password</label>
                        <input type="text" name="new_password" class="form-control" placeholder="Enter New Password">

                    </div>
                    <div class="form-group mb-3">
                        <label for="">Confirm Password</label>
                        <input type="text" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">

                    </div>
                    
                   
                    
                    <div class="from-group mb-3">
                        <button type="submit" name="password_update" class="btn btn-success w-100">Update Password</button>
                    </div>
</form>

                </div>
               </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>