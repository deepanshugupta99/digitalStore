<?php
session_start();
if(isset($_SESSION['mid']))
{
	header('location:../admin/index.php');
}
else
{
	
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Grocease: Mercant Login</title>
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
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="login.php">Business Login</a>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
	
		</div>
		<div class="w3l_banner_nav_right">
<!-- login -->
		<div class="w3_login" id="login_register">
			<h3>Business Login</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
				    <div class="tooltip">Click Me</div>
				  </div>
				   <div class="form">
					<h2>Login to your Business account</h2>
					<form action="register.php" onSubmit="return check_login()" method="post">
					  <input placeholder="Your Email" type="email" onKeyUp="ValidateEmail()" id="email" name="username">
					  <input placeholder="Password" type="password" name="password">
					  <input type="submit" name="login" value="login" id="submit1">
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>
					<form onSubmit="alert('Sorry we are not accepting merchent registration');" method="post">
					  <span id="fname_check" class="warning"></span>
					  <input onKeyUp="fname_check()" id="fname" type="text" name="fname" placeholder="First Name" required>
					  <span id="lname_check" class="warning"></span>
					  <input onKeyUp="lname_check()" id="lname" type="text" name="lname" placeholder="Last Name" required>
					  <span id="password_check" class="warning"></span>
					  <input onKeyUp="password_check()" id="password" type="password" minlength="4" maxlength="25" name="password" placeholder="Password" required>
					  <span id="email_check" class="warning"></span>
					  <input onKeyUp="email_check()" id="email" type="email" name="email" placeholder="Email Address" required>
					  <span id="num_check" class="warning"></span>
					  <input onKeyUp="number_check()" id="number" minlength="10" maxlength="10" type="text" name="phone" placeholder="Phone Number" required>
					  <input type="submit" value="Register" id="register" name="register">
		
					</form>
				  </div>
				  <!--<div class="cta" onclick="show_forgot_div()"><a href="#forgot_password">Forgot your password?</a></div><br>-->
				  <!--<div class="cta"><a href="#" style="text-decoration: underline;">Not Yet Registered? Click Here</a></div>-->
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
			<script>
			    function show_forgot_div()
			    {
			        document.getElementById("login_register").style.display="none";
			        document.getElementById("forgot_password").style.display="inline";
			    }
			    function close_forgot_div()
			    {
			        document.getElementById("login_register").style.display="inline";
			        document.getElementById("forgot_password").style.display="none";
			    }
			    
			</script>
		</div>
<!-- //login -->
<!-- forgot password div -->

		<div class="w3_login" id="forgot_password" style="display:none;">
			<h3>Forgot Password</h3>
			<div class="w3_login_module">
				<div class="module form-module">
		
					<h2>Enter your Registered Number</h2>
					<form action="forgot_pass.php" method="post">
					  <input type="text" name="phone" placeholder="Enter Your Mobile Number" required>
					  <input type="submit" value="Sent OTP" name="forgot">
					</form>
				
				  <div class="cta" onclick="close_forgot_div()"><a href="#login_register">Cancle</a></div><br>
				</div>
			</div>
		</div>


<!-- forgot password div -->

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