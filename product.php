<?php
session_start();
require("conn.php"); 
require('pages/product_adding_deleting.php');
$pid=$_GET['pid'];
$product_fetch = mysqli_query($query, "SELECT * FROM product WHERE p_id = '$pid' ");
$product_result = mysqli_fetch_array($product_fetch);
$pname = $product_result['pname'];
$pdesc=$product_result['pdesc'];
$mrp=$product_result['mrp'];
$sprice=$product_result['selling_price'];
$img1=$product_result['img1'];
$img2=$product_result['img2'];
?>

<!DOCTYPE html>
<html>
<head>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-9716604723586867",
          enable_page_level_ads: true
     });
</script>    
    
<title><?php echo $pname; ?></title>
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
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	
<?php
if(isset($_SESSION['uid']))
{   
    $uid=$_SESSION['uid'];
    $uname=$_SESSION['uname'];
	$cart_item_fetch=mysqli_query($query,"select * from cart where uid='$uid'");
	$items=0;
	while($cart_item=mysqli_fetch_array($cart_item_fetch))
	{   
	    $cart_quantity=$cart_item['quantity'];
		$items=$items+$cart_quantity;
	}
?>
	<div class="agileits_header">
		<div class="w3l_offers">
		<a href="index.php"><img src="logo.png" alt="Grocease Logo" height="25px" width="150px"></a>
		</div>
				<div class="w3l_search dropdown">
			<form action="pages/search.php" method="post">
				<input type="text" name="product" class="search" id="myInput" onkeyup="filterFunction()" onclick="myFunction()" autocomplete="off" required>
				<input type="submit" value="" name="submit">
				
			</form>
			
			        <div id="myDropdown" class="dropdown-content display">
   
    
   
                     </div>
		
			
	        </div>
					
					
					 
		
        
            
            <a href="cart.php" class="product_list_header btn btn-success" style="min-height:40px;">Cart [<?php echo $items; ?>]</a>
		
        
        <div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:12px">Hello <?php for($len=0;$len<8;$len++){ echo $uname[$len]; } echo ".."; ?><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
							    <li><a href="usr_profile.php">My Profile</a></li>
                                <li><a href="my-orders.php">My Orders</a></li> 
								<li><a href="submit/logout.php">Logout</a></li>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="mail.php" class"btn btn-sm" role="button">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});

	</script>
	<script>
/*When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
} 
</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
			
			</div>
			<div class="w3ls_logo_products_left1">
				
			</div>
			
		</div>
	</div> 
	
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
<?php
}
else
{

?>




<div class="agileits_header">
		<div class="w3l_offers">
		<a href="index.php"><img src="logo.png" alt="Grocease Logo" height="25px" width="150px"></a>
		</div>
		<div class="w3l_search dropdown">
			<form action="pages/search.php" method="post">
				<input type="text" name="product" class="search" id="myInput" onkeyup="filterFunction()" onclick="myFunction()" autocomplete="off" required>
				<input type="submit" value="" name="submit">
				
			</form>
			
			        <div id="myDropdown" class="dropdown-content display">
   
    
   
                     </div>
		
			
	        </div>
					
					
			 <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
} 
</script>
        
		<a href="cart.php" class="product_list_header btn btn-success" style="min-height:40px;">Cart [0]</a>
        
        
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="login.php">Login</a></li> 
								<li><a href="register.php">Sign Up</a></li>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="mail.php" class"btn btn-sm" role="button">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	 <div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
			
			</div>
			<div class="w3ls_logo_products_left1">
				
			</div>
			
		</div>
	</div> 
    
    	
	
    <?php
}
	?>

	
	
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
			  <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li><?php echo $pname; ?></li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			 
			 	<div class="navbar-header nav_2">
              
			    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs"> <b>Shop by Category</b>
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				 </button>
			 </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				    
				<form action="category.php" method="get">
					<ul class="nav navbar-nav nav_1">
						<li><a href="category.php?category=Grocery+%26+Staples">Grocery & Staples</a></li>
						<li><a href="category.php?category=Beverages">Beverages</a></li>
						
						

						<li><a href="category.php?category=Household+Need">Household Need</a></li>
						<li><a href="category.php?category=Personal+Care">Personal Care</a></li>
						<li><a href="category.php?category=Breakfast+%26+Diary">Breakfast & Diary</a></li>
						<li><a href="category.php?category=Biscuits, Snacks+%26+Chocolates">Biscuits, Snacks & Chocolates</a></li>
						<li><a href="category.php?category=Noodles, Sauces+%26+Instant Food">Noodles, Sauces & Instant Food</a></li>
						<li><a href="category.php?category=Baby+%26+Kids">Baby & Kids</a></li>
						<li><a href="category.php?category=Pet+Care">Pet Care</a></li>
						<li><a href="category.php?category=Frozen+Foods">Frozen Foods</a></li>
					</ul>
					</form>
				 </div>
				
			  <!-- /.navbar-collapse -->
		  </nav>
		</div>
		<div class="w3l_banner_nav_right">
			<div>
				<div class="col-md-4 agileinfo_single_left">
    <!--    carousell image slider image code    -->
				
				<img class="mySlides img-responsive" src="product_image/<?php echo $pid?>/<?php echo $img1;?>">
               <img class="mySlides img-responsive" src="product_image/<?php echo $pid?>/<?php echo $img2;?>">
                
                <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                
                <button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>
                
                
                
              
						      <!--    carousell image slider image code    -->
	
					
				</div>
			
				<div class="col-md-8 agileinfo_single_right">
				  <h1 style="margin-top: 20px;"><?php echo $pname; ?></h1></br>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
					  </span>
				  </div>
					<div class="w3agile_description" style="word-break: break-all;">
						<h4>Description :</h4>
						<p><?php echo $pdesc; ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4>Rs.<?php echo $sprice; ?><span>Rs.<?php echo $mrp; ?></span></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
						  <form action="" method="post">
							<fieldset>
								<?php										if($product_result['quantity']<1)
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
													    if($cart_product_plus_minus_result['quantity']!=null  && isset($_SESSION['uid']))
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
						</br>
					</div>
			  </div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- brands -->
	<!-- Suggested products  -->
	
	
<!--<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
		<div class="container">
			<h3>Popular Brands</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6>food</h6>
				  <div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/5.png" alt=" " class="img-responsive" /></a>
											<p>knorr instant soup (100 gm)</p>
											<h4>$3.00 <span>$5.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="knorr instant soup" />
													<input type="hidden" name="amount" value="3.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>  
					
					<!-- Suggested products end  
					
					
					
<div class="clearfix">
	</div>
				</div>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6>vegetables & fruits</h6>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/9.png" alt=" " class="img-responsive" /></a>
											<p>fresh spinach (palak)</p>
											<h4>$2.00 <span>$3.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="fresh spinach" />
													<input type="hidden" name="amount" value="2.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/10.png" alt=" " class="img-responsive" /></a>
											<p>fresh mango dasheri (1 kg)</p>
											<h4>$5.00 <span>$8.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="fresh mango dasheri" />
													<input type="hidden" name="amount" value="5.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					
					<div class="clearfix"> </div>
				</div>
  </div>
	</div>
<!-- //brands --> 

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
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>


  <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
                
                <script>
                
                

              
                var slideIndex = 0;
                    carousel();

                    function carousel() {
                         var i;
                        var x = document.getElementsByClassName("mySlides");
                            for (i = 0; i < x.length; i++) {
                                 x[i].style.display = "none"; 
                                         }
                     slideIndex++;
         if (slideIndex > x.length) {slideIndex = 1} 
         x[slideIndex-1].style.display = "block"; 
         setTimeout(carousel, 5000); // Change image every 5 seconds
}</script>
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

</body>
</html>