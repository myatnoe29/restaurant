<?php 
	require 'db_connect.php'; 
	require 'backend_header.php';

	$voucherno = $_REQUEST['vno'];

	$sql1 = "SELECT o.*, u.name, u.phone, u.address
					FROM orders o, users u
          WHERE o.voucherno = '$voucherno'";
  $stmt1 = $pdo->prepare($sql1);
  $stmt1->execute();
  $rows1 = $stmt1->fetchAll();
  foreach ($rows1 as $order): 
	  $orderdate = $order['orderdate'];
	  $total = $order['total'];
	  $note = $order['note'];
	  $customername = $order['name'];
	  $customerphone = $order['phone'];
	  $customeraddress = $order['address'];
  endforeach; 
?>

	<div class="container-fluid">

    <!-- Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-clipboard-list"></i> Order Invoice</h1>

    <!-- DataTales Table -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-secondary"><?= $voucherno ?></h6>
      </div>
      <div class="card-body">
      	<h4 class="text-center bg-secondary text-white py-2">Invoice</h4>
      	<div class="row ">
      		<!-- restaurant address -->
      		<div class="col-lg-6">
      			<h5 class="my-3">Zay Ben Restaurant</h5>
      			<p>No.330, Ahlone Road, Dagon Township, Yangon <br> International Hotel Compound</p>
      			<p>Phone: (+95) 252 221 114</p>
      		</div>

      		<!-- restaurant logo -->
      		<div class="col-lg-6 mt-5">
      			<img src="img/logo.png" width="70" height="70" ><span class="pl-3 font-weight-bold" style="font-size: 22px;">Zay Ben Restaurant</span>
      		</div>
      	</div>
        <div class="row">
          <div class="col-12">
            <hr>
          </div>
        </div>

      	<div class="row my-4">
      		<!-- customer info -->
      		<div class="col-lg-6">
      			<p>Name: <?= $customername ?></p>
      			<p>Phone: <?= $customerphone ?></p>
      			<p>Address: <?= $customeraddress ?></p>
      		</div>

      		<!-- restaurant logo -->
      		<div class="col-lg-6">
      				<table class="table table-bordered">
      					<tr>
      						<td>Invoice No.</td>
      						<td><?= $voucherno ?></td>
      					</tr>
      					<tr>
      						<td>Date</td>
      						<td><?= date('F d (l), Y', strtotime($orderdate)) ?></td>
      					</tr>
      				</table>
      		</div>
      	</div>

        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Menu</th>
                <th>Unit Price (MMK)</th>
                <th>Quantity</th>
                <th>Price (MMK)</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $sql = "SELECT od.*, m.name as menuname, m.price as unitprice
                				FROM orderdetails od, menus m
                        WHERE od.item_id = m.id
                        AND od.voucherno = '$voucherno'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $rows = $stmt->fetchAll();

                $i = 1; $subtotal = 0;
                foreach ($rows as $orderdetail):  
                  $menuname = $orderdetail['menuname'];
                  $unitprice = $orderdetail['unitprice'];
                  $qty = $orderdetail['qty'];
                  $subtotal += $unitprice * $qty;
              ?>
              <tr>
                <td>
                  <?php echo $i; ?>
                </td>
                <td class="text-secondary font-weight-bold">
                  <?= $menuname;?>
                </td>
                <td>
                  <?= $unitprice;?>
                </td>
                <td>
                  <?= $qty;?>
                </td>
                <td>
                 <?= ($unitprice * $qty);?>
                </td>
              </tr>
            <?php 
              $i++;
              endforeach; 
            ?>
            <tr>
            	<td rowspan="3" colspan="2">
            		NOTE: <?= $note ?>
            	</td>
            	<td colspan="2">Sub Total</td>
            	<td><?= $subtotal ?></td>
            </tr>
            <tr>
            	<td colspan="2">Tax</td>
            	<td>5%</td>
            </tr>
            <tr>
            	<td colspan="2" class="text-danger font-weight-bold">Total Amount (MMK)</td>
            	<td class="text-danger font-weight-bold"><?= $total ?></td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- /table end -->
  </div>
  <!-- /.container-fluid -->

<?php require 'backend_footer.php'; ?>