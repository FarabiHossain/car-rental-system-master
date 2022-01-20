<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$sql="INSERT INTO  tblbooking(userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
}
else 
{
    echo "<script>alert('Booking successfull.');</script>";
}

}

?>


<!DOCTYPE HTML>
<html >
<head>

<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Car Rental Port | Vehicle Details</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<script src="assets/js/jquery.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  
		<div class="column"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image"></a></div>
		<div class="column"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image"></a></div>
		<div class="column"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image"></a></div>
		<div class="column"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive" alt="image"></a></div>

<div class="container">
   
    <div class="row">
      <div class="col-md-8">
        <h2><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></h2>
      </div>
      <div class="col-md-3">
        <div>
          <p style="font-size: 30px;text-align: right;font-weight: bold;color: red;">Rs  <?php echo htmlentities($result->PricePerDay);?> </p>
         	<p style="font-size: 20px;text-align: right;">Per Day</p>
        </div>
      </div>
    </div>
    
   <div class="row">
      		<div class="col-md-9" id="main_part">
              			<ul  class="list-inline" style="border: 1px solid;border-width:medium;" id="main_feature">
                  
                    	<li> 
                    		<p>Reg.Year</p>
                     	 <h5><?php echo htmlentities($result->ModelYear);?></h5>
                   	 </li>
                   	 <li> 
                   	   <p>Fuel Type</p>
                   	   <h5><?php echo htmlentities($result->FuelType);?></h5>
                  	  </li>
               	
                  	  <li> 
                  	    <p>Seats</p>
                  	    <h5><?php echo htmlentities($result->SeatingCapacity);?></h5>
                  	  </li>
                 	 </ul>
                 	 
                 	 <div class="vehicle_overview" style="border: 1px solid;border-width: medium;;margin: 30px  0;">
                 	 		<h3 style="text-align: center;text-decoration: underline;">Vehicle Overview</h3>
                 	 		<p style="text-align: center;"><?php echo htmlentities($result->VehiclesOverview);?></p>
                 	 </div>
                 	 
                 	  <div class="accessories" style="border: 1px solid;border-width: medium;margin: 30px 0">
                 	 		<h3 style="text-align: center;text-decoration: underline;">Accessories</h3>
                 	 		<p style="text-align: center;"><?php echo htmlentities($result->accessories);?></p>
                 	 		
                 	 		<table>
                                              <thead>
                                                <tr>
                                                  <th>Accessories</th>
                                                  <th>Yes/No</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>Air Conditioner</td>
                            <?php if($result->AirConditioner==1)
                            {
                            ?>
                                                  <td>Yes</td>
                            <?php } else { ?> 
                               <td>No</td>
                               <?php } ?> </tr>
                            
                            <tr>
                            <td>AntiLock Braking System</td>
                            <?php if($result->AntiLockBrakingSystem==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else {?>
                            <td>No</td>
                            <?php } ?>
                                                </tr>
                            
                            <tr>
                            <td>Power Steering</td>
                            <?php if($result->PowerSteering==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else { ?>
                            <td>No</td>
                            <?php } ?>
                            </tr>
                                               
                            
                            <tr>
                            
                            <td>Power Windows</td>
                            
                            <?php if($result->PowerWindows==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else { ?>
                            <td>No</td>
                            <?php } ?>
                            </tr>
                                               
                             <tr>
                            <td>CD Player</td>
                            <?php if($result->CDPlayer==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else { ?>
                            <td>No</td>
                            <?php } ?>
                            </tr>
                            
                            <tr>
                            <td>Leather Seats</td>
                            <?php if($result->LeatherSeats==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else { ?>
                            <td>No</td>
                            <?php } ?>
                            </tr>
                            
                            <tr>
                            <td>Central Locking</td>
                            <?php if($result->CentralLocking==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else { ?>
                            <td>No</td>
                            <?php } ?>
                            </tr>
                            
                            <tr>
                            <td>Power Door Locks</td>
                            <?php if($result->PowerDoorLocks==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else { ?>
                            <td>No</td>
                            <?php } ?>
                                                </tr>
                                                <tr>
                            <td>Brake Assist</td>
                            <?php if($result->BrakeAssist==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php  } else { ?>
                            <td>No</td>
                            <?php } ?>
                            </tr>
                            
                            <tr>
                            <td>Driver Airbag</td>
                            <?php if($result->DriverAirbag==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else { ?>
                            <td>No</td>
                            <?php } ?>
                             </tr>
                             
                             <tr>
                             <td>Passenger Airbag</td>
                             <?php if($result->PassengerAirbag==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else {?>
                            <td>No</td>
                            <?php } ?>
                            </tr>
                            
                            <tr>
                            <td>Crash Sensor</td>
                            <?php if($result->CrashSensor==1)
                            {
                            ?>
                            <td>Yes</td>
                            <?php } else { ?>
                            <td>No</td>
                            <?php } ?>
                            </tr>
                            
                                              </tbody>
                                            </table>
                 	 </div>
                 	 
                              
                              
              </div>
      <?php }} ?>         	 
      	
      	<div class="col-md-3" style="border: 2px solid">
      			<h5 style="text-align:center;font-size: 40px;border: 1px solid;border-radius: 20px;background-color: #e60000;color: white;">Book Now</h5>
      			<form method="post">
                        <div class="form-group">
                          <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
                        </div>
                        <div class="form-group">
                          <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                        </div>
                      <?php if($_SESSION['login'])
                          {?>
                          <div class="form-group">
                            <input type="submit" class="btn"  name="submit" value="Book Now">
                          </div>
                          <?php } else { ?>
            			<a href="login.php">Login For Book</a>
                          <?php } ?>
         	 </form>
      	</div>
      	
     </div>
      	
    		
      		
   </div>
    


<?php include('includes/footer.php');?>


</body>
<style>

  /* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 25%;
    padding: 10px;
}
#main_feature > li{
    text-align: center;
    padding: 0 110px;
    font-weight: bold;
}
table {
              color: #333; /* Lighten up font color */
              font-family: Helvetica, Arial, sans-serif; /* Nicer font */
              width: 840px;
              border-collapse:
              collapse; border-spacing: 0;
            }

            td, th { border: 1px solid #CCC; height: 30px; } /* Make cells a bit taller */

            th {
              background: #F3F3F3; /* Light grey background */
              font-weight: bold; /* Make sure they're bold */
              text-align: center;
            }

            td {
              background: #FAFAFA; /* Lighter grey background */
              text-align: center; /* Center our text */
            }
</style>
</html>