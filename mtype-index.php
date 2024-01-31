<?php
session_start();

// if(!isset($_SESSION['auth_user']))
// {
//   header("Location: login.php");
// }
include('menu1.php');
require 'dbcon.php';
?>


<?php include('includes/header.php'); ?>

<div class="container mt-5">




   <div class="row">
   <div class="col-md-11" >
    

         <div class="card text-center">

            <div class="card-header">
             
               <h3 class="text-center"> -- Members Details --</h3>
               <h4>
                  <a href="membership-create.php" class="btn btn-primary float-end">Add Membership Type</a>
                </h4>

             
            </div>
            

            <div class="card-body">
           

               <form action="code1.php" method="POST">
                  
                 <?php include('message1.php');  ?>
                  <table class="table table-bordered table-striped">

                     <thead>
                        <tr>
                        <th>
                              <button type="submit" name="del_multiple_data" class="btn btn-danger"
                                 onclick="return confirm('Do you want delete this record..?');">Delete</button>
                           </th>

                           <th>Member ID</th>
                          <th> Membership Type</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
     $query = "SELECT * FROM membership_type";
     $query_run = mysqli_query($con,$query);
     
     if(mysqli_num_rows($query_run) > 0)
     {
      foreach($query_run as $membership_type)
      {
       
       ?>

                        <tr>
                        <td class="text-center">
                              <input type="checkbox" name="del_chk[]" value="<?=$membership_type['id']; ?>">
                           </td>

                           <td>
                              <?=$membership_type['id']; ?>
                           </td>
                          
                           <td>
                              <?=$membership_type['mem_type_name']; ?>
                           </td>
                        

                         
                           
                           <td>
                              <a href="mtype-view.php?id=<?= $membership_type['id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="mtype-edit.php?id=<?= $membership_type['id']; ?>"
                                 class="btn btn-success btn-sm">Edit</a>
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
