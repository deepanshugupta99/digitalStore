<!DOCTYPE html>

<?php 
session_start();
if(isset($_SESSION['mid'])){
	require('../conn.php');
$mid=$_SESSION['mid'];
$bid_check=mysqli_query($query,"select * from business where m_id='$mid'");
	$bid_result2=mysqli_fetch_array($bid_check);
	if($bid_result2['b_id']!= null){
     $bid=$bid_result2['b_id'];
	 $bname=$bid_result2['business_name'];
	  $_SESSION['bid']=$bid;
	  $_SESSION['bname']=$bname;

	}
	else{
	header('location:business_details.php');	
	}
}
else {
  echo "<script>alert('Access Denied. Please Login First'); window.location.assign('../seller/login.php');  </script>";


}

?>
<html>
<head>
<title>Grocease: Merchant Home</title>
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
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a>
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
<!--<div class="inner-box">
<div class="usearadmin">
<h3><a href="#"><img class="userimg" src="../assets/img/user.jpg" alt="">  <?php  echo $_SESSION['mname'];  ?></a></h3>
</div>
</div>-->
<div class="inner-box">
<div class="welcome-msg">
<h3 class="page-sub-header2 clearfix no-padding">Hello <?php  echo $_SESSION['mname'];  ?></h3><a href="business_update.php" target="_blank">Edit</a>
<span class="page-sub-header-sub small"></span>
</div>

<div id="accordion" class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"><h3><strong>Business Details</strong> </h3></a> </h4>
</div>
	<?php
    $bname=	$bid_result2['business_name'];
	$bemail=$bid_result2['email'];
	$bcontact=$bid_result2['contact'];
	$bwebsite=$bid_result2['website'];
	$categoryid=$bid_result2['category_id'];
	$cat_check=mysqli_query($query,"select cat_name from all_category where cat_id='$categoryid'");
	$catresult=mysqli_fetch_array($cat_check);
	$category=$catresult['cat_name'];
	$subcatid=$bid_result2['scat_id'];
	$scat_check=mysqli_query($query,"select s_cat_name from all_s_cat where s_cat_id='$subcatid'");
	$scatresult=mysqli_fetch_array($scat_check);
	$subcat=$scatresult['s_cat_name'];
	$areaid=$bid_result2['area_id'];
	$area_check=mysqli_query($query,"select area_name from area where area_id='$areaid'");
	$arearesult=mysqli_fetch_array($area_check);
	$area=$arearesult['area_name'];
	$desc=$bid_result2['desc'];
	$shopno=$bid_result2['shopno'];
	$block=$bid_result2['block'];
	$sector=$bid_result2['sector'];
	
	?>
<div class="panel-collapse collapse in" id="collapseB1">
<div class="panel-body">
<form role="form" name="myForm" action="register-business.php" method="post">
<div class="form-group">
<label class="control-label">Business Name <span id="important">*</span></label>
<input class="form-control" value="<?php echo $bname; ?>" disabled type="text">

</div>
	
<div class="form-group">
<label class="control-label">Business Email</label>
<input class="form-control" placeholder="Optional" disabled value="<?php echo $bemail; ?>" id="email" type="email"  name="email">
	<span id="email_check" class="input_invalid" style="display: none;">**Wrong email**</span>
    <span id="email_check_ok" class="input_valid" style="display: none;">**Email ok**</span>
</div>
<div class="form-group">
<label for="Phone" class="control-label">Contact Number <span id="important">*</span></label>
<input class="form-control" id="Phone"  value="<?php echo $bcontact; ?>" disabled placeholder="Contact Number" onKeyUp="num_check()" type="text" name="contact" maxlength="10" minlength="10" required>
		<span id="number_check" class="input_invalid" style="display: none;">**Not a valid Number**</span>
	<span id="number_check_ok" class="input_valid" style="display: none;">Ok</span>
</div>
<div class="form-group">
<label class="control-label">Business Website</label>
<input class="form-control" placeholder="Optional" value="<?php echo $bwebsite; ?>"  onKeyUp="validURL()" type="url" disabled name="bwebsite">
	<span id="url_check" class="input_invalid" style="display: none;">**Wrong url**</span>
    <span id="url_check_ok" class="input_valid" style="display: none;">**url ok**</span>
</div>

<div class="form-group">
<label class="control-label">Your Categories <span id="important">*</span></label>
<input class="form-control" value="<?php echo $category; ?>" disabled type="text">	
</div>
<div class="form-group">
<label class="control-label">Your Sub-Categories <span id="important">*</span></label>
<input class="form-control" value="<?php echo $subcat; ?>" disabled type="text">	
</div>	
	
<div class="form-group">
<label class="control-label">Description <span id="important">*</span></label>
<textarea name="desc" rows="5" cols="100" placeholder="Describe your product or service (Atleast 150 character long)" style="max-width: 100%;" disabled onKeyUp="desc_check()" required><?php echo $desc; ?></textarea>
	<span id="desc_check2" class="input_invalid"></span>
	<span id="desc_check" class="input_invalid" style="display: none;"> character left from 150.</span>
	<span id="desc_check_ok" class="input_valid" style="display: none;">Ok Total length=</span>
	<span id="desc_check3" class="input_valid" style="display: none;"></span>

</div>
</div>
</div>
	</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"><h3><strong> Address Details</strong></h3></a> </h4>
</div>
<div class="panel-collapse collapse in" id="collapseB1">
<div class="panel-body">

<div class="form-group">
<label class="control-label">Shop No. <span id="important">*</span></label>
<input class="form-control"  value="<?php echo $shopno; ?>" disabled  placeholder="Shop no." type="text" onKeyUp="shop_check()" name="shop_no" required>
	<span id="shop_check_ok" class="input_valid" style="display: none;">ok</span>
</div>
<div class="form-group">
<label class="control-label">Block <span id="important">*</span></label>
<input class="form-control"  value="<?php echo $block; ?>" disabled  placeholder="Block" type="text" onKeyUp="block_check()" name="block" required>
	<span id="block_check_ok" class="input_valid" style="display: none;">ok</span>
</div>
<div class="form-group">
<label class="control-label">Sector <span id="important">*</span></label>
<input class="form-control"  value="<?php echo $sector; ?>" disabled  placeholder="Sector" type="text" onKeyUp="sector_check()" name="sector" required>
	<span id="sector_check_ok" class="input_valid" style="display: none;">ok</span>
</div>
<div class="form-group">
<label class="control-label">Your Area <span id="important">*</span></label>
<input class="form-control" value="<?php echo $area; ?>" disabled type="text">	
</div>

</div>
</div>
</div>

</form>
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
</body>
</html>