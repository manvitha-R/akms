<?php 
session_start();
include('dbcon.php');
$page_title = "Register Form";
include('includes/header.php');
include('menu1.php');

?>

<script type="text/javascript">
        function text(x){
            if(x==0)
            document.getElementById('mycode').style.display = 'block';
            else
            document.getElementById('mycode').style.display = 'none';
        }

        </script> 
<div class="py-5">
    <div class="container">
    
        <div class="row justify-content-center">
      
            <div class="col-md-6">
            <?php include('message1.php');?>
               <div class="card shadow">
             
                <div class="card-header">
                    <h5>Membership Form</h5>
                </div>
                <?php
      if(isset($_GET['id']))
      {
           $membership_form_id = mysqli_real_escape_string($con, $_GET['id']);
           $query = "SELECT * FROM membership_form WHERE id='$membership_form_id' ";
           $query_run = mysqli_query($con, $query);

           if(mysqli_num_rows($query_run) > 0)
           {
              $membership_form = mysqli_fetch_array($query_run);
              ?>
                <div class="card-body">
                <form  class="texts" action="membership-code.php" method="POST"  enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $membership_form['id']; ?>">
                    <div class="main-form mt-3 border-bottom">
                    <div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $membership_form['name']; ?>" required>

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
                    <select class="form-select" name="gender" value="<?= $membership_form['gender']; ?>"  aria-label="Default select example">
  <option selected>Select gender</option>
  <option value="male" 
  <?php
			   if($membership_form["gender"]=='male')
			   {
				echo "selected";
			   }
			   ?>>Male</option>
  <option value="female"
  <?php
			   if($membership_form["gender"]=='female')
			   {
				echo "selected";
			   }
			   ?>>Female</option>

               
  
</select>

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Mother Tounge</label>
                        <input type="text" name="mtounge" class="form-control" value="<?= $membership_form['mtounge']; ?>" required>

                    </div>
                    
</div>
</div>

<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" class="form-control" name="dob" onchange="calculateAge()" value="<?= $membership_form['dob']; ?>">

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Age:</label>
    <input type="text" id="age" class="form-control" name="age" readonly value="<?= $membership_form['age']; ?>">

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
                        <input type="text" name="email" class="form-control" required value="<?= $membership_form['email']; ?>">

                    </div>
                 </div>
                      <div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Mobile</label>
                        <input type="text" name="phone" class="form-control" value="<?= $membership_form['phone']; ?>" required>

                    </div>
                    
                       </div>
</div>
   <!-- radio  button -->



<div class="col-md-10">
<div class="form-group mb-3">
<label for="street">Street Address:</label><br>
        <input type="text" id="street" class="form-control" name="street" value="<?= $membership_form['street']; ?>" >

</div>
</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="taluk">Taluk</label>
        <input type="text" id="taluk" class="form-control" name="taluk" value="<?= $membership_form['taluk']; ?>" required>

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="district">District</label>
        <input type="text" id="district" class="form-control" name="district" value="<?= $membership_form['district']; ?>" required>

                    </div>
                    
</div>
</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="state">State:</label>
        <input type="text" id="state" class="form-control" name="state" value="<?= $membership_form['state']; ?>" required>

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="pin">Pin Code:</label>
        <input type="text" id="pin" class="form-control" name="pin" value="<?= $membership_form['pin']; ?>" required>

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
            <input type="text" id="prm_street" name="prm_street" value="<?= $membership_form['prm_street']; ?>"  class="form-control">

                    </div>
</div>

</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingStreet">Taluk</label><br>
            <input type="text" id="prm_taluk" name="prm_taluk" value="<?= $membership_form['prm_taluk']; ?>" class="form-control">

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
  
                    <label for="billingCity">District</label><br>
            <input type="text" id="prm_district" name="prm_district" value="<?= $membership_form['prm_district']; ?>" class="form-control">

                    </div>
                    
</div>
</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingState">State:</label><br>
            <input type="text" id="prm_state" name="prm_state" value="<?= $membership_form['prm_state']; ?>" class="form-control">

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingpin">Pin Code:</label><br>
            <input type="text" id="prm_pin" name="prm_pin" value="<?= $membership_form['prm_pin']; ?>" class="form-control">

                    </div>
                    
</div>
</div>
</div>

<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="dob">Education</label>
    <input type="text"  class="form-control" name="education" value="<?= $membership_form['education']; ?>" >

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Work Place</label>
    <input type="text"  class="form-control" name="work_place" value="<?= $membership_form['work_place']; ?>" required>

                    </div>
                    
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Aadhar Card No</label>
    <input type="text"  class="form-control" name="aadhar" value="<?= $membership_form['aadhar']; ?>" >

                    </div>
                    
</div>
</div>
<label>Membership</label>
            <select name="mem_type_name" class="form-control" value="<?=$membership_form['mem_type_name'];?>" required >
           
            <option value="">--Select Membership--</option>
               <option value="General member"
			   <?php
			   if($membership_form["mem_type_name"]=='General member')
			   {
				echo "selected";
			   }
			   ?>
			   >General member</option>
            </select><br>
            <div class="col-md-5">
                    <div class="form-group mb-3">
         <label> Upload Image </label>
         <input type="file" name="image" id="images" >
		 <input type="hidden" name="old_images" value="<?=$membership_form['images'];?>" ><hr>
			   <!-- <?='<img src="upload/'.$members['images'].'" width="100px;" height="60px" alt="images">'?> -->
    
      <img src="<?php echo "uploads/".$membership_form['images']; ?>" width="100px">
            </div>
            </div>
      <br>
  

      

<div class="from-group">
<button type="submit" name="update_member" class="btn btn-primary">Update Members</button>
         <a href="index1.php" class="btn btn-danger">Go Back</a>
                    </div>
                    <?php
           }
           else
           {
             echo "<h4>No Such Id Found</h4>";
           }

      }
     ?>

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