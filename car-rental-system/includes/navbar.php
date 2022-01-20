<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Welcome </a>
    </div>
    <ul class="nav navbar-nav">
      	<li><a href="index.php" id="anchor">Home</a></li>
        <li><a href="car-listing.php" id="anchor">Car Listing</a></li>
        
      </ul>
      
<?php 
session_start();
include 'config.php';
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

              
            if($_SESSION['login']){?>
           <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="anchor">Menu
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="post-testimonial.php">Post a Testimonial</a></li>
          <li><a href="my-testimonials.php">My Testimonial</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
         		
            <?php } ?>
            </ul>
          </li>
      </ul>
    </div>
  </nav>

  <style>
  .navbar{
    background-color: #000;
  }
  #anchor{
    font-size: 20px;
    color: ;
  }
  </style>