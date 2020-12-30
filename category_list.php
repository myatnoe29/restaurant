<?php

  include 'db_connect.php';
	include 'backend_header.php';


?>	
        <!-- Begin Page Content -->
        <div class="container-fluid" id="addform">

          <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-hamburger"></i> Category</h1>
          <div class="card shadow mb-4">
           <form action="category_add.php" method="POST">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
            </div>
            <div class="row py-3 pl-3">
            <div class="col-10">
              <input type="text" name="name" class="form-control rounded-pill" placeholder="Enter New Category">
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-secondary rounded-pill"><i class="fas fa-save mr-2"></i>Save Changes</button>
            </div>
            </div>
           </form>
          </div>
        </div>

        <div class="container-fluid " id="editform">
          <div class="card shadow mb-4">
           <form action="category_update.php" method="POST">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Existing Category</h6>
            </div>
            <div class="row py-3 pl-3">
              <div class="col-10">
              <input type="hidden" name="edit_id"  id="editId" class="form-control rounded-pill">
            </div>
            <div class="col-10">
              <input type="text" name="edit_name" id="editName" class="form-control rounded-pill" placeholder="Edit Category">
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-secondary rounded-pill"><i class="fas fa-upload mr-2"></i>Update Changes</button>
            </div>
            </div>
           </form>
          </div>
        </div>


          <!-- DataTales Example -->
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Number</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <!-- <tr>
                      <td>1</td>
                      <td>Beverages</td>
                      <td>
                      		<button class="btn btn-warning">
                          <i class="fas fa-external-link-alt"></i>Edit
                          </button>
                      		<button class="btn btn-danger">
                          <i class="fas fa-trash-alt"></i>Delete
                          </button>
                      </td>
                    </tr> -->

                    <?php 

                    $sql="SELECT * FROM categories ORDER BY name ASC";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute();

                    $rows=$stmt->fetchAll();

                    $i=1;
                    foreach ($rows as $category): 
                    $id=$category['id'];
                    $name=$category['name'];

                      

                     ?>
                     <tr>
                       <td>
                         <?php echo $i; ?>
                       </td>
                       <td>
                         <?= $name; ?>
                       </td>
                       <td>
                         <a href="javascript:void(0)" class="btn btn-warning btnedit" data-id="<?=$id?>">
                          <i class="fas fa-edit mr-2"></i>Edit
                          </a>
                          <a href="category_delete.php?id=<?=$id?>" onclick="return confirm('Are You Sure you want to Delete?')" class="btn btn-danger">
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
     


<?php
	include 'backend_footer.php';
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#addform').show();
    $('#editform').hide();



    $(".btnedit").click(function()
    {
      var id=$(this).data('id');
      $.post('categoryedit.php',{id:id},function(data)
      {
        console.log(data);
        console.log(typeof(data));
        if (data) 
        {
          var categories=JSON.parse(data);

          var id=categories[0].id;
          var name=categories[0].name;

          $('#editId').val(id);
          $('#editName').val(name);
          
          $('#addform').hide(1000);
          $('#editform').show(2000);
        }
      })    
    })

  });
</script>