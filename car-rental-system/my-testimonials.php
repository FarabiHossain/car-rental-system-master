
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>
<!DOCTYPE HTML>
<html >
<head>

<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Car Rental Portal | My Testimonials </title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<script src="assets/js/jquery.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('includes/header.php');?>
<?php include('includes/navbar.php')?>

        <h1 align="center">My Testimonials</h1>


  <div class="container">
    
  
  <div class="row">
      <aside class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
       </aside>
      <div class="col-md-9 col-sm-8">



        
<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tbltestimonial where UserEmail=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($cnt=$query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

              <div style="border: 2px solid;margin: 20px;height:150px;background-color:#1111" class="row" >
           
                <div class="col-md-6" style="border: 1px solid;height: 146px;padding-right: 20px;text-align: center;">
                </br>
                 <p><?php echo htmlentities($result->Testimonial);?> </p>
                  
                </div>
                <?php if($result->status==1){ ?>
                 <div class="vehicle_status"class="col-md-3" style="text-align: center;" > 
                 		</br></br>
                 		<a style="margin: 30px;">Active</a>
                 		</br></br>
						 <p><b>Posting Date:</b><?php echo htmlentities($result->PostingDate);?> </p>
                  
                  </div>
                  <?php } else {?>
               <div class="vehicle_status" class="col-md-2" style="text-align: center;"> 
               	</br></br>
               		<a >Waiting for approval</a>
               			</br></br>
                   <p><b>Posting Date:</b><?php echo htmlentities($result->PostingDate);?> </p>
                   
                  </div>
                  <?php } ?>
          </div>
              <?php } } ?>
              
            
        </div>
      </div>
    </div>


<?php include('includes/footer.php');?>


</body>
<style>
.vehicle_status > a{
    color:red;
    font-size: 20px;    
}
</style>
</html>
<?php } ?>