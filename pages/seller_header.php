<?php
if(isset($_SESSION['mid']))
{   
    $uid=$_SESSION['mid'];
    $uname=$_SESSION['mname'];
?>
	<div class="agileits_header">
		<div class="w3l_offers">
		<a href="../../index.php"><img src="../../logo.png" alt="Grocease Logo" height="25px" width="150px"></a>
		</div>

        <div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:12px">Hello <?php for($len=0;$len<8;$len++){ echo $uname[$len]; } echo ".."; ?><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu"> 
								<li><a href="../admin/logout.php">Logout</a></li>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="../../mail.php" class"btn btn-sm" role="button">Contact Us</a></h2>
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
		<a href="../../index.php"><img src="../../logo.png" alt="Grocease Logo" height="25px" width="150px"></a>
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
        
		
        
        
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="login.php">Login</a></li> 
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="../../mail.php" class"btn btn-sm" role="button">Contact Us</a></h2>
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