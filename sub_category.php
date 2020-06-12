<?php
session_start();
include("conn.php");
require('pages/product_adding_deleting.php');
$s_cat_id=$_GET['s_cat_id'];
$s_cat_name=$_GET['s_cat'];
$cat_name=$_GET['cat_name'];
$cat_id=$_GET['cat_id'];
if(isset($_SESSION['uid']))
{
$uid=$_SESSION['uid'];
}
else
{
	$uid=0;
}
?>


<!DOCTYPE html>
<html>
<head>
<title><?php echo $cat_name; ?></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/search.css" rel="stylesheet" type="text/css" media="all" />

<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script type="text/javascript" src="script1.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src='js/okzoom.js'></script>
<script>
    $(function(){
      $('#example').okzoom({
        width: 150,
        height: 150,
        border: "1px solid black",
        shadow: "0 0 5px #000"
      });
    });
  </script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- //js -->

<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
</head>
	
<body>
<!-- header -->


<?php
require('pages/header.php');

?>

	
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li><b><?php echo $cat_name; ?></b><span>|</span></li>
				<li><b><?php echo $s_cat_name; ?></b></li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->

							
               <?php
            	require('pages/category_bar.php');
            
			   ?>
            
				
				<!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			
		<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6 style=""><?php echo  $s_cat_name;?></h6>
					   <?php $product_fetch = mysqli_query($query, "select * from product where category = '$cat_id' and s_cat_id = '$s_cat_id'");?>
							<?php 
		 			
		 			while($product_result = mysqli_fetch_array($product_fetch))
					{
					  if($product_result['p_id']==null) 
					  {
					  	break;
					  }
					  $img = $product_result['img1'];
						
					   ?>				   
					<div class="col-md-3 w3ls_w3l_banner_left" style="max-height:420px; min-height:420px; margin-bottom:20px;">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>

									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="product.php?pid=<?php echo $product_result['p_id']; ?>"><img src="product_image/<?php echo$product_result['p_id']; ?>/<?php echo $img;?>" alt=" " class="img-responsive" />
											<p><?php echo $product_result['pname'];?></p>
											<h4>Rs.<?php echo $product_result['selling_price']; ?><span><?php echo $product_result['mrp']; ?></span></h4></a>
										</div>
										<div class="snipcart-details">
											<form action="" method="post">
												<fieldset>
													<?php
													if($product_result['quantity']<1)
													{
													?>
													<input type="button" style="background-color:black;" name="add_to_cart" value="Out of Stock" class="button" />
													<?php
													}
													else
													{
													    $pid=$product_result['p_id'];
													    $cart_product_plus_minus_fetch=mysqli_query($query,"select * from cart where uid='$uid' and p_id='$pid'");
                                                    	$cart_product_plus_minus_result=mysqli_fetch_array($cart_product_plus_minus_fetch);
													    if($cart_product_plus_minus_result['quantity']!=null && isset($_SESSION['uid']))
													    {
													?>      
													        <input type="hidden" name="pid" value="<?php echo $product_result['p_id']; ?>" />
												            <input type="hidden" name="quantity" value="1" />
													        <input type="hidden" name="cart_quantity_minus" value="<?php echo $cart_product_plus_minus_result['quantity']; ?>" />
													        
													        <!--<input type="submit" name="add_to_cart" value="Add already added cart" class="button" />-->
													       <div class="center">
													        <div class="input-group">
													 
                                                                <span class="input-group-btn">
                                                                 <button type="submit" name="reduce_one_from_cart" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                                                 <span class="glyphicon glyphicon-minus"></span>
                                                                 </button>
                                                                </span>
                                                                  <?php echo $cart_product_plus_minus_result['quantity']; ?>
                                                                  <span class="input-group-btn">
                                                                 <button type="submit" name="add_to_cart" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                                     <span class="glyphicon glyphicon-plus"></span>
                                                                     </button>
                                                                     </span>
                                                                    </div>
	                                                                <p></p>
                                                                    </div>
													<?php
													    }
													    else
													    {
													 ?>       
													        <input type="hidden" name="pid" value="<?php echo $product_result['p_id']; ?>" />
												            <input type="hidden" name="quantity" value="1" />
													        <input type="submit" name="add_to_cart" value="Add to cart" class="button" />
													  <?php      
													    }
													}
													
													?>
												</fieldset>
											</form>
										</div>
									</div>

								</figure>
							</div>
						</div>
						</div>
					</div>
														
								<?php 
									}
									
									?>
					
					
					<div class="clearfix"> </div>
				</div>
			
			<br>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

<!-- footer -->

<?php
require('pages/footer.php');	
?>
	
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

</body>
</html>