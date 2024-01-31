<?php 
session_start();

$page_title = "Register Form";
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
                    <h5>Membership Form</h5>
                </div>
                <div class="card-body">
                <form  class="texts" action="membership-code.php" method="POST"  enctype="multipart/form-data">
                    <div class="main-form mt-3 border-bottom">
                    <div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>

                    </div>
</div>
<!-- <div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>

                    </div>
                    
</div> -->
</div>



<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Gender</label>
                    <select class="form-select" name="gender" aria-label="Default select example">
  <option selected>Select gender</option>
  <option value="male">Male</option>
  <option value="female">Female</option>
  
</select>

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Mother Tounge</label>
                        <input type="text" name="mtounge" class="form-control" required>

                    </div>
                    
</div>
</div>

<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" class="form-control" name="dob" onchange="calculateAge()">

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Age:</label>
    <input type="text" id="age" class="form-control" name="age" readonly>

                    </div>
                    
</div>
</div>
<label> Do you want to display Contact Number and Email Address to Other Members?</label><br>
       <div class="mb-3">
       <label> Display Type </label>
       <Input type = 'Radio' Name ='display' value= 'yes' onclick="text(0)" checked><span class="pl-2">YES</span>
       <Input class="ml-5" type = 'Radio' Name ='display' value= 'no' onclick="text(1)"><span class="pl-2">NO</span>
            
      </div>
<div class="row">
                        <div class="col-md-5">
                       <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" required>

                    </div>
                 </div>
                      <div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Mobile</label>
                        <input type="text" name="phone" class="form-control" required>

                    </div>
                    
                       </div>
</div>
   <!-- radio  button -->



<div class="col-md-10">
<div class="form-group mb-3">
<label for="street">Street Address:</label><br>
        <input type="text" id="street" class="form-control" name="street" >

</div>
</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="taluk">Taluk</label>
        <input type="text" id="taluk" class="form-control" name="taluk" required>

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="district">District</label>
        <input type="text" id="district" class="form-control" name="district" required>

                    </div>
                    
</div>
</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="state">State:</label>
        <input type="text" id="state" class="form-control" name="state" required>

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="pin">Pin Code:</label>
        <input type="text" id="pin" class="form-control" name="pin" required>

                    </div>
                    
</div>
</div>
<input type="checkbox" id="sameAddress" onchange="copyAddress()"> 
        <label for="sameAddress">Same as above</label>


        <div id="billingAddress">
        <div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingStreet">Street Address:</label><br>
            <input type="text" id="prm_street" name="prm_street"  class="form-control">

                    </div>
</div>

</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingStreet">Taluk</label><br>
            <input type="text" id="prm_taluk" name="prm_taluk"  class="form-control">

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
  
                    <label for="billingCity">District</label><br>
            <input type="text" id="prm_district" name="prm_district" class="form-control">

                    </div>
                    
</div>
</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingState">State:</label><br>
            <input type="text" id="prm_state" name="prm_state" class="form-control">

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingpin">Pin Code:</label><br>
            <input type="text" id="prm_pin" name="prm_pin" class="form-control">

                    </div>
                    
</div>
</div>
</div>

<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="dob">Education</label>
    <input type="text"  class="form-control" name="education" >

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Work Place</label>
    <input type="text"  class="form-control" name="work_place" required>

                    </div>
                    
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Aadhar Card No</label>
    <input type="text"  class="form-control" name="aadhar" >

                    </div>
                    
</div>
</div>
<label>Membership</label>
            <select name="mem_type_name" class="form-control" required>
            <option value="">--Select Membership Type--</option>
               <?php
               $conn=mysqli_connect("localhost","root","","akms") or die ("Failed to connect with DB");
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
            </select><br>
<div class="full">
         <label> Upload Image </label>
         <input type="file" name="image" id="images" required>
      </div>
      <br>
  

      

<div class="from-group">
                        <button type="submit" name="submit_btn" class="btn btn-primary">Submit Now</button>
                        <a class="btn btn-danger" href="index.php" >Cancel</a>
                    </div>


</form>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
   
<script>
        function calculateAge() {
            // Get the date of birth from the input field
            var dob = new Date(document.getElementById("dob").value);

            // Get the current date
            var currentDate = new Date();

            // Calculate the age
            var age = currentDate.getFullYear() - dob.getFullYear();

            // Check if the birthday has occurred this year or not
            if (currentDate.getMonth() < dob.getMonth() || (currentDate.getMonth() === dob.getMonth() && currentDate.getDate() < dob.getDate())) {
                age--;
            }

            // Display the calculated age in the input field
            document.getElementById("age").value = age;
        }
    </script>

<script>
        function copyAddress() {
            if (document.getElementById("sameAddress").checked) {
                document.getElementById("prm_street").value = document.getElementById("street").value;
                document.getElementById("prm_taluk").value = document.getElementById("taluk").value;
                document.getElementById("prm_district").value = document.getElementById("district").value;
                document.getElementById("prm_state").value = document.getElementById("state").value;
                document.getElementById("prm_pin").value = document.getElementById("pin").value;
            } else {
                document.getElementById("prm_street").value = "";
              
                document.getElementById("prm_taluk").value = "";
                document.getElementById("prm_district").value = "";
                document.getElementById("prm_state").value = "";
                document.getElementById("prm_pin").value = "";
            }
        }
    </script>
<?php include('includes/footer.php'); ?>