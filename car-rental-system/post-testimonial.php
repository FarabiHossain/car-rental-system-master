<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['submit']))
  {
$testimonoial=$_POST['testimonial'];
$email=$_SESSION['login'];
$sql="INSERT INTO  tbltestimonial(UserEmail,Testimonial) VALUES(:email,:testimonoial)";
$query = $dbh->prepare($sql);
$query->bindParam(':testimonoial',$testimonoial,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo '<script language="javascript">';
echo 'alert("Testimonail submitted successfully")';
echo '</script>';
}
else 
{

echo '<script language="javascript">';
echo 'alert("Something went wrong. Please try again)';
echo '</script>';
}

}
?>
  <!DOCTYPE HTML>
<html >
<head>

<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Car Rental Portal |Post testimonial</title>


<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<script src="assets/js/jquery.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<?php include('includes/header.php');?>
<?php include('includes/navbar.php')?>

        <h1 align="center">Post Testimonial</h1>
      


    <div class="row">
      <aside class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
       </aside>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          
            
          <form  method="post">
          
          
            <div class="form-group">
              <label class="control-label">Testimonial</label>
              <textarea class="form-control white_bg" name="testimonial" rows="4" required=""></textarea>
            </div>
          
           
            <div class="form-group">
              <button type="submit" name="submit" class="btn">Save  <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



<?php include('includes/footer.php');?>


</body>
</html>
<?php } ?>