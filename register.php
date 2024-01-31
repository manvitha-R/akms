<?php 
session_start();

$page_title = "Register Form";
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
                    <h5>Register Form</h5>
                </div>
                <div class="card-body">
             
                   <form action="code.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>

                    </div>

                   

                    
      
   


                    <div class="form-group mb-3">
                        <label for="">Email Address</label>
                        <input type="text" name="email" class="form-control" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone Number</label>
                        <input type="tel" pattern="[0-9]{10}" maxlength="10" name="phone" class="form-control" required>
                        <!-- <input type="text" name="phone" class="form-control" required> -->

                    </div> 

                        <!-- radio button ended -->
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" required>

                    </div>
                   

                    <!-- <div class="form-group mb-3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control">

                    </div> -->
                    <div class="from-group">
                        <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                        <a class="btn btn-danger" href="index.php" >Cancel</a>
                    </div>
</form>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>