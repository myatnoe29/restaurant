<?php 
	require "db_connect.php";

	$id=$_POST['id'];

	$sql='SELECT * FROM categories WHERE id=:id';
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();

	$row=$stmt->fetchAll();

	echo json_encode($row);
 ?>