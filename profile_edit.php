<?php

	require 'db_connect.php';
	$id = $_POST['id'];

	$sql = "SELECT * FROM users WHERE id = :id";


	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$row = $stmt->fetchAll();
	// var_dump($row);
	echo json_encode($row);
	
?>