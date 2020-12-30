<?php

  include 'db_connect.php';
	include 'backend_header.php';

?>	
      <!-- additem modal box -->
        <div class="modal fade" id="Modalcenter" tabindex="-1" role="dialog" aria-labelledby="ModalcenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalcenterTitle">Add New Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="menu_add.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
              
              <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Item Photo</label>
                <div class="col-sm-10">
                  <input type="file"  id="image" name="itemimage">
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Item Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Item Name">
                </div>
              </div>
              <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter Item Price">
                </div>
              </div>
              <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <input type="text" name="category" id="category">
                </div>
              </div>
              <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="summernote" name="description" placeholder="Description"></textarea>
                </div>
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Close</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save changes</button>
          </div>
        </form>
        </div>
        </div>
        </div>

<!-- edit moal -->
  <div class="modal fade" id="edititemModal" tabindex="-1" role="dialog" aria-labelledby="edititemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">

      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="edititemModalLabel">Item Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="menu_update.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          
            <div class="form-group row">
              <input type="hidden" name="edit_id" id="editid">
              <input type="hidden" name="edit_ophoto" id="editophoto">
              <label for="itemphoto" class="col-sm-2 col-form-label">Item Photo</label>
              <div class="col-sm-10">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="oldphoto-tab" data-toggle="tab" href="#oldphoto1" role="tab" aria-controls="oldphoto" aria-selected="true">Old Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="newphoto-tab" data-toggle="tab" href="#newphoto" role="tab" aria-controls="newphoto" aria-selected="false">New Profile
                      </a>
                    </li>
                </ul>

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="oldphoto1" role="tabpanel" aria-labelledby="oldphoto-tab">

                      <img src="" id="oldphoto" class="img-fluid" height="150px" width="200px">

                    </div>

                    <div class="tab-pane fade" id="newphoto" role="tabpanel" aria-labelledby="newphoto-tab">

                    <input type="file" name="newphoto">

                    </div>
                  </div>

                </div>

              </div> 
            
                   
              <div class="form-group row">
                <label for="inputname" class="col-sm-2 col-form-label">Item Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="editname" name="edit_name" placeholder="Name">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="editprice" name="edit_price" placeholder="Price">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="editcategory" name="edit_category" placeholder="Category">
                </div>
              </div>
              <div class="form-group mt-3 row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea type="text" class="form-control" id="editsummernote" name="edit_description" ></textarea>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>





        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-utensils"></i> Item</h1>
        </div>


          <!-- DataTales Example -->
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-10">
                <h3 class="m-0 font-weight-bold text-danger">Item List</h3>
                </div>
                <div class="col-2">
                  <button class="btn btn-secondary" data-toggle="modal" data-target="#Modalcenter"><i class="fas fa-plus mr-2"></i> Add New</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Price</th>
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

                    $sql="SELECT menus.*,categories.name as cname FROM menus INNER JOIN categories ON categories.id=menus.category_id ORDER BY menus.id DESC";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute();

                    $rows=$stmt->fetchAll();

                    $i=1;
                    foreach ($rows as $item): 
                    $id=$item['id'];
                    $name=$item['name'];
                    $price=$item['price'];
                    $photo=$item['image'];
                    $desc=$item['description'];

                    $cid=$item['category_id'];
                    $cname=$item['cname'];
  

                     ?>
                     <tr>
                       <td>
                         <?php echo $i; ?>
                       </td>
                       <td>
                         <?= $name; ?>
                       </td>
                       <td>
                         <?= $cname; ?>
                       </td>
                       <td>
                         <?= $price; ?>
                       </td>
                       <td>
                        <a href="javascript:void(0)" class="btn btn-primary btndetail" data-id="<?=$id?>" data-toggle="modal" data-target="#detailModal">
                          <i class="fas fa-eye mr-2"></i>Detail
                          </a>
                         <a href="javascript:void(0)" class="btn btn-warning btnedit" data-id="<?=$id?>">
                          <i class="fas fa-edit mr-2"></i>Edit
                          </a>
                          <a href="menu_delete.php?id=<?=$id?>" onclick="return confirm('Are You Sure you want to Delete?')" class="btn btn-danger">
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

      <!-- detail model -->
 <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="additemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detail_name" ></h5>
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
                <p id="detail_price"></p>
                <p id="detail_category"></p>
                <p id="detail_description"></p>
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
     


<?php

	include 'backend_footer.php';
?>
<script type="text/javascript">
  $(document).ready(function(){
      $(".btnedit").click(
        function()
        {
          var id = $(this).data('id');//to ask
          $.post('menu_edit.php',{id:id},
            function(data)
            {
              console.log(data);
              
              if (data) 
              {
                var menu = JSON.parse(data);
                // var category = JSON.parse(cname);
                var id = menu[0].id;//to ask 
                var name = menu[0].name;
                var price = menu[0].price;
                var category = menu[0].cname;
                var photo = menu[0].image;
                var description = menu[0].description;

                $('#editophoto').val(photo);

                $('#oldphoto').attr('src',photo);
                //console.log(description);

                $("#editid").val(id);
                $("#editname").val(name);
                $("#editprice").val(price);
                $("#editcategory").val(category);
                $("#editsummernote").text(description);

                $("#edititemModal").modal('show');
              } 
              
            })
          })

  $(".btndetail").click(function()
    {
      var id=$(this).data('id');
      $.post('menu_edit.php',{id:id},function(data)
      {
        console.log(data);
        console.log(typeof(data));
        if (data) 
        {
          var menu=JSON.parse(data);

          var id=menu[0].id;
          var name=menu[0].name;
          var price = menu[0].price;
          var category = menu[0].cname;
          var photo = menu[0].image;
          var description = menu[0].description;

          $('#detail_photo').attr('src',photo);
                //console.log(description);

          $("#detail_name").text(name);
          $("#detail_price").text(price);
          $("#detail_category").text(category);
          $("#detail_description").text(description);

          $("#detailModal").modal('show');
        }
      })
      
      
    })



  });
</script>

