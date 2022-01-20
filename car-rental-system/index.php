<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html ">
<head>

<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Car Rental Portal</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<script src="assets/js/jquery.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>


<?php include('includes/header.php');?>
<?php include('includes/navbar.php')?>



<section id="banner" class="banner-section">
  <div class="container">
      <div class="row">
        <div class="col-md-7 col-md-push-4">
          <div class="banner_content">
            <p style="font-size: 50px;">Find the right car for you.<p>
            <p style="font-size: 15px;">We have more than a hundreds cars for you to choose. </p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="section-header text-center">
      <h2>THE BIG ADVANTAGE</h2>
      <p>We simplified car rentals, so you can focus on what's important to you.</p> 
</div>

<div class="newcar">
	<button>Newly Added Cars</button>
</div>

<div class="">
	<div class="row1">
	
		<?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>
		<div class="column">
			<div class="">
			<a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image"></a>
			</div>
		
		
		
		</div>		
		
	<?php }}?>	
	</div>
</div>


</br></br>
<div class="testimonial" style="border: 2px solid;background-color:#142952;">
  
    <div class="section-header white-text text-center" style="color: white;background-color: red;padding: 20px;">
      <h2>Our Satisfied <span>Customers</span></h2>
    </div>
    </br></br>
      <section class="slideshow" style="color:white;margin-bottom: 20px;">
  			<div class="slideshow-container slide" >
    


      
<?php 
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
			<div class="text-container">
			
            <p><h2><?php echo htmlentities($result->Testimonial);?></h2></p>
            <h3>- <?php echo htmlentities($result->FullName);?></h3>
	  	</div>
        
        <?php }} ?>
          </div>
       
  </section>
      
  </div>

<?php include('includes/footer.php');?>

</body>

<style>

.slideshow {
  width: 625px;
  margin: 0 auto;
  overflow: hidden;
    
  
}

.slideshow-container {
  width: 2500px;
  font-size: 0;
  transition: 1s ease;
  height: 225px;
}

.slideshow-container:hover {
  animation-play-state: paused;
}

.text-container {
  width: 625px;
  height: auto;
  display: inline-block;
  font-size: 16px;
  text-align: center;
 
}

.text-container {
  height: 225px;
  position: relative;
}


text-container > p {
  position: relative;
  top: -45%;
  padding: 5px;
}

.slide {
  animation: slide 24s ease infinite;
}

@keyframes slide {
  0% {
    transform: translateX(0%);
  }
  
  12.5% {
    transform: translateX(0%);
  }
  
  25% {
    transform: translateX(-25%);
  }
  
  37.5% {
    transform: translateX(-25%);
  }
  
  50% {
    transform: translateX(-50%);
  }
  
  62.5% {
    transform: translateX(-50%);
  }
  
  75% {
    transform: translateX(-75%);
  }
  
  87.5% {
    transform: translateX(-75%);
  }
  
  99% {
    transform: translateX(-75%);
  }
  
  100% {
    transform: translateX(0);
  }
}

text-container > p {
  margin-top: 140px;
  text-align: center;
  
}
.carinfo{
    padding: 30px;
    display: inline-flex;
}

.newcar{
    margin:30px;
     background-image: url("assets/images/newcar.jpg");
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;;
  padding: 60px 0;
  position: relative; 
  text-align: center;
  font-size: 30px;
  font-family: sans-serif;
}
.newcar > button{
    background-color: #e60000;
    color: white;
    border-radius: 20px;
}
.banner-section {
  background-image: url("assets/images/banner.jpg");
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  padding: 160px 0;
  position: relative;
}
.banner_content{
    color: white;
   }
   
  
  /* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    padding: 10px;
    
}

/* Clear floats after the columns */
.row1:after {
    content: "";
    display: table;
    clear: both;
   
}

  
  
  
  
</style>
</html>
