<?php
session_start();
include 'includes/config.php';
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        $_SESSION['login']=$_POST['email'];
        
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else{
        
        echo "<script>alert('Invalid Details');</script>";
        
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Car Rental System</title>
<script src="assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<script src="assets/js/bootstrap.min.js"></script>
	
</head>
<body style="background-image: url(assets/images/login-bg.jpg);">

	<div>
    	<div><h1 align="center">Online Car Rental System | Customer</h1></div>
    	<div><h1 align="center">Log In</h1></div>
    </div>
    </br>
    </br>
    </br>
   <div align="center">
			<form method="post">
				</br>
				<label>Email : </label>
				<input type="email" placeholder="email" name="email" /></br></br>
				</br>
				<label>PASSWORD : </label>
				<input type="password" placeholder="password" name="password"/></br></br>
				<button type="submit" name="login" value="Login">login</button>

			</form>
			
			<div class=" text-center">
        <p style="color: white;">Don't have an account? <a href="registration.php" style="color: white;" >Signup Here</a></p>
        <p ><a href="forgotpassword.php" style="color: white;">Forgot Password ?</a></p>
      </div>
	</div>

</body>
</html>
<style>
h1{
  font-size: 45px;
  font-family: sans-serif;
  text-align: center;
}
label{
  font-size: 20px;
  font-weight: bold;
  color: white;
}
p{
    font-size: 18px;
}

input[type=email], input[type=password] {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 32%;
}

button:hover {
    opacity: 0.8;
}
</style>
