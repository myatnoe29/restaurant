<?php

	require 'db_connect.php';

	$id = $_POST['editid'];
	$oldphoto=$_POST['editophoto'];
	$name = $_POST['ename'];
	$phone = $_POST['ephone'];
	$address = $_POST['eaddress'];

	$newphoto = $_FILES['nprofile'];
	$fullpath=$oldphoto;
	if ($newphoto['size']>0) 
	{
		unlink($oldphoto);

		//Upload file
		$basepath='img/';
		$fullpath=$basepath.$newphoto['name'];
		move_uploaded_file($newphoto['tmp_name'], $fullpath);
	}

	$sql="UPDATE users SET name=:name,phone=:phone,profile=:profile,address=:address WHERE id=:id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':phone',$phone);
	$stmt->bindParam(':profile',$fullpath);
	$stmt->bindParam(':address',$address);
	
	$row = $stmt->execute();
	
	if($stmt->rowCount())
	 {
	 	header("location:profile.php");
	 }
	 else
	 {
	 	echo "error";
	 }

?>