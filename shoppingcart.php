<?php 

	include 'db_connect.php';
	require 'frontend_header1.php';
	$userid=$_SESSION['UserID'];

	if(!isset($_SESSION['UserID']))
{
    echo "<script>window.alert('Login required')</script>";
    echo "<script>window.location='login.php'</script>";
}
 ?>

<div class="container my-5">
	<div class="row">
		<div class="col-12">
		<h1 class="text-center">Your Shopping Cart</h1>	
		<hr>
		<p class="text-center">Thank you for your shopping with us</p>
		</div>
	</div>
	<div class="row">
		<div class="col-9">
		</div>
		<div class="col-3">
	<a href="index1.php" class="btn btn-outline-success"><i class="fas fa-shopping-cart mr-2"></i> Continue Shopping</a>
		</div>
	</div>
</div>



 <!-- shopping cart table -->
 <div class="container mb-3">
 	<div class="row">
 		<div class="col-10 ">
 		<h5 class="text-muted">Voucherno. "<?php echo date('his-').$userid; ?>"</h5>
 		</div>
 		<div class="col-2 ">
 		<h5 class=" text-muted">Date: <?php echo date('Y-m-d'); ?></h5>
 		</div>
 		
 	</div>
 </div>
 <div class="container">
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col"></th>
	      <th scope="col">Menu</th>
	      <th scope="col">Qty</th>
	      <th scope="col">Price</th>
	      <th scope="col">Total</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>

	  </tbody>
	</table>
	<hr>
	<form action="checkout.php" method="POST" onsubmit="addtocart()">
	<div class="row mb-5">
		<div class="col-9">
			<textarea class="form-control" placeholder="comment.." name="note"></textarea>
		</div>
		<div class="col-3">
			<input type="hidden" name="shopcartdata" id="shopcartdata">
			<input type="hidden" name="totalprice" id="totalprice">
			<button type="submit"  class="btn btn-success btn-lg"><i class="fas fa-cash-register mr-2"></i>Check Out</button>	
		</div>	
	</div>
	</form>
</div>


 <?php 
 	require 'frontend_footer.php';
  ?>
  <script type="text/javascript">
  	$(document).ready(function()
	{
		$("tbody").on('click','.btndelete',
			function()
		{
			if (confirm('Are you sure ?')) 
			{
				console.log('Delete !');
				let	id=$(this).data('id');
				console.log(id);

				let cart=localStorage.getItem('cart');
				let cartobj=JSON.parse(cart);
				cartobj.itemlist.splice(id,1);
				localStorage.setItem('cart',JSON.stringify(cartobj));
				showtable();
			}
		})
	showtable();
	function showtable()
	{
		var cart=localStorage.getItem('cart');
		if (cart) 
		{
			var cartobj=JSON.parse(cart);
			var html='';
			var j=1;
			
			var subtotal=0;
			var totalprice=0;
			var tax=0;

			$.each(cartobj.itemlist,function(i,v)
			{

			var pricetotal=v.qty*v.price;
				subtotal+=pricetotal;
				tax=(subtotal*0.05);
				totalprice=tax+subtotal
			html+=`<tr>
					<td>${j++}</td>
					<td><img src=${v.image} height="100px" width="150px"</td>
					<td>${v.name}</td>
					<td>${v.qty}</td>
					<td>${v.price}</td>
					<td>${pricetotal}</td>
					<td><button class="btn btn-danger btn-sm btndelete" data-id="${i}"><i class="fas fa-times-circle fa-2x"></i></button>
					</td>
			    	</tr>`;
			    
			});
			html+=`<tr>
			    <td colspan="5" align="right">Subtotal:</td>
				<td colspan="2">${subtotal}</td>
			    </tr>
			    <tr>
			    <td colspan="5" align="right">Tax :</td>
				<td colspan="2">${tax+ " (5%)"}</td>
			    </tr>
			    <tr>
			    <td colspan="5" align="right"><h3 class="text-danger">Total Amount :</h3></td>
				<td colspan="2"><h3 class="text-danger">${totalprice}</h3></td>
			    </tr>`;

			$('tbody').html(html);
			$('#totalprice').val(totalprice);

			}
		}

		


	});

	function addtocart()
		{
			alert('Check out complete');
			var mycart=localStorage.getItem('cart');
			if (mycart) 
			{
				$("#shopcartdata").val(mycart);

				localStorage.clear();
			}
		}


</script>