<img src="upload/AKMS.jpg"  width="1388" height="290">
<?php 
include('includes/header.php');

?>

<nav class="navbar navbar-expand-lg" navbar style="background-color: #e3f2fd;">
                <div class="container-fluid justify-content-center">
                  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse flex-grow-0" id="navbarNavDropdown">
                    <ul class="navbar-nav text-center">
                     
                  
                     
                    
                      <?php if(!isset($_SESSION['authenticated'])) : ?>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                      </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                      </li>
                      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gallery
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="displayyoutube.php">Video</a></li>
            <li><a class="dropdown-item" href="gallery.php">Photo</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
                      <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                      </li>
                      <?php endif  ?>
                      <?php if(isset($_SESSION['authenticated'])) : ?>
                    
                        <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="member-details.php">Member Details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                      </li>
                     <?php endif  ?>
                    </ul>
                  </div>
                </div>
              </nav>