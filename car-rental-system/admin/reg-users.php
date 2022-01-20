<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblbrands  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Page data updated  successfully";

}



 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

	
	<title>Car Rental Portal |Admin Manage testimonials   </title>


	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	
	<script src="js/bootstrap.min.js"></script>
  

</head>

<body>
	<?php include('includes/header.php');?>


		<?php include('includes/navbar.php');?>
	
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Registered Users</h2>

					
						<div class="panel panel-default">
							<div class="panel-heading">Reg Users</div>
							<div class="panel-body">
						
								<table align="center">
									<thead>
										<tr>
										<th>#</th>
												<th> Name</th>
											<th>Email </th>
											<th>Contact no</th>
										<th>DOB</th>
										<th>Address</th>
										<th>City</th>
										<th>Country</th>
										<th>Reg Date</th>
										
										</tr>
									</thead>
									
									<tbody>

									<?php $sql = "SELECT * from  tblusers ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->FullName);?></td>
											<td><?php echo htmlentities($result->EmailId);?></td>
											<td><?php echo htmlentities($result->ContactNo);?></td>
	<td><?php echo htmlentities($result->dob);?></td>
											<td><?php echo htmlentities($result->Address);?></td>
											<td><?php echo htmlentities($result->City);?></td>
											<td><?php echo htmlentities($result->Country);?></td>
											<td><?php echo htmlentities($result->RegDate);?></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>

</body>
<style>
            table {
              color: #333; /* Lighten up font color */
              font-family: Helvetica, Arial, sans-serif; /* Nicer font */
              width: 900px;
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
<?php } ?>
