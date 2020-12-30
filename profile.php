<?php 
	include 'db_connect.php';
	require 'frontend_header1.php';

	  $id=$_SESSION['UserID'];
    $profile=$_SESSION['loginuser']['profile'];
  	$name=$_SESSION['loginuser']['name'];
  	$email=$_SESSION['loginuser']['email'];
  	$phone=$_SESSION['loginuser']['phone'];
  	$address=$_SESSION['loginuser']['address'];
 ?>

<div class="container my-5" id="profilediv">
	<div class=" mb-3" style="max-width: 1100px;">
	  <div class="row no-gutters">
	    <div class="col-md-4">
	      <img src="<?php echo $profile; ?>" class="card-img" alt="...">
	    </div>
	    <div class="col-md-8">
	      <div class="card-body ml-3">
	        <h5 class="card-title">Name: <?php echo $name; ?></h5>
	        <h5 class="card-title">Email: <?php echo $email; ?></h5>
	        <h5 class="card-title">Phone: <?php echo $phone; ?></h5>
	        <h5 class="card-text">Address: <?php echo $address ?></h5>
	        <button class="btn btn-secondary btnedit" data-id="<?=$id?>">Edit</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>

<!-- Edit contianer -->
<div class="container my-5" id="editprofilediv">
	<h1 class="text-center mb-5">Edit Your Profile </h1>
	<form action="profile_update.php" method="POST" enctype="multipart/form-data">
	<div class="form-group row">
    <input type="hidden" name="editid" id="editid">
    <input type="hidden" name="editophoto" id="editophoto">
    <label class="col-sm-2 col-form-label">Profile</label>
    <div class="col-sm-10">

	<ul class="nav nav-tabs" id="myTab" role="tablist">
  		<li class="nav-item">
   	 		<a class="nav-link active" id="oldprofile-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="oldprofile" aria-selected="true">Old Profile</a>
  		</li>
  		<li class="nav-item">
    		<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Profile</a>
  		</li>
	</ul>

	<div class="tab-content" id="myTabContent">
  		<div class="tab-pane fade show active" id="oldprofile" role="tabpanel" aria-labelledby="oldprofile-tab">

  			<img src="" id="oldphoto" class="img-fluid" height="150px" width="200px">

  		</div>

  		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  		  <input type="file" name="nprofile">

  		</div>
	</div>
    </div>
  	</div>
  		 
  <div class="form-group row">
    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="einputname" name="ename" placeholder="Name">
    </div>
 	</div>

  	<div class="form-group row">
    <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="einputphone" name="ephone" placeholder="Phone number">
    </div>
  	</div>

    <div class="form-group mt-3 row">
    <label for="inputaddress" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="einputaddress" name="eaddress" placeholder="Address"></textarea>
    </div>
  	</div>

 	 <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-success" data-id='<?=$id;?>'>Update</button>
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
		$("#profilediv").show();
		$("#editprofilediv").hide();

	    $(".btnedit").click(
        function()
        {
        $("#profilediv").hide(1000);
		    $("#editprofilediv").show(2000);

        var id = $(this).data('id');//to ask
          $.post('profile_edit.php',{id:id},
            function(data)
            {
              console.log(data);
              
              if (data) 
              {
                var user = JSON.parse(data);
                // var category = JSON.parse(cname);
                var id = user[0].id;//to ask 
                var name = user[0].name;
                var phone = user[0].phone;
                var address = user[0].address;
                var profile = user[0].profile;
                

                $('#editophoto').val(profile);

                $('#oldphoto').attr('src',profile);
                //console.log(description);

                $("#editid").val(id);
                $("#einputname").val(name);
                $("#einputphone").val(phone);
                $("#einputaddress").val(address);


              } 

         
        })
 	
 	    });

    });
 </script>