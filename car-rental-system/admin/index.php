<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
  $email=$_POST['username'];
  $password=md5($_POST['password']);
  $sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> bindParam(':password', $password, PDO::PARAM_STR);
  $query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
    {
        $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else{

            echo "<script>alert('Invalid Details');</script>";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Car Rental System</title>

</head>
<body style="background-image: url(img/admin_bk.jpg);">

	<div>
    	<div><h1 align="center">Online Car Rental System | Admin</h1></div>
    </div>
    </br>
    </br>
    </br>
   <div align="center">
			<form method="post">
				</br>
				<label>USERNAME : </label>
				<input type="text" placeholder="username" name="username" /></br></br>
				</br>
				<label>PASSWORD : </label>
				<input type="password" placeholder="password" name="password"/></br></br>
				<button type="submit" name="login">login</button>

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
  font-size: 20px;
  font-weight: bold;
}


input[type=text], input[type=password] {
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
