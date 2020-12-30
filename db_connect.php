<?php 
	$servername="localhost";
	$dbname="zayban";
	$user="root";
	$password="";

	$dsn="mysql:host=$servername;dbname=$dbname";
	$pdo=new PDO ($dsn,$user,$password);

	try
	{
		$conn=$pdo;
		//set the pdo error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		//echo "Connect successfully";
	}
	catch(PDOException $e)
	{
		echo "Connection Failed: ".$e->getMessage();
	}
	
 ?>