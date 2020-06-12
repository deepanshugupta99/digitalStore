<?php require('conn.php');
session_start();    
if(isset($_SESSION['uid']))
{
$uid = $_SESSION['uid'];
require('pages/my-orders-functionality.php');
}
else
{
echo "<script>window.location.assign('login.php');</script>";
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Grocease: India's Biggest Online Grocery Store | My Orders</title>
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
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
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
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	
	
<?php require('pages/header.php');?>	
	
	
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>My Orders</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			 
			 
			 <?php require('pages/category_bar.php');?>
			 
			 
			 <!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
<!-- privacy -->
		<div class="privacy">
			<div class="privacy1">
				<h3>My Orders</h3>
				<?php 
				for($j=0;$j<$i;$j++)
				{
				    if($cancel_flag[$j]!=0)
				    {			        
				?>
				<div class="banner-bottom-grid1 privacy1-grid">
					<ul>
						<li><i class="glyphicon glyphicon-user" aria-hidden="true"></i></li>
						<li><h4><?php echo $o_id[$j]; ?></h4><span></span></li><br>
						<li><h5><b>Total Items:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo  $items[$j];?></h5><span></span></li><br>
						<li><h5><b>Grand Total:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo  $grand_total[$j];?></h5><span></span></li><br>
						<li><h5><b>Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $status[$j];?></h5><span></span></li><br>
						<li><h5><b>Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $delivery_status[$j]; ?></h5><span></span></li><br>
						<li><a href="order_details.php?o_id=<?php echo $o_id[$j]; ?>&address_id=<?php echo $address_id[$j]; ?>&delivery_status=<?php echo $delivery_status[$j]; ?>&cancel=1"><button type="button" class="btn btn-info btn-lg">More Detail</button></a><span></span></li>
					</ul>
					
				</div>
				<?php 
				    }
				    else
				    {
				        ?>
				        
				 <div class="banner-bottom-grid1 privacy1-grid">
					<ul>
						<li><i class="glyphicon glyphicon-user" aria-hidden="true"></i></li>
						<li><h4><?php echo $o_id[$j]; ?></h4><span></span></li><br>
						<li><h5><b>Total Items:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo  $items[$j];?></h5><span></span></li><br>
						<li><h5><b>Grand Total:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo  $grand_total[$j];?></h5><span></span></li><br>
						<li><h5><b>Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color:red;">Order Canceled</span></h5><span></span></li><br>
						<li><h5><b>Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $delivery_status[$j]; ?></h5><span></span></li><br>
						<li><a href="order_details.php?o_id=<?php echo $o_id[$j]; ?>&address_id=<?php echo $address_id[$j]; ?>&delivery_status=<?php echo $delivery_status[$j]; ?>&cancel=0"><button type="button" class="btn btn-danger btn-lg">Canceled</button></a><span></span></li>
					</ul>
					
				</div>       
				    
				        <?php
				    }
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
	<?php require('pages/footer.php');?>
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
<script src="js/minicart.js"></script>
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