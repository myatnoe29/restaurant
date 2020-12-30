<?php 
	include 'db_connect.php';
	require 'backend_header.php';
 ?>




       <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-danger">Order List</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Number</th>
                      <th>Voucher No</th>
                      <th>Date</th>
                      <th>Customer</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php 

                    $sql="SELECT orders.*, users.name FROM orders INNER JOIN users ON orders.user_id=users.id ORDER BY orderdate DESC";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute();

                    $rows=$stmt->fetchAll();

                    $i=1;
                    foreach ($rows as $orders): 
                    $id=$orders['id'];
                    $orderdate=$orders['orderdate'];
                    $voucherno=$orders['voucherno'];
                    $note=$orders['note'];
                    $username=$orders['name'];
                    $status=$orders['status'];

                      

                     ?>
                     <tr>
                       <td>
                         <?php echo $i; ?>
                       </td>
                       <td>
                         <a href="#odetailmodal" data-toggle="modal" class="text-primary orderdetail" data-id="<?=$id?>"><?= $voucherno; ?></a>
                       </td>
                       <td>
                         <?= $orderdate; ?>
                       </td>
                       <td>
                         <?= $username; ?>
                       </td>
                       <td>
                         <p class=""><?= $status; ?></p>
                       </td>
                       <td>
                         <a href="javascript:void(0)" class="btn btn-success btnconfirm" data-id="<?=$id?>">
                          <i class="fas fa-check-double mr-2"></i>confirm
                          </a>
                          <a href="order_detail.php?vno=<?= $voucherno ?>"  class="btn btn-info">
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


<!-- Modal -->
<div class="modal fade" id="odetailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Order detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <h4>Date: </h4>
          </div>
          <div class="col-8 mt-2">
            <h5 class="text-muted" id="detail_date"></h5>
          </div>
          <div class="col-4">
            <h4>Voucher no: </h4>
          </div>
          <div class="col-8 mt-2">
            <h5 class="text-muted" id="detail_voucherno"></h5>
          </div>
          <div class="col-4">
            <h4>Total: </h4>
          </div>
          <div class="col-8 mt-2">
            <h5 class="text-muted" id="detail_total"></h5>
          </div>
          <div class="col-4">
            <h4>Note: </h4>
          </div>
          <div class="col-8 mt-2">
            <h5 class="text-muted" id="detail_note"></h5>
          </div>
          <div class="col-4">
            <h4>Status: </h4>
          </div>
          <div class="col-8 mt-2">
            <h5 class="text-danger" id="detail_status"></h5>
          </div>
          
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success btnconfirm" data-id="<?=$id?>">Confirm</button>
      </div>
    </div>
  </div>
</div>



 <?php 
 	require 'backend_footer.php';
  ?>
  <script type="text/javascript">
    $(document).ready(function()
    {
        $(".orderdetail").click(function()
    {
      var id=$(this).data('id');
      $.post('order_edit.php',{id:id},function(data)
      {
        if (data) 
        {
          var order=JSON.parse(data);

          var id=order[0].id;
          var date=order[0].orderdate;
          var total = order[0].total;
          var note = order[0].note;
          var voucherno = order[0].voucherno;
          var status = order[0].status;

          $("#detail_date").text(date);
          $("#detail_voucherno").text(voucherno);
          $("#detail_total").text(total);
          $("#detail_note").text(note);
          $("#detail_status").text(status);

          $("#detailModal").modal('show');
        }
      })
       
    })

        $(".btnconfirm").click(function()
    {
      var id=$(this).data('id');
      $.post('order_confirm.php',{id:id},function(data)
      {
        if(data)
        {
          alert('Order is Confirmed.');
          window.location= "orderlist.php";
          
        }

      })
       
    })
    });
  </script>