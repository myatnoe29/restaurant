<?php 
	require 'db_connect.php';

	$id=$_REQUEST['id'];
	$sql='DELETE FROM menus WHERE id=:id';
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();


	if ($stmt->rowCount()) 
	{
		header("location:menu_list.php");
	}
	else
	{
		echo "error";
	}


 ?>