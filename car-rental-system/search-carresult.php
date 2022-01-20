<?php 
session_start();
include('includes/config.php');
error_reporting(0);
$currentpage=$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE HTML>
<html ">
<head>

<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Car Rental Portal | Car Listing</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<script src="assets/js/jquery.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>


<?php include('includes/header.php');?>
<?php include('includes/navbar.php')?>




<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php 
//Query for Listing count
$brand=$_POST['brand'];
$fueltype=$_POST['fueltype'];
$sql = "SELECT id from tblvehicles where tblvehicles.VehiclesBrand=:brand and tblvehicles.FuelType=:fueltype";
$query = $dbh -> prepare($sql);
$query -> bindParam(':brand',$brand, PDO::PARAM_STR);
$query -> bindParam(':fueltype',$fueltype, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p style="border: 2px solid;font-weight: bold;padding: 15px;"><span><?php echo htmlentities($cnt);?> Listings</span></p>
</div>
</div>

<?php 

$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:brand and tblvehicles.FuelType=:fueltype";
$query = $dbh -> prepare($sql);
$query -> bindParam(':brand',$brand, PDO::PARAM_STR);
$query -> bindParam(':fueltype',$fueltype, PDO::PARAM_STR);
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
        	
        	<div style="padding: 20px;" class="col-md-3 col-xs-offset-2">
        	  <h2 style="text-align: right;"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h2>
        		<p style="font-weight: bold">Rs <?php echo htmlentities($result->PricePerDay);?> Per Day</p>
        	
        		<ul>
              <li><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
              <li><?php echo htmlentities($result->ModelYear);?> model</li>
              <li><?php echo htmlentities($result->FuelType);?></li>
            </ul>
            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn" style="border: 1px solid;">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
        	</div>   
        </div>
        
        
       
      <?php }} ?>
         </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
        
     
             <h5 style="font-weight: bold;text-align: center;"> Find Your  Car </h5>
        
         
            <form  action="<?php $currentpage?>" method="post">
              <div class="form-group select">
                <select class="form-control">
                  <option>Select Brand</option>

                  <?php $sql = "SELECT * from  tblbrands ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>
                 
                </select>
              </div>
              <div class="form-group select">
                <select class="form-control">
                  <option>Select Fuel Type</option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
                </select>
              </div>
             
              <div class="form-group">
                <button type="submit" class="btn btn-block"> Search Car</button>
              </div>
            </form>
          
        

      </aside>
      <!--/Side-Bar--> 
    </div>
  </div>
</section>
<!-- /Listing--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 



</body>
</html>
