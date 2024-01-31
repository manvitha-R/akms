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
   <div class="col-md-12" >
    

         <div class="card text-center">

            <div class="card-header">
             
               <h3 class="text-center"> -- Members Details --</h3>
               <h4>
                  <a href="add-document.php" class="btn btn-primary float-end">Upload Document</a>
                </h4>

             
            </div>
            

            <div class="card-body">
           

            <form action="code1.php" method="POST">
               <?php include('message1.php');  ?>
                  <table class="table table-bordered table-striped">

                     <thead>
                        <tr>
                           <th>
                              <button type="submit" name="deleting" class="btn btn-danger"
                                 onclick="return confirm('Do you want delete this record..?');">Delete</button>
                           </th>
                           <th> ID</th>
                         
                           <th>name</th>
                           <th> Date</th>

                     
                          
                         <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
     $query = "SELECT * FROM document";
     $query_run = mysqli_query($con,$query);
     
     if(mysqli_num_rows($query_run) > 0)
     {
      foreach($query_run as $document)
      {
       
       ?>

                        <tr>
                           <td class="text-center">
                              <input type="checkbox" name="del_chk[]" value="<?=$document['id']; ?>">
                           </td>
                           <td>
                              <?=$document['id']; ?>
                           </td>
                           
                           <td>
                              <?=$document['mem_doc_name']; ?>
                           </td>
                           <td>
                              <?=$document['mem_date']; ?>
                           </td>

<!--                           
                          
                           <td>
                           <embed type="application/pdf" src="pdf/<?=$mem_notify['pdf'] ; ?>">
                             
      </td> -->

 
      
      <td>
                          <a view="<?php echo $pdf_file;?>" target="_blank"  onclick="openview()" href="pdf/<?=$document['pdf'] ; ?>">view</a>
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
</div>

<?php include('includes/footer.php'); ?>
