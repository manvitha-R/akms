<?php
session_start();
?>

<?php include('includes/header.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Register</title>

   <link rel="stylesheet" href="css2/style.css">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">



   
   <!-- <script type="text/javascript">
        function text(x){
            if(x==0)
            document.getElementById('mycode').style.display = 'block';
            else
            document.getElementById('mycode').style.display = 'none';
        }

        </script>  -->

</head>

<body>
   <form class="texts" action="code.php" method="post" enctype="multipart/form-data">
      <?php include('message.php');?>
      <?php include('email.php');?>
      <div class="title">
         <h2>ADD MEMBERS</h2>
      </div>
      <div class="half">
         <div class="item">
            <label for="">Name</label>
            <input type="text" name="mem_name" placeholder="enter name" required>
         </div>
        
      </div>

      <div class="half">
         <div class="item">
            <label for="">Date</label>
            <input type="date" name="mem_date"  required>
         </div>
        
      </div>
    
      


      <div class="half">
         <div class="item">
            <label for="">House Number</label>
            <input type="text" name="mem_house_no" placeholder="enter house No" autocomplete="off">
         </div>
         <div class="item">
            <label for="">Block</label>
            <input type="text" name="mem_block_no"  placeholder="enter block" autocomplete="off">
         </div>
      </div>

      <div class="full">
         <div class="items">
            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
            <textarea class="test" name="mem_address" id="exampleFormControlTextarea1" rows="3"></textarea>
         </div>
      </div>

      <!-- radio  button -->


      <label> Do you want to display Contact Number and Email Address to Other Members?</label><br>
       <div class="mb-3">
       <label> Display Type </label>
       <Input type = 'Radio' Name ='display' value= 'yes' onclick="text(0)" checked><span class="pl-2">YES</span>
       <Input class="ml-5" type = 'Radio' Name ='display' value= 'no' onclick="text(1)"><span class="pl-2">NO</span>
            
      </div>
      <!-- <label> Do you want to display Contact Number and Email Address to Other Members?</label><br>
       <div class="mb-3">
       <label> Display Type </label>
       <Input type = 'Radio' Name ='display' value= 'yes' onclick="text(0)" checked><span class="pl-2">YES</span>
       <Input class="ml-5" type = 'Radio' Name ='display' value= 'no' onclick="text(1)"><span class="pl-2">NO</span>
            
      </div> -->
         
 
    <!-- <div class="col-12" style="text-align: center;"> -->
    <div> 
    <div class="half" >
         <div class="item">
            <label>Contact #</label>
            <input type="tel" pattern="[0-9]{10}" maxlength="10" name="mem_res_ph_no" placeholder="enter Residence number"
            autocomplete="off" required>
         </div>
         <div class="item">
            <label>Mobile No.</label>
            <input type="tel" pattern="[0-9]{10}" maxlength="10" name="mem_mobile_no" placeholder="enter Mobile Number"
            autocomplete="off" required>
         </div>
      </div>
      
      
    <div class="half" >
         <div class="item">
            <label for="">Email</label>
            <input type="text" name="mem_email_id"  placeholder="enter email" required  autocomplete="off">
         </div>
      </div>
     </div>
    <!-- </div> --> 

    <!-- radio button ended -->
    
    <div class="full">
         <div class="item">
            <label>Membership</label>
            <select name="mem_mem_type" class="tests" required>
            <option value="">--Select Membership Type--</option>
               <?php
               $conn=mysqli_connect("localhost","root","","testing") or die ("Failed to connect with DB");
               $query="select * from membership_type";
               $result=mysqli_query($conn,$query);
               while($row=mysqli_fetch_array($result)){

               
               ?>
               <option value="<?php echo $row['mem_type_name'];?>"><?php echo $row['mem_type_name'];?></option>
              
               <?php
               }
               ?> 
                
                         
              <!-- <option  value="">--Select Membership--</option>
               <option value="Annual member">Annual member</option>
               <option value="Life member">Life member</option>
               <option value="Honorary members">Honorary members</option> -->
            </select>
         </div>
      </div>
      <div class="full">
         <label> Upload Image </label>
         <input type="file" name="image" id="images" required>
      </div>
 
    

      <div class="action">
         <input type="submit" name="Save_Student" value="REGISTER">
         <a href="index1.php" class="btn btn-danger">Go Back</a>
      </div>



   </form>
</body>

</html>