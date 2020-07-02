<!DOCTYPE html>
<?php 
//done1
session_start();
if(isset($_SESSION['bid'])){
	require('../conn.php');
    $bid=$_SESSION['bid']; 
	if(isset($_POST['submit_date']))
	{
		$date=$_POST['check_date'];
		echo $date;
		$order_check=mysqli_query($query,"select * from order_confirmed where order_date='$date' order by o_id desc");
	}
	else
	{
		$order_check=mysqli_query($query,"select * from order_confirmed order by o_id desc");
	}
	
}
else {
  echo "<script>alert('Access Denied. Please Login First'); window.location.assign('../seller/signup.php');  </script>";


}
?>
<html>
<head>
<title>Grocease: Merchant Orders</title>
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

<!-- start-smoth-scrolling -->
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
				<li>View Orders</li>
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
<h2 class="title-2"><i class="fa fa-credit-card"></i> My ADS</h2>
<form action="view_orders.php" method="post" >
	<?php  
		if(isset($_POST['submit_date']))
		{
	?>
	<input type="date" name="check_date" value="<?php echo $date; ?>" placeholder="Select Date For check order" />
	<?php
		}
		else
		{
	?>
	<input type="date" name="check_date" placeholder="Select Date For check order"  />
	<?php
		}
	?>
	<input type="submit" name="submit_date" value="Check Orders" class="btn btn-success btn-sm"> 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-success btn-sm" href="view_orders.php">All Orders</a>
	</form>
	
<div class="table-responsive">
<div class="table-action">
</div>

<table class="table table-striped table-bordered add-manage-table">
<thead>
<tr>
<th>Order ID.</th>
<th>Order Total</th>
<th>Customer Details</th>
<th>Order Date & Time</th>
<th>Option</th>
</tr>
</thead>
<tbody>
	<?php
	
	  $i = 1;
		while($order_fetch=mysqli_fetch_array($order_check))
		{
			$o_id[$i]= $order_fetch['o_id'];
		    $uid[$i]= $order_fetch['uid'];
            $address_id[$i]= $order_fetch['address_id'];
            $cancel_flag[$i]= $order_fetch['flag'];
			$order_date[$i]  = $order_fetch['order_date'];
			$order_time[$i]  = $order_fetch['order_time'];
			$order_day[$i]  = $order_fetch['order_day'];
			$grand_total[$i]  = $order_fetch['grand_total'];
			$customer_address_fetch=mysqli_query($query,"select * from billing_adddress where address_id='$address_id[$i]' and uid='$uid[$i]'");
			$user_address=mysqli_fetch_array($customer_address_fetch);
			$user_name[$i]=$user_address['name'];
			$user_number[$i]=$user_address['mobile'];
			$house_no[$i]=$user_address['house_no'];
			$street[$i]=$user_address['street'];
			$landmark[$i]=$user_address['landmark'];
			$status_fetch=mysqli_query($query,"select * from order_tracking where o_id='$o_id[$i]'");
			$status_result=mysqli_fetch_array($status_fetch);
			if($status_result['confirmed']!=0 && $status_result['shipped']!=1 && $status_result['delivered']!=1)
			{
				$status="confirmed";
			}
			if($status_result['confirmed']!=0 && $status_result['shipped']!=0 && $status_result['delivered']!=1)
			{
				$status="shipped";
			}
			if($status_result['confirmed']!=0 && $status_result['shipped']!=0 && $status_result['delivered']!=0)
			{
				$status="delivered";
			}
			if($status_result['confirmed']!=1 && $status_result['shipped']!=1 && $status_result['delivered']!=1)
			{
				$status="received";
			}
			if($cancel_flag[$i]==0)
			{
				$status="Cancelled";
			}
?>

<div class="banner-bottom-grid1 privacy1-gridt">
							
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<h4>Order Totoal Rs.<?php echo $grand_total[$i]; ?></br> Order Status : <?php if($cancel_flag[$i]==0){ ?><span style="color: red;"><?php echo $status; ?></span> <?php } else{ echo $status; } ?> </br>
											Order Time : <?php echo $order_date[$i]."||".$order_time[$i]; ?> </br>
											Customer name : <?php echo $user_name[$i]; ?> </br>
											Customer Contact : <?php echo $user_number[$i]; ?> </br>
											Customer Address: <?php echo $street[$i].",".$landmark[$i]; ?> </br>
											</h4>
											<?php if($cancel_flag[$i]==0)
											{
											?>
											<button type="button" class="fa fa-pencil-square-o btn btn-danger btn-md" disabled> Order Canceled</butto>
											<?php
											}
											else
											{
											?>
    										<form action="view_order_details.php" method="get" >
       										 <input type="hidden" name="number" value="<?php echo $user_number[$i]; ?>" />
      										 <button type="submit" class="fa fa-pencil-square-o btn btn-success btn-md" name="order_detail" value="<?php echo $o_id[$i]; ?>" > View Order</butto>
    										</form>
											<?php
											}	
											?>
									</div>
									</div>
								</figure>
							</div>
						
					
					</div>

<?php

			$i=$i+1;
			
		}			
?>
</tbody>
</table>
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