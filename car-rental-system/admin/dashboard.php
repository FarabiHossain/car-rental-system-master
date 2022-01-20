<?php
session_start();
error_reporting(0);
include ('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    ?>
<!doctype html>
<html>

<head>
<title>Car Rental Portal | Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>

<body>
<?php include('includes/header.php');?>	
<?php include('includes/navbar.php');?>
		
	<div class="content-wrapper">
		<div class="container-fluid">
		<h2 class="page-title text-uppercase" align="center" >Dashboard</h2>
			<div class="row" style="background-color: black;padding-top: 30px;" >
				<div class="col-md-12">

					

					<div class="row" style="padding-top: 20px;">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3 col-xs-offset-1">
									<div class="panel panel-default" style="border-width: thick;">
										<div class="panel-body" style="font-size: 20px;">
											<a href="reg-users.php">
												<div class="text-center">
<?php
    $sql = "SELECT id from tblusers ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $regusers = $query->rowCount();
    ?>
													<div style="color: black;"><?php echo htmlentities($regusers);?></div>
												<div class="text-uppercase" style="color: black;">Reg Users</div>
											</div>
											</a>
										</div>
										
									
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default" style="border-width: thick;">
										<div class="panel-body" style="font-size: 20px;">
											<a href="manage-vehicles.php">
											<div class=" text-center">
												<?php
    $sql1 = "SELECT id from tblvehicles ";
    $query1 = $dbh->prepare($sql1);
    ;
    $query1->execute();
    $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
    $totalvehicle = $query1->rowCount();
    ?>
													<div style="color: black;"><?php echo htmlentities($totalvehicle);?></div>
												<div class="text-uppercase" style="color: black;">Listed Vehicles</div>
											</div>
											</a>
										</div>
										
										
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default" style="border-width: thick;">
										<div class="panel-body" style="font-size: 20px;">
											<a href="manage-bookings.php">
											<div class=" text-center">
<?php
    $sql2 = "SELECT id from tblbooking ";
    $query2 = $dbh->prepare($sql2);
    $query2->execute();
    $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
    $bookings = $query2->rowCount();
    ?>

													<div style="color: black;" ><?php echo htmlentities($bookings);?></div>
												<div class=" text-uppercase" style="color: black;">Total Bookings</div>
											</div>
											</a>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="row" style="background-color: black;padding-top: 30px;">
				<div class="col-md-12">


					<div class="row">
						<div class="col-md-12">
							<div class="row">
								
								<div class="col-md-3 col-xs-offset-2">
									<div class="panel panel-default" style="border-width: thick;">
									<div class="panel-body" style="font-size: 20px;">
									<a href="manage-brands.php">
											<div class="text-center">
<?php
    $sql3 = "SELECT id from tblbrands ";
    $query3 = $dbh->prepare($sql3);
    $query3->execute();
    $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
    $brands = $query3->rowCount();
    ?>												
													<div style="color: black;"><?php echo htmlentities($brands);?></div>
												<div class="text-uppercase" style="color: black;">Listed Brands</div>
											</div>
											</a>
										</div>
										
											
										
									</div>
								</div>
								
								
								
								<div class="col-md-4">
									<div class="panel panel-default" style="border-width: thick;">
									<div class="panel-body" style="font-size: 20px;">
									<a href="testimonials.php">
											<div class=" text-center">
<?php
    $sql5 = "SELECT id from tbltestimonial ";
    $query5 = $dbh->prepare($sql5);
    $query5->execute();
    $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
    $testimonials = $query5->rowCount();
    ?>

													<div style="color: black;"><?php echo htmlentities($testimonials);?></div>
												<div class="text-uppercase" style="color: black;">Testimonials</div>
											</div>
											</a>
										</div>				
										
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>









		</div>
	</div>
	</div>

	<!-- Loading Scripts -->


	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>