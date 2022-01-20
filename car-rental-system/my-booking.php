<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?><!DOCTYPE HTML>
<html>
<head>

<meta name="viewport" content="width=device-width,initial-scale=1">

<title>CarForYou - Responsive Car Dealer HTML5 Template</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<script src="assets/js/jquery.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<?php include('includes/header.php');?>
<?php include('includes/navbar.php')?>


        <h1 align="center">My Booking</h1>
      



 
    
    <div class="row">
      <aside class="col-md-3 ">
       <?php include('includes/sidebar.php');?>
  		</aside>
      <div class="col-md-7 ">
        <?php 
$useremail=$_SESSION['login'];
 $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
		<div style="border: 2px solid;margin: 20px;height:250px;background-color: silver;" class="row" >
        	<div style="padding: 20px;" class=col-md-5>
        			<img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" /> 
        		</div>
        
        
        <div style="padding: 20px;" class="col-md-3 col-xs-offset-2 ">
        		 <h2><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h2>
        		
       			 <p><b>From Date:</b> <?php echo htmlentities($result->FromDate);?><br /> <b>To Date:</b> <?php echo htmlentities($result->ToDate);?></p>
       			 
       			<?php if($result->Status==1)
                { ?>
                <div class="vehicle_status"> Confirmed
        </div>

              <?php } else if($result->Status==2) { ?>
 <div class="vehicle_status" style="font-size: 20px;"> Canceled
        </div>
             


                <?php } else { ?>
 <div class="vehicle_status"> Not Confirmed Yet
        </div>
                <?php } ?>
       
       
             
        	</div>
        </div>
        <?php }} ?>
        
    	</div>
    
   </div>
 


<?php include('includes/footer.php');?>

</body>
<style>
.vehicle_status{
    border: 1px solid;
    text-align: center;
    border-radius: 20px;
    height: 35px;
    padding: 3px;
    background-color:white;
</style>
</html>
<?php } ?>