<?php 
  include 'db_connect.php';
  session_start();

 ?>

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

</head>

<body>

<!-- Login card -->
<div class="container my-5">
	<div class="card text-center shadow-lg mb-3" style="max-width: 1100px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/login.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title my-3">Welcome Back !</h2>

        <?php if (isset($_SESSION['reg_success'])) 
        {
          
        ?>
        <div class=" alert alert-success alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['reg_success'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php 
            } 
          unset( $_SESSION['reg_success']); 
        ?>

        <form action="signin.php" method="POST">
  			<div class="row my-3 justify-content-center">
    			<div class="col-10">
     			<input type="text" class="form-control rounded-pill" name="email" placeholder="Enter Email Address">
    			</div>
    		</div>
    		<div class="row mb-3 justify-content-center">
    			<div class="col-10">
      			<input type="password" class="form-control rounded-pill" name="password"  placeholder="Password">
    			</div>
  			</div>
  			<div class="row justify-content-center">
    			<div class="col-10">
      			<button type="submit" class="btn btn-success rounded-pill btn-block">Login</button>
    			</div>
  			</div>
		</form>
        <hr class="w-75">
        <a href="#" class="card-text"><i class="fas fa-key mr-2"></i>Forgot Password?</a><br>
        <a href="register.php" class="card-text"><i class="fas fa-address-book mr-2"></i>Create an Account</a><br>
        <a href="index.php" class="card-text"><i class="fas fa-home mr-2"></i>Go Back Home</a>
      </div>
    </div>
  </div>
</div>
	
</div>


</body>
</html>