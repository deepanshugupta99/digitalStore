<!DOCTYPE html>
<?php 
//done1
session_start();
if(isset($_SESSION['mid'])){

}
else {
  echo "<script>alert('Access Denied'); window.location.assign('../seller/login.php');  </script>";

}
?>
<html>
<head>
<title>Add Products</title>
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
				<li>Add Products</li>
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
<h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"><h3><strong>Add Products for <?php  echo $_SESSION['bname']; ?></strong> </h3></a> </h4>
</div>
<div class="panel-collapse collapse in" id="collapseB1">
<div class="panel-body">
<form role="form" name="myForm" action="register-business.php" onSubmit="return product_validation()" method="post" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label">Product Name <span id="important">*</span></label>
<input class="form-control" placeholder="Enter your Product name" type="text" name="p_name" maxlength="80" required>

</div>
<div class="form-group">
<label class="control-label">Product MRP <span id="important">*</span></label>
<input class="form-control" placeholder="Enter your Product MRP" type="number" name="mrp" maxlength="80" required>
</div>
<div class="form-group">
<label class="control-label">Selling Price <span id="important">*</span></label>
<input class="form-control" placeholder="Enter your Selling price" type="number" name="s_price" maxlength="80" required>
</div>
<div class="form-group">
<label class="control-label">Quantity of Product <span id="important">*</span></label>
<input class="form-control" placeholder="Enter product Quantity" type="number" name="quantity" maxlength="80" required>
</div>
<div class="form-group">
<label class="control-label">Select Categories <span id="important">*</span></label>
<select name="cat" class="form-control" required>
	<option value="0">--Select Category--</option>
  	<option value="1">Grocery & Staples</option>
	<option value="2">Beverages</option>
	<option value="4">Furnishing & Home Needs</option>
	<option value="5">Household Need</option>
	<option value="6">Personal Care</option>
	<option value="7">Breakfast & Diary</option>
	<option value="8">Biscuits, Snacks & Chocolates</option>
	<option value="9">Noodles, Sauces & Instant Food</option>
	<option value="10">Baby & Kids</option>
	<option value="11">Pet Care</option>
	<option value="12">Frozen Foods</option>
</select>
</div>
<div class="form-group">
<label class="control-label">Select Brand <span id="important">*</span></label>
<select name="scat" class="form-control" required>
	<option value="0">--Select Category--</option>
  	<option value="1">Pulses</option>
	<option value="2">Aata & Other Flours</option>
	<option value="3">Rice & Other Grains</option>
	<option value="4">Dry Fruits & Nuts</option>
	<option value="5">Edible Oils</option>
	<option value="6">Ghee & Vanaspati</option>
	<option value="7">Spices</option>
	<option value="8">Salt & Sugar</option>
	<option value="9">Soft Drinks</option>
	<option value="10">Juices</option>
	<option value="11">Tea & Coffee</option>
	<option value="12">Health & Energy Drinks</option>
	<option value="13">Water & Soda</option>
	<option value="14">Milk Drinks</option>
	<option value="15">Laundry Detergents</option>
	<option value="16">Dish Washers</option>
	<option value="17">Cleaners</option>
	<option value="18">Cleaning Tools & Brushes</option>
	<option value="19">Puja Needs</option>
	<option value="20">Repellents</option>
	<option value="21">Home & Car Freshners</option>
	<option value="22">Tissues & Disposables</option>
	<option value="23">Shoe Care</option>
	<option value="24">Bath & Body</option>
	<option value="25">Hair Care</option>
	<option value="26">Skin Care</option>
	<option value="27">Oral Care</option>
	<option value="28">Deos & Perfumes</option>
	<option value="29">Face Care</option>
	<option value="30">Feminine Hygiene</option>
	<option value="31">Health & Wellness</option>
	<option value="32">Cosmetics</option>
	<option value="33">Milk & Milk Products</option>
	<option value="34">Bread & Eggs</option>
	<option value="35">Paneer & Curd</option>
	<option value="36">Butter & Cheese</option>
	<option value="37">Breakfast cereal & Mixes</option>
	<option value="38">Jams, Honey & Spreads</option>
	<option value="39">Batter</option>
	<option value="40">Biscuits & Cookies</option>
	<option value="41">Namkeen & Snacks</option>
	<option value="42">Chips & Crisps</option>
	<option value="43">Chocolates & Candies</option>
	<option value="44">Noodles</option>
	<option value="45">Sauces & Ketchups</option>
	<option value="46">Jams Honey & Spreads</option>
	<option value="47">Pasta & Soups</option>
	<option value="48">Readymade Meals & Mixes</option>
	<option value="49">Pickels & Chutneys</option>
	<option value="50">Frozen Food</option>
	<option value="51">Baking & Desert Item</option>
	<option value="52">Diapers & wipes</option>
	<option value="53">Baby Skin & Hair Care</option>
	<option value="54">Baby Accessories</option>
	<option value="55">Kids Furnishing & Toys</option>
	<option value="56">Dogs Suuplies</option>
	<option value="57">Cat Supplies</option>
	<option value="58">Ready To cook/Ready To Eat</option>
	<option value="59">Frozen & canned Food</option>
</select>
</div>
<div class="form-group">
<label class="control-label">Product Description <span id="important">*</span></label>
<textarea name="desc" rows="3" cols="100" style="max-width: 100%;" placeholder="Describe your product or service (Atleast 20 character long)" onKeyUp="desc_check()" required></textarea>
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
<h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"><h3><strong>Upload Images</strong></h3></a> </h4>
</div>
<div class="panel-collapse collapse in" id="collapseB1">
<div class="panel-body">


<label class="control-label">1st Picture <span id="important">*</span></label>
<input id="input-b2" name="img1" type="file" class="file" onChange="img1_check()" data-show-preview="false" required>
	<span id="img1_check_ok" class="input_valid" style="display: none;">ok</br></span>
	<span id="img1_check" class="input_invalid" style="display: none;"> not ok</br></span>

<label class="control-label">2nd Picture <span id="important">*</span></label>
<input id="input-b2" name="img2" type="file" class="file" onChange="img2_check()" data-show-preview="false" required>
	<span id="img2_check_ok" class="input_valid" style="display: none;">ok</br></span>
	<span id="img2_check" class="input_invalid" style="display: none;"> not ok</br></span>

</div><div class="form-group hide">
<label class="control-label">Facebook account map</label>
<div class="form-control"> <a class="link" href="#l">Jhone.doe</a>
<a class=""> <i class="fa fa-minus-circle"></i></a>

</div>

</div>	
<button type="submit" class="btn btn-common btn-lg btn-block" name="p_register" id="registerok" >Submit</button>

	

</form>
</div>
</div>

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
<script type="text/javascript" src="../assets/js/product_valid_submit.js"></script>
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