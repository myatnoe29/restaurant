<?php 
	require 'db_connect.php';


	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phoneno'];
	$address=$_POST['address'];

	$password=SHA1($_POST['password']);
	$role='Member';
	$profile='img/user/user.png';

	$sql="INSERT INTO users (name,profile,email,password,phone,address,role) VALUES (:name,:profile,:email,:password,:phone,:address,:role)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':profile',$profile);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':phone',$phone);
	$stmt->bindParam(':address',$address);
	$stmt->bindParam(':role',$role);
	$stmt->execute();

	if ($stmt->rowCount()) 
	{
		session_start();
		$_SESSION['reg_success']="
		Thanks! your account has been successfully created and now <b> Signed In.";
		header("location:login.php");
	}
	else
	{
		echo "error";
	}


 ?>