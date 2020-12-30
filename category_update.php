<?php 
	require 'db_connect.php';

	$id=$_POST['edit_id'];
	$name=$_POST['edit_name'];

	$sql="UPDATE categories SET name=:name WHERE id=:id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':name',$name);
	$stmt->execute();
	if ($stmt->rowCount()) 
	{
		header("location:category_list.php");
	}


 ?>