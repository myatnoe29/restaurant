<?php
	require 'db_connect.php';

	$name = $_POST['name'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$description = $_POST['description'];

	$photo=$_FILES['itemimage'];
	$basepath='img/';
	$fullpath=$basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);

	/*echo $name."<br>";
	echo $price."<br>";
	echo $category."<br>";
	echo $description."<br>";
	echo $fullpath."<br>";
*/

	$sql="INSERT INTO menus (name, price, image, description, category_id) VALUES(:name,:price,:image,:description,:category_id)";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':price',$price);
	$stmt->bindParam(':image',$fullpath);
	$stmt->bindParam(':description',$description);
	$stmt->bindParam(':category_id',$category);
	$stmt->execute();

	if ($stmt->rowCount()) 
	{
		header('location:menu_list.php');
	}
	else
	{
		echo "error";
	}
	
?>