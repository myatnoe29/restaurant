<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="frontend/css/shop-homepage.css" rel="stylesheet">

  <!-- fontawesome -->
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <!-- Bootstrap core JavaScript -->
  <script src="frontend/vendor/jquery/jquery.min.js"></script>
  <script src="frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#cpassword').change(function(){
 			var cpassword=$(this).val();
 			var password=$('#password').val();

 			if (password!=cpassword) 
 			{
 				console.log("Confirm Password doesn't match")
 			}
 		});
 	})


 </script>

</head>

<body>

<!-- Login card -->
<div class="container my-5">
	<div class="card text-center shadow-lg mb-3" style="max-width: 1100px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/register.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title my-4">Create an Account</h2>
        <form action="singup.php" method="POST">
        	<div class="row justify-content-center mb-3">
    			<div class="col-5">
     			 <input type="text" class="form-control rounded-pill" placeholder="Enter Your name" name="name">
    			</div>
    			<div class="col-5">
     		 	<input type="email" class="form-control rounded-pill" placeholder="Enter Email Address.." name="email">
    			</div>
  			</div>
  			<div class="row justify-content-center">
    			<div class="col-5">
     			 <input type="password" class="form-control rounded-pill" placeholder="Password" id="password" name="password">
    			</div>
    			<div class="col-5">
     		 	<input type="password" class="form-control rounded-pill" placeholder="Confirm Password" id="cpassword" name="cpassword">
    			</div>
  			</div>
  			<div class="row my-3 justify-content-center">
    			<div class="col-10">
     			<input type="text" class="form-control rounded-pill " placeholder="Enter Phone number.." name="phoneno">
    			</div>
    		</div>
    		<div class="row mb-3 justify-content-center">
    			<div class="col-10">
      			<textarea type="text" name="address" class="form-control rounded-pill" placeholder="Address"></textarea>
    			</div>
  			</div>
  			<div class="row justify-content-center">
    			<div class="col-10">
      			<button type="submit" class="btn btn-success rounded-pill btn-block">Register</button>
    			</div>
  			</div>
		</form>
        <hr class="w-75">
        <a href="login.php" class="card-text"><i class="fas fa-address-book mr-2"></i>Already Member</a><br>
        <a href="index.php" class="card-text"><i class="fas fa-home mr-2"></i>Go Back Home</a>
      </div>
    </div>
  </div>
</div>
	
</div>


</body>
</html>