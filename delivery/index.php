<?php require('../conn.php');
session_start();    
if(isset($_SESSION['d_id']))
{
$did = $_SESSION['d_id'];
require('../pages/delivery_functionality.php');
}
else
{
echo "<script>alert('Please Login First');window.location.assign('login.php');</script>";
}



?>

<!DOCTYPE html>
<html>
<head>
<title>Grocease: India's Biggest Online Grocery Store | Privacy Policy</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="../css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="../js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
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
	
<body>
<!-- header -->
	
<?php
include('../pages/delivery_header.php');
?>
	
	
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li><a href="submit/logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			 
			 
			 
			 <!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
<!-- privacy -->
		<div class="privacy">
		<h2>Delivery Agent</h2>
			<div class="privacy1">
			    <h3>My Orders</h3>
		<form action="index.php" method="post" >
	<?php  
		if(isset($_POST['submit_date']))
		{
	?>
	<input type="date" name="check_date" value="<?php echo $date; ?>" placeholder="Select Date For check order"  />
	<?php
		}
		else
		{
	?>
	<input type="date" name="check_date" value="<?php $date; ?>" placeholder="Select Date For check order"  />
	<?php
		}
	?>
	<input type="submit" name="submit_date" value="Check Orders" class="btn btn-success btn-sm"> 
	
	</form>
			<?php 
					  $i = 1;
		while($order_fetch=mysqli_fetch_array($order_check))
		{
			$o_id[$i]= $order_fetch['o_id'];
		    $uid[$i]= $order_fetch['uid'];
            $address_id[$i]= $order_fetch['address_id'];
			$order_date[$i]  = $order_fetch['order_date'];
			$order_time[$i]  = $order_fetch['order_time'];
			$order_day[$i]  = $order_fetch['order_day'];
			$grand_total[$i]  = $order_fetch['grand_total'];
			$cancel_flag[$i]= $order_fetch['flag'];
			$customer_address_fetch=mysqli_query($query,"select * from billing_adddress where address_id='$address_id[$i]' and uid='$uid[$i]'");
			$user_address=mysqli_fetch_array($customer_address_fetch);
			$user_name[$i]=$user_address['name'];
			$user_number[$i]=$user_address['mobile'];
			$house_no[$i]=$user_address['house_no'];
			$street[$i]=$user_address['street'];
			$landmark[$i]=$user_address['landmark'];
			$user_fetch=mysqli_query($query,"select * from users where uid='$uid[$i]'");
			$user_result=mysqli_fetch_array($user_fetch);
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
			
			if($cancel_flag[$i]!=0)
			{
			    
				?>
				<div class="banner-bottom-grid1 privacy1-grid">
					<ul>
						<li><h4>Order ID:<?php echo $o_id[$i]; ?></h4><span></span></li><br>
						<li><h4>Order Total:<?php echo $grand_total[$i]; ?></h4><span></span></li><br>
						<li><h5><b>Customer Name:&nbsp;&nbsp;&nbsp;</b><?php  echo  $user_name[$i]; ?></h5><span></span></li><br>
						<li><h5><b>Customer number:&nbsp;&nbsp;&nbsp;</b><?php echo  $user_number[$i]; ?></h5></li><br>
						<li><h5><b>Alternate number:&nbsp;&nbsp;&nbsp;</b><?php echo $user_result['contact']; ?></h5></li><br>
						<li><h5><b>Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $status; ?></h5></li><br>
						<li><h5><b>Address:&nbsp;</b><?php echo $house_no[$i].", ".$landmark[$i].",".$street[$i]; ?></h5></li><br>
						<li><a href="delivery_details.php?o_id=<?php echo $o_id[$i]; ?>&&address_id=<?php echo $address_id[$i]; ?>&&delivery_status=<?php echo $status_result['delivered'];  ?>"><button type="button" class="btn btn-info btn-lg">More Detail</button></a></li>
					</ul>
					
				</div>
				<?php
			}
			else
			{
			    ?>
				<div class="banner-bottom-grid1 privacy1-grid">
					<ul>
						<li><h4>Order ID:<?php echo $o_id[$i]; ?></h4><span></span></li><br>
						<li><h4>Order Total:<?php echo $grand_total[$i]; ?></h4><span></span></li><br>
						<li><h5><b>Customer Name:&nbsp;&nbsp;&nbsp;</b><?php  echo  $user_name[$i]; ?></h5><span></span></li><br>
						<li><h5><b>Customer number:&nbsp;&nbsp;&nbsp;</b><?php echo  $user_number[$i]; ?></h5></li><br>
						<li><h5><b>Alternate number:&nbsp;&nbsp;&nbsp;</b><?php echo $user_result['contact']; ?></h5></li><br>
					
						<li><h5><b>Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color:red;">Order Canceled</span></h5></li><br>
						<li><h5><b>Address:&nbsp;</b><?php echo $house_no[$i].", ".$landmark[$i].",".$street[$i]; ?></h5></li><br>
						<li><button type="button" class="btn btn-info btn-lg">Order Canceled</button></a></li>
					</ul>
					
				</div>
			    
			    <?php
			}
				
				
				$i++;
				} 
				if($i==1)
				{
				?>
				Sorry There is no order.
				<?php
				}
				?>
			</div>
				</div>
<!-- //privacy -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- newsletter -->
	<?php require('../pages/footer.php');?>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
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
<script src="../js/minicart.js"></script>
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
</body>
</html>