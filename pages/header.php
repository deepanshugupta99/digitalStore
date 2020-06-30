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