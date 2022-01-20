<header>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			 <div class="logo"> <a href="index.php"><img src="assets/images/logo.png" alt="image"/></a> </div>
		</div>
		
		<div class="col-md-4 col-xs-offset-2">
			<h2> CAR RENTAL PORTAL</h2>
		</div>
		
		<div class="col-md-3">
			 <?php   if(strlen($_SESSION['login'])==0)
	           {	
            ?>
			 <div class="login_btn"> <a href="login.php" >Login / Register</a> </div>
		<?php }
                    else{ 
                    ?>
                		<div class="log"> Welcome, you are logged in</div>
                	
                		
            <?php  } ?>
		</div>
	</div>
</div>
</header>

<style>

.logo{
    float:left;
    padding: 20px;
    width:10px;
}
.head > h2{
    font-family: sans-serif;
    font-weight: bold;
}
.login_btn{
    float: right;
    padding:10px;
    border: 1px solid;
    margin: 20px;
    background-color: #111;
}   
.login_btn > a{
    color: white;
}
.log{
    float: right;
    font-size: 20px;
    margin: 20px;
}
</style>

  
</header>