<?php 
	include 'db_connect.php'; 
	require 'frontend_header.php';
?>

  <!-- Page Content -->
  <div class="container my-5">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Today Special</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Appetizer (3)</a>
          <a href="#" class="list-group-item">Beverages (12)</a>
          <a href="#" class="list-group-item">Pizza (1)</a>
          <a href="#" class="list-group-item">Desserts (4)</a>
          <a href="#" class="list-group-item">Burger (2)</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div class="row">

          <?php 

            $sql="SELECT * FROM menus ";
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll();

            $i=1;
                    foreach ($rows as $menu): 
                    $id=$menu['id'];
                    $name=$menu['name'];
                    $price=$menu['price'];
                    $image=$menu['image'];
              
          ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo $image ?>" height="210px" alt=""></a>
                <div class="card-body">
                <h4 class="card-title"><?= $name; ?></h4>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-5">
                  <h5 class="text-danger"><i class="fas fa-tags"></i><?= $price ?></h5>
                  </div>
                  <div class="col-7">
                  <button class="btn btn-secondary addtocart" data-id="<?=$id?>" data-name="<?=$name ?>" data-price="<?=$price ?>" data-image="<?=$image?>">Add to Cart</button>
                  </div>
                </div>
                </div>
              </div>
            </div>   

            <?php 
              $i++;
              endforeach; 
            ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php require 'frontend_footer.php' ?>

<script type="text/javascript">
  $(document).ready(function()
  {
    $('.addtocart').click(function(){
      var id=$(this).data('id');
      var name=$(this).data('name');
      var price=$(this).data('price');
      var image=$(this).data('image');
      var qty=1;

      var item={id:id,name:name,price:price,image:image,qty:qty}
      console.log(item);
      
      //Check shoppingcart
      var cart=localStorage.getItem('cart');
      if(!cart)
      {
        cart='{"itemlist":[]}';
      }
      var cartobj=JSON.parse(cart);
      var hid=false;
      $.each(cartobj.itemlist,function(i,v)
      {
        if (v.id==id) 
        {
          hid=true;
          v.qty=v.qty+1;
        }
      })
      if (!hid) {
        cartobj.itemlist.push(item);
      }
      localStorage.setItem('cart',JSON.stringify(cartobj));
      console.log(cartobj);
      alert('Item Added to Cart!');


    })

    function showCount(){
        let cart=localStorage.getItem('cart');
        if (cart) {
        let cartobj=JSON.parse(cart);
        let total=0;

        $.each(cartobj.itemlist,function(i,v){
          total+=v.qty;
        })
        $('#item_count').html(total);
        }
      }

  });



</script>