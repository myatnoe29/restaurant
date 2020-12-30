<?php 
	require 'db_connect.php';

	$id=$_REQUEST['id'];
	$sql='DELETE FROM users WHERE id=:id';
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();


	if ($stmt->rowCount()) 
	{
		header("location:customerlist.php");
	}
	else
	{
		echo "error";
	}


 ?>