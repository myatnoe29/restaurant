<?php

	 require 'db_connect.php';
	 require 'backend_header.php';

 ?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today Orders</div>
             
              	 <?php
              		$tdyorder = "SELECT COUNT(*) FROM orders WHERE orderdate = CURDATE()";
                  $stmt=$pdo->prepare($tdyorder);
                  $stmt->execute();
                  $rows=$stmt->fetchAll();
                  foreach($rows as $orders)
                  {
              	?>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?=$orders['COUNT(*)']; ?>
                  </div>

                <?php } ?> 

            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Customer List</div>
              <?php
                  $usercount = "SELECT COUNT(*) FROM users WHERE role = 'Member'";
                  $stmt=$pdo->prepare($usercount);
                  $stmt->execute();
                  $rows=$stmt->fetchAll();
                  foreach($rows as $user)
                  {
                ?>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?=$user['COUNT(*)']; ?>
                  </div>

                <?php } ?> 

            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Item List</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
               <?php
                  $itemcount = "SELECT COUNT(*) FROM menus WHERE id = id";
                  $stmt=$pdo->prepare($itemcount);
                  $stmt->execute();
                  $rows=$stmt->fetchAll();
                  foreach($rows as $menu)
                  {
                ?>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?=$menu['COUNT(*)']; ?>
                  </div>

                <?php } ?> 

                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Category List</div>
              <?php
                  $categorycount = "SELECT COUNT(*) FROM categories WHERE id = id";
                  $stmt=$pdo->prepare($categorycount);
                  $stmt->execute();
                  $rows=$stmt->fetchAll();
                  foreach($rows as $category)
                  {
                ?>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?=$category['COUNT(*)']; ?>
                  </div>

                <?php } ?> 

            </div>
            <div class="col-auto">
              <i class="fas fa-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
 </div>

  <!-- Today Order List
 -->

 	<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-danger">Today Order List</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Number</th>
                      <th>Voucher No</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php 

                    $sql = "SELECT * FROM orders where DATE(orderdate) = CURDATE()";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute();

                    $rows=$stmt->fetchAll();

                    $i=1;
                    foreach ($rows as $orders): 
                    $id=$orders['id'];
                    $orderdate=$orders['orderdate'];
                    $voucherno=$orders['voucherno'];
                    $note=$orders['note'];
                    $status=$orders['status'];

                    ?>
                     <tr>
                       <td>
                         <?php echo $i; ?>
                       </td>
                       <td>
                         <p class="text-secondary"><?= $voucherno; ?></p>
                       </td>
                       <td>
                         <?= $orderdate; ?>
                       </td>
                       <td>
                         <?= $status; ?>
                       </td>
                       <td>
                         <a href="javascript:void(0)" class="btn btn-success btnconfirm" data-id="<?=$id?>">
                          <i class="fas fa-check-double mr-2"></i>confirm
                          </a>
                          <a href="order_detail.php?vno=<?= $voucherno ?>" class="btn btn-info">
                          <i class="fas fa-truck mr-2"></i>Delivery
                          </a>
                       </td>
                     </tr>
                
                    <?php 
                      $i++;
                      endforeach; 
                    ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
         </div>




 <?php
 	require 'backend_footer.php';
 ?>
<script type="text/javascript">
  $(document).ready(function()
  {
    $(".btnconfirm").click(function()
    {
      var id=$(this).data('id');
      $.post('order_confirm.php',{id:id},function(data)
      {
        if(data)
        {
          alert('Order is Confirmed.');
          window.location= "dashboard.php";
          
        }

      })
       
    })
  });

</script>