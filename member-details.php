<?php
session_start();

// if(!isset($_SESSION['auth_user']))
// {
//   header("Location: login.php");
// }
include('navbar.php');
require 'dbcon.php';
?>


<?php include('includes/header.php'); ?>

<div class="container mt-5">




   <div class="row">
   <div class="col-md-12">
     <br>
      <br>
    <br>

         <div class="card">

            <div class="card-header">
             
               <h3 class="text-center"> -- Members Details --</h3>

             
            </div>

            <div class="card-body">

               <form action="code1.php" method="POST">
                  
                 <?php include('message.php');  ?>
                  <table class="table table-bordered table-striped">

                     <thead>
                        <tr>

                           <th>Member ID</th>
                           <th> Member Image</th>
                           <th>Member Name</th>
                          

                          
                           <th> Membership Type</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
     $query = "SELECT * FROM membership_form";
     $query_run = mysqli_query($con,$query);
     
     if(mysqli_num_rows($query_run) > 0)
     {
      foreach($query_run as $membership_form)
      {
       
       ?>

                        <tr>

                           <td>
                              <?=$membership_form['id']; ?>
                           </td>
                           <td>
                              <?='<img src="uploads/'.$membership_form['images'].'" width="100px;" height="60px" alt="images">'?>
                           </td>
                           <td>
                              <?=$membership_form['name']; ?>
                           </td>
                        

                         
                           <td>
                              <?=$membership_form['mtounge']; ?>
                           </td>
                           <td>
                              <a href="membership-view.php?id=<?= $membership_form['id']; ?>" class="btn btn-info btn-sm">View</a>

                            <!--<a href="login-view.php" class="btn btn-info btn-sm">View</a> -->

                           </td>







                        </tr>

                        <?php
      }

     }
     else
     {
       echo "<h5> No Record Found </h5>";

     }

  ?>

                     </tbody>

                  </table>
               </form>


            </div>
         </div>
      </div>
   </div>
</div>

<?php include('includes/footer.php'); ?>
