<?php

	require 'db_connect.php';
	$id = $_POST['id'];
	$sql = "SELECT menus.*, categories.name as cname FROM menus INNER JOIN categories ON categories.id = menus.category_id AND menus.id=:id";


	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$row = $stmt->fetchAll();
	// var_dump($row);
	echo json_encode($row);
	
?>