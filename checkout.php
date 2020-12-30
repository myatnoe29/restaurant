<?php 
	include 'db_connect.php';

	$shopcartdata=$_POST['shopcartdata'];
	$total = $_POST['totalprice'];
	$note=$_POST['note'];
	$shopcartdata_array=json_decode($shopcartdata,true);
	$itemlist_array=$shopcartdata_array['itemlist'];

	session_start();
	$userid=$_SESSION['UserID'];
	$orderdate=date('Y-m-d');
	$order_voucherid=date('d-m-Y-his-').$userid;

	$sql="INSERT INTO orders (orderdate,voucherno,total,note,user_id) VALUES ('$orderdate','$order_voucherid','$total','$note','$userid')";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();

	if ($stmt->rowcount()) 
	{
	foreach ($itemlist_array as $item) 
	{
		$item_id=$item['id'];
		$item_qty=$item['qty'];

		$sql_orderdetail="INSERT INTO orderdetails (voucherno,item_id,qty) VALUES ('$order_voucherid','$item_id','$item_qty')";
		$stmt=$pdo->prepare($sql_orderdetail);
		$stmt->execute();
	}
		header("location:index1.php");
	}
	else 
	{
		echo "error";
	}


 ?>