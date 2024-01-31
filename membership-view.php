<?php 
session_start();

include('dbcon.php');
$page_title = "Register Form";
include('includes/header.php');
include('navbar.php');

?>
<script type="text/javascript">
      //   function text(x){
      //       if(display==0)
      //       document.getElementById('display').style.display = 'yes';
      //       else
      //       document.getElementById('display').style.display = 'no';
      //   }

      function text(x){
            if($display =='yes')
            document.getElementById("display").value= 'yes';
            else
            document.getElementById("display").value = 'no';
        }

        </script>
<div class="py-5">
    <div class="container">
    
        <div class="row justify-content-center">
      
            <div class="col-md-6">
            <?php include('message.php');?>
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
                    <div class="main-form mt-3 border-bottom">
                    <div class="full">
         <label> Upload Image </label>
       
		 <input type="hidden" name="old_images" value="<?=$membership_form['images'];?>"  readonly>
			   <?='<img src="uploads/'.$membership_form['images'].'" width="100px;" height="60px" alt="images">'?> 
      </div>
                    <div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="<?=$membership_form['name'];?>" readonly >

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
                    <input type="text" name="gender" class="form-control" value="<?=$membership_form['gender'];?>" readonly >
                    <!-- <select class="form-select" name="gender" value="<?=$membership_form['gender'];?>" readonly  aria-label="Default select example">
  <option selected>Select gender</option>
  <option value="male"value="<?=$membership_form['gender'];?>" readonly >Male</option>
  <option value="female" value="<?=$membership_form['gender'];?>" readonly >Female</option>
  
</select> -->

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Mother Tounge</label>
                        <input type="text" name="mtounge" class="form-control" value="<?=$membership_form['mtounge'];?>" readonly >

                    </div>
                    
</div>
</div>

<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" class="form-control" name="dob" onchange="calculateAge()" value="<?=$membership_form['dob'];?>" readonly >

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Age:</label>
    <input type="text" id="age" class="form-control" name="age" value="<?=$membership_form['age'];?>" readonly >

                    </div>
                    
</div>
</div>
<label> Do you want to display Contact Number and Email Address to Other Members?</label><br>
       <div class="mb-3">
       <label> Display Type </label>
       <Input type = 'Radio' Name ='display' value= 'yes' onclick="text(0)" checked><span class="pl-2">YES</span>
       <Input class="ml-5" type = 'Radio' Name ='display' value= 'no' onclick="text(1)"><span class="pl-2">NO</span>
            
      </div>
      <?php if($membership_form['display'] == 'yes') { ?>
<div class="row">
                        <div class="col-md-5">
                       <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="<?=$membership_form['email'];?>" readonly >

                    </div>
                 </div>
                      <div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="">Mobile</label>
                        <input type="text" name="phone" class="form-control" value="<?=$membership_form['phone'];?>" readonly >

                    </div>
                    
                       </div>
</div>
<?php } ?>
   <!-- radio  button -->



<div class="col-md-10">
<div class="form-group mb-3">
<label for="street">Street Address:</label><br>
        <input type="text" id="street" class="form-control" name="street" value="<?=$membership_form['street'];?>" readonly  >

</div>
</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="taluk">Taluk</label>
        <input type="text" id="taluk" class="form-control" name="taluk" value="<?=$membership_form['taluk'];?>" readonly >

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="district">District</label>
        <input type="text" id="district" class="form-control" name="district" value="<?=$membership_form['district'];?>" readonly >

                    </div>
                    
</div>
</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="state">State:</label>
        <input type="text" id="state" class="form-control" name="state" value="<?=$membership_form['state'];?>" readonly >

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="pin">Pin Code:</label>
        <input type="text" id="pin" class="form-control" name="pin" value="<?=$membership_form['pin'];?>" readonly >

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
            <input type="text" id="prm_street" name="prm_street"  class="form-control" value="<?=$membership_form['prm_street'];?>" readonly >

                    </div>
</div>

</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingStreet">Taluk</label><br>
            <input type="text" id="prm_taluk" name="prm_taluk"  class="form-control" value="<?=$membership_form['prm_taluk'];?>" readonly >

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
  
                    <label for="billingCity">District</label><br>
            <input type="text" id="prm_district" name="prm_district" class="form-control" value="<?=$membership_form['prm_district'];?>" readonly >

                    </div>
                    
</div>
</div>
<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingState">State:</label><br>
            <input type="text" id="prm_state" name="prm_state" class="form-control" value="<?=$membership_form['prm_state'];?>" readonly >

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="billingpin">Pin Code:</label><br>
            <input type="text" id="prm_pin" name="prm_pin" class="form-control" value="<?=$membership_form['prm_pin'];?>" readonly >

                    </div>
                    
</div>
</div>
</div>

<div class="row">
                        <div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="dob">Education</label>
    <input type="text"  class="form-control" name="education" value="<?=$membership_form['education'];?>" readonly  >

                    </div>
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Work Place</label>
    <input type="text"  class="form-control" name="work_place" value="<?=$membership_form['work_place'];?>" readonly >

                    </div>
                    
</div>
<div class="col-md-5">
                    <div class="form-group mb-3">
                    <label for="">Aadhar Card No</label>
    <input type="text"  class="form-control" name="aadhar" value="<?=$membership_form['aadhar'];?>" readonly >

                    </div>
                    
</div>
</div>

      <br>
  

      

<div class="from-group">
                        
                        <a class="btn btn-danger" href="member-details.php" >Go Back</a>
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
   

<?php include('includes/footer.php'); ?>