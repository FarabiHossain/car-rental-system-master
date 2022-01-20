<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Welcome | Admin</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard.php" id="anchor">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="anchor">Brand
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="create-brand.php" id="anchor">Create Brand</a></li>
            <li><a href="manage-brands.php" id="anchor">Manage Brand</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="anchor">Vehicles
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="post-vehicle.php" id="anchor">Post a Vehicle</a></li>
              <li><a href="manage-vehicles.php" id="anchor">Manage Vehicles </a></li>
            </ul>
          </li>
        <li><a href="testimonials.php" id="anchor">Testimonials</a></li>
        <li><a href="reg-users.php" id="anchor">Users</a></li>
         <li><a href="manage-bookings.php" id="anchor">Booking</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="anchor">LogOut
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="change-password.php" id="anchor">Change Password</a></li>
              <li><a href="logout.php" id="anchor">Signout </a></li>
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
    color: grey;
  }
  </style>