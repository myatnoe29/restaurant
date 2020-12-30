<?php 
	require 'db_connect.php';

	$name=$_POST['name'];
	
	//Data insert with PDO type
	$sql="INSERT INTO categories (name) VALUES (:name)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->execute();

	if ($stmt->rowCount()) 
	{
		header("location:category_list.php");
	}
	else
	{
		echo "error";
	}

 ?>