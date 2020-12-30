<?php 
 	include 'db_connect.php';
	require 'backend_header.php';


 ?>

          <!-- Customerlist table -->
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Customer List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Number</th>
                      <th>Name</th>
                      <th>Phone No.</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php 

                    $sql="SELECT * FROM users WHERE role='Member'";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute();

                    $rows=$stmt->fetchAll();

                    $i=1;
                    foreach ($rows as $user): 
                    $id=$user['id'];
                    $name=$user['name'];
                    $phone=$user['phone'];
                    $email=$user['email'];
                    $address=$user['address'];
                    $profile=$user['profile'];

                     
                     ?>
                     <tr>
                       <td>
                         <?php echo $i; ?>
                       </td>
                       <td>
                         <?= $name; ?>
                       </td>
                       <td>
                         <?= $phone; ?>
                       </td>
                       <td>
                         <a href="javascript:void(0)" class="btn btn-primary btndetail" data-id="<?=$id?>"  data-toggle="modal" data-target="#detailModal">
                          <i class="fas fa-eye mr-2"></i>Detail
                          </a>
                          <a href="userdelete.php?id=<?=$id?>" onclick="return confirm('Are You Sure you want to Delete?')" class="btn btn-danger">
                          <i class="fas fa-trash mr-2"></i>Delete
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
      </div>

     <!-- detail model -->
 <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="additemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detail_name"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <img src="" id="detail_photo" class="img-fluid">
              </div>
              <div class="col-8">
                <p id="detail_email"></p>
                <p id="detail_phone"></p>
                <p id="detail_address"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- end of detail modal -->

 <?php 
 	require 'backend_footer.php';
  ?>
<script type="text/javascript">

  $(document).ready(function(){
  $(".btndetail").click(function()
    {
      var id=$(this).data('id');
      $.post('profile_edit.php',{id:id},function(data)
      {
        console.log(data);
        console.log(typeof(data));
        if (data) 
        {
          var user = JSON.parse(data);
                // var category = JSON.parse(cname);
                var id = user[0].id;//to ask 
                var name = user[0].name;
                var phone = user[0].phone;
                var email = user[0].email;
                var address = user[0].address;
                var profile = user[0].profile;

                $('#detail_photo').attr('src',profile);
                //console.log(description);

                $("#detail_name").text(name);
                $("#detail_email").text(email);
                $("#detail_phone").text(phone);
                $("#detail_address").text(address);

                $('#detail_photo').attr('src',photo);
                //console.log(description);

          // $("#detail_name").text(name);
          // $("#detail_price").text(price);
          // $("#detail_category").text(category);
          // $("#detail_description").text(description);

                $("#detailModal").modal('show');
        }
      })
      
      
    })

})
</script>
