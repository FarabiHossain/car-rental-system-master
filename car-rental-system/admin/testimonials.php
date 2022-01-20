<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="0";
$sql = "UPDATE tbltestimonial SET status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();


echo '<script language="javascript">';
echo 'alert("Testimonial Successfully Inactive")';
echo '</script>';
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE tbltestimonial SET status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

echo '<script language="javascript">';
echo 'alert("Testimonial Successfully active")';
echo '</script>';
}


 ?>

<!doctype html>
<html>

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

						<h2 class="page-title">Manage Testimonials</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">User Testimonials</div>
							<div class="panel-body">
							
								<table align="center">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Testimonials</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>

									<?php $sql = "SELECT tblusers.FullName,tbltestimonial.UserEmail,tbltestimonial.Testimonial,tbltestimonial.PostingDate,tbltestimonial.status,tbltestimonial.id from tbltestimonial join tblusers on tblusers.Emailid=tbltestimonial.UserEmail";
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
											<td><?php echo htmlentities($result->UserEmail);?></td>
											<td><?php echo htmlentities($result->Testimonial);?></td>
											<td><?php echo htmlentities($result->PostingDate);?></td>
										<td><?php if($result->status=="" || $result->status==0)
{
	?><a href="testimonials.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Active')" style="color: blue;"> Inactive</a>
<?php } else {?>

<a href="testimonials.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Inactive')" style="color: blue;"> Active</a>
</td>
<?php } ?></td>
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
