<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']); 
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";

}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Car Rental System</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<script src="assets/js/jquery.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
</head>
<body style="background-image: url(assets/images/login-bg.jpg);">

	<div>
    	<div><h1 align="center">Online Car Rental System | Customer</h1></div>
    	<div><h1 align="center">Sign Up</h1></div>
    </div>
    </br>
    </br>
    </br>
   <div align="center">
   	<form method="post">
   		<table align="center">
   			<tr>
   				<td><label>Full Name : </label></td>
   				<td><input type="text" placeholder="Full Name" name="fullname" required="required"/></td>
   			</tr>
   			
   			<tr>
   				<td><label>Mobile Number : </label></td>
   				<td><input type="text" placeholder="Mobile Number" name="mobileno" maxlength="10" required="required"/></td>
   			</tr>
   			
   			<tr>
   				<td><label>E-mail: </label></td>
   				<td><input type="email" onBlur="checkAvailability()" placeholder="Email Address" required="required" name="emailid"/></td>
   			</tr>
   			
   			<tr>
   				<td><label>Password</label></td>
   				<td><input type="password" placeholder="password" name="password" required="required"/></td>
   			</tr>
   			
   			<tr>
   				<td><label>Confirm Passwrod</label></td>
   				<td><input type="password" placeholder="confirm password" name="confirmpassword" required="required"/></td>
   			</tr>
   		
   		</table>
				<button type="submit" name="signup" id="submit" value="Sign Up">login</button>

			</form>
   
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
  font-size: 23px;
  font-weight: bold;
  color: white;
}
p{
    font-size: 18px;
}

input[type=email], input[type=password], input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 15px;
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
  