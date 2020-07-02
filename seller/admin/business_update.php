<!DOCTYPE html>
<?php 
//done1
session_start();
if(isset($_SESSION['mid']) and isset($_SESSION['bid'])){
}
else 
{
  echo "<script>alert('Access Denied'); window.location.assign('../seller/login.php');  </script>";
}
?>
<html>
<head>
<title>Grocease: Business Update</title>
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
				<li>Business Update</li>
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
<h3 class="page-sub-header2 clearfix no-padding">Hello <?php  echo $_SESSION['mname'];  ?></h3>
<span class="page-sub-header-sub small"></span>
</div>

<div id="accordion" class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"><h3><strong>Business Update Details</strong> </h3></a> </h4>
</div>
<div class="panel-collapse collapse in" id="collapseB1">
<div class="panel-body">
<form role="form" name="myForm" action="update/update.php" onSubmit="return submit_validation()" method="post">
<div class="form-group">
<label class="control-label">Business Name <span id="important">*</span></label>
<input class="form-control" placeholder="Enter your business name" onKeyUp="b_check()" type="text" name="b_name" maxlength="80">
	<span id="b_name_check" class="input_invalid" style="display: none;">**Atleast 4 characters long**</span>
	<span id="b_name_check_ok" class="input_valid" style="display: none;">Ok</span>
</div>
	
<div class="form-group">
<label class="control-label">Business Email</label>
<input class="form-control" placeholder="Business Email" id="email" type="email" onKeyUp="ValidateEmail()" name="email">
	<span id="email_check" class="input_invalid" style="display: none;">**Wrong email**</span>
    <span id="email_check_ok" class="input_valid" style="display: none;">**Email ok**</span>
</div>
<div class="form-group">
<label for="Phone" class="control-label">Contact Number <span id="important">*</span></label>
<input class="form-control" id="Phone" placeholder="Contact Number" onKeyUp="num_check()" type="text" name="contact" maxlength="10" minlength="10">
		<span id="number_check" class="input_invalid" style="display: none;">**Not a valid Number**</span>
	<span id="number_check_ok" class="input_valid" style="display: none;">Ok</span>
</div>
<div class="form-group">
<label class="control-label">Business Website</label>
<input class="form-control" placeholder="Optional" onKeyUp="validURL()" type="url" name="bwebsite">
	<span id="url_check" class="input_invalid" style="display: none;">**Wrong url**</span>
    <span id="url_check_ok" class="input_valid" style="display: none;">**url ok**</span>
</div>


<div class="form-group">
<label class="control-label">Select Categories <span id="important">*</span></label>
<select name="cat" id="catselect" onChange="cattoscat()" class="form-control">
	<option value="0">--Select Category--</option>
  	<option value="1">Education</option>
  	<option value="2">Shopping</option>
  	<option value="3">Real Estate</option>
</select>

	
</div>
	

<?php
  require('../category_items_registration/sub_cat_list.html');
	?>
<div class="form-group">
<label class="control-label">Description <span id="important">*</span></label>
<textarea name="desc" rows="3" cols="100" placeholder="Describe your product or service (Atleast 20 character long)" style="max-width: 100%;" onKeyUp="desc_check()"></textarea>
	<span id="desc_check2" class="input_invalid"></span>
	<span id="desc_check" class="input_invalid" style="display: none;"> character left from 20.</span>
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
<input class="form-control" placeholder="Shop no." type="text" onKeyUp="shop_check()" name="shop_no">
	<span id="shop_check_ok" class="input_valid" style="display: none;">ok</span>
</div>
<div class="form-group">
<label class="control-label">Block <span id="important">*</span></label>
<input class="form-control" placeholder="Block" type="text" onKeyUp="block_check()" name="block">
	<span id="block_check_ok" class="input_valid" style="display: none;">ok</span>
</div>
<div class="form-group">
<label class="control-label">Sector <span id="important">*</span></label>
<input class="form-control" placeholder="Sector" type="text" onKeyUp="sector_check()" name="sector">
	<span id="sector_check_ok" class="input_valid" style="display: none;">ok</span>
</div>
<div class="form-group">
<label class="control-label">Area <span id="important">*</span></label>
<select name="area" id="area" class="form-control">
	<option value="0">--Select Area--</option>
  	<option value="1">Abhay Khand</option>
  	<option value="2">Ankur Vihar</option>
  	<option value="3">Ahinsa Khand-1</option>
  	<option value="4">Ansal's Chiranjiv Vihar</option>
</select>
</div>



</div>
</div>
</div>

	
<button type="submit" class="btn btn-common btn-lg btn-block" name="b_update" id="registerok" >UPDATE</button>

	

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