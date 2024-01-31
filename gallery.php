<?php
session_start();
require 'dbcon.php';
?>
<!DOCTYPE html>
<html>

<head>
   <title></title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/css?family=josefin+Sans&display=Swap" rel="stylesheet">

</head>

<body>
   <?php include('navbar.php');  ?>
   <?php include('message.php');  ?>

   <section class="my-3">
      <div class="py-3">
         <h2 class="text-center">Gallery</h2>
      </div>
      <div class="container-fluid">
         <!-- <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
               <img src="images/nature.jpg" class="img-fluid pb-4">
            </div>
            <div class="col-lg-4 col-md-4 col-12">
               <img src="images/nasa.jpg" class="img-fluid pb-4">
            </div>
            <div class="col-lg-4 col-md-4 col-12">
               <img src="images/office2.jpg" class="img-fluid pb-4">
            </div>
            <div class="col-lg-4 col-md-4 col-12">
               <img src="images/office3.jpg" class="img-fluid pb-4">
            </div>
            <div class="col-lg-4 col-md-4 col-12">
               <img src="images/office4.jpg" class="img-fluid pb-4">
            </div>


         </div> -->
         <?php
     $query = "SELECT * FROM photo";
     $query_run = mysqli_query($con,$query);
     
     if(mysqli_num_rows($query_run) > 0)
     {
      foreach($query_run as $photo)
      {
       
       ?>

         <tr>


            <td>
               <?='<img src="uploads/'.$photo['images'].'" width="300px;" height="200px" alt="images">'?>
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

      </div>


   </section>



   <footer>
      <p class="p-3 bg-dark text-white text-center">Powered by [ONEVEGA Systems Pvt. Ltd.]</p>
   </footer>


   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>