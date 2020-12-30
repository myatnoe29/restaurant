<?php 

require 'db_connect.php';
	$id = $_POST['id'];
	$status='Confirm';

	$sql = "UPDATE orders SET status=:status WHERE id=:id ";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':status',$status);
	$stmt->execute();
	/*$row = $stmt->fetchAll();
	echo json_encode($row);*/ 

	echo "successful update";
	

	?>