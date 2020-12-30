<?php

	require 'db_connect.php';

	$id = $_POST['edit_id'];
	$oldphoto=$_POST['edit_ophoto'];
	$name = $_POST['edit_name'];
	$price = $_POST['edit_price'];
	$category = $_POST['edit_category'];
	$description = $_POST['edit_description'];

	$newphoto = $_FILES['newphoto'];
	$fullpath=$oldphoto;
	if ($newphoto['size']>0) 
	{
		unlink($oldphoto);

		//Upload file
		$basepath='img/';
		$fullpath=$basepath.$newphoto['name'];
		move_uploaded_file($newphoto['tmp_name'], $fullpath);
	}

	$sql="UPDATE menus SET name=:name,price=:price,image=:newphoto,description=:description,category_id=:category_id WHERE id=:id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':price',$price);
	$stmt->bindParam(':newphoto',$fullpath);
	$stmt->bindParam(':description',$description);
	$stmt->bindParam(':category_id',$category);
	$row = $stmt->execute();
	
	if($stmt->rowCount())
	 {
	 	header("location:menu_list.php");
	 }
	 else
	 {
	 	echo "error";
	 }

?>