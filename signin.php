<?php 
	require 'db_connect.php';

	$email=$_POST['email'];
	$password=SHA1($_POST['password']);

	$sql="SELECT*FROM users WHERE email=:email and password=:password";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":email",$email);
	$stmt->bindParam(":password",$password);
	$stmt->execute();

	session_start();

	if ($stmt->rowCount()) 
	{
		//success
		$rows=$stmt->fetchAll();
		$row=$rows[0];
		$_SESSION['loginuser']=$row;
		if($_SESSION['loginuser']['role']=="admin")
		{
			header("location:dashboard.php");
		}
		else
		{
			$_SESSION['UserID']=$row['id'];
			header("location:index1.php");
		}
	}
	else
	{
		//fail
		echo "Invalid Email or Password";
	}



 ?>