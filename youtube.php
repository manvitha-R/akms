

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
                   <form action="code.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group mb-3">
                    <label for="">Title</label>
            <input type="text" name="title" placeholder="enter name" class="form-control" required autocomplete="off">

                    </div>
                    
                    <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Youtube Link</label>
            <textarea class="form-control" name="youtube_link" placeholder="paste a  youtube link"  id="exampleFormControlTextarea1" rows="3" ></textarea>

                    </div>
                    
                    
                    <div class="from-group">
                   
                    <button type="submit" name="Save_Video" class="btn btn-primary">Upload Now</button>
         <a href="index1.php" class="btn btn-danger">Go Back</a>
                        <!-- <a href="password-reset.php" class="float-end">Forgot Your Password?</a> -->

                    </div>
</form>


                </div>
               </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>