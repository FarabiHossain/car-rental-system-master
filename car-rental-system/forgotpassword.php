<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['update']))
  {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
  <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
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
    	<div><h1 align="center">Recover Your Password</h1></div>
    </div>
    
    </br></br>
    <div  align="center">
    <form name="chngpwd" method="post" onSubmit="return valid();">
    	<table>
                <tr>
                	<td><label>Email ID</label></td>
                	<td> <input type="email" name="email" class="form-control" placeholder="Your Email address*" required="required"></td>
                </tr>
                
                 <tr>
                	<td><label>Mobile Number</label></td>
                	<td><input type="text" name="mobile" class="form-control" placeholder="Your Reg. Mobile*" required="required"></td>
                </tr>
                
                 <tr>
                	<td><label>New Password</label></td>
                	<td> <input type="password" name="newpassword" class="form-control" placeholder="New Password*" required="required"></td>
                </tr>
                
                 <tr>
                	<td><label>Confirm Password</label></td>
                	<td><input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password*" required="required"></td>
                </tr>         
                </table>
                <button type="submit" value="Reset My Password" name="update" >Reset My Password</button>
        </form>
     
    </div>	
  </body>
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
</html>