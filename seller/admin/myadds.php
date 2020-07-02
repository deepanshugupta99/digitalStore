<!DOCTYPE html>

<?php 
//done1
session_start();
if(isset($_SESSION['bid'])){
	require('../conn.php');
    $bid=$_SESSION['bid'];
}
else {
  echo "<script>alert('Access Denied. Please Login First'); window.location.assign('../seller/signup.php');  </script>";


}
?>
<html>
<head>
<title>Grocease: Merchant Products</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="../../css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="../../js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../../js/move-top.js"></script>
<script type="text/javascript" src="../../js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
<style>
	.warning
	{
		color: red;
		font-size: 13px;
	}
	
</style>	
<body>
<!-- header -->
	

<?php
require('../../pages/seller_header.php');

?>


<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>products</li>
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
            	require('../../pages/seller_category_bar.php');
            
			   ?>
          
				<!-- /.navbar-collapse -->
			</nav>
			
		</div>
		<div class="w3l_banner_nav_right">

			
		<div class="col-sm-9 page-content">
<div class="inner-box">
<h2 class="title-2"><i class="fa fa-credit-card"></i> My Products</h2>
<div class="table-responsive">
<div class="table-action">
</div>


	<?php
	$pid_check2=mysqli_query($query,"select * from product where b_id='$bid' order by pname");
	  
	  $i = 1;
		while($product_fetch=mysqli_fetch_array($pid_check2))
		{
			$pid[$i]= $product_fetch['p_id'];
		    $pname[$i]= $product_fetch['pname'];
            $mrp[$i]= $product_fetch['mrp'];
			$sprice[$i]  = $product_fetch['selling_price'];
			$pdesc[$i]  = $product_fetch['pdesc'];
			$img1[$i]  = $product_fetch['img1'];
			$quantity[$i]  = $product_fetch['quantity'];
	
?>
			
			
			<div class="banner-bottom-grid1 privacy1-gridt">
							
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											    
										<img class="agile_top_brand_right_grid1" src="../../product_image/<?php echo $pid[$i]; ?>/<?php echo $img1[$i]; ?>" alt=" " class="img-responsive" height="50px" width="60px" />
										
											<?php echo $pname[$i]; ?>
											<h4>Selling Price<?php echo $sprice[$i]; ?> <span style="color: red;"> Mrp :<?php echo $mrp[$i]; ?></span> || Quantity <?php echo $quantity[$i]; ?></h4>
										
									
										
													<form action="product_update.php" method="get" ><button type="submit" class="btn btn-sm btn-success" name="pid" value="<?php echo $pid[$i]; ?>" > Edit</butto></form>
<form action="#" method="get" ><button type="submit" class="btn-sm btn btn-info" name="addview" > view</butto></form>
						
													<form action="myadds.php" method="get" ><button type="submit" class="btn-sm btn-danger" name="adddelete" > Delete</butto></form>
												
									</div>
									</div>
								</figure>
							</div>
						
					
					</div>
<?php
			$i=$i+1;
			
		}			
?>








</div>
</div>
</div>


		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

<!-- footer -->
	<?php require('../../pages/footer.php'); ?>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="../../js/bootstrap.min.js"></script>
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
<script src="../../js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
		<script src="../../js/form_valid.js"></script>
<script type="text/javascript" src="../assets/js/cat_change.js"></script>
<script type="text/javascript" src="../assets/js/form_valid.js"></script>
<script type="text/javascript" src="../assets/js/form_valid_submit.js"></script>
<script type="text/javascript" src="../assets/js/jquery-min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/material.min.js"></script>
<script type="text/javascript" src="../assets/js/material-kit.js"></script>
<script type="text/javascript" src="../assets/js/jquery.parallax.js"></script>
<script type="text/javascript" src="../assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="../assets/js/wow.js"></script>
<script type="text/javascript" src="../assets/js/main.js"></script>
<script type="text/javascript" src="../assets/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="../assets/js/waypoints.min.js"></script>
<script type="text/javascript" src="../assets/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/form-validator.min.js"></script>
<script type="text/javascript" src="../assets/js/contact-form-script.js"></script>
<script type="text/javascript" src="../assets/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.themepunch.tools.min.js"></script>
<script src="../assets/js/bootstrap-select.min.js"></script>
</body>
</html>