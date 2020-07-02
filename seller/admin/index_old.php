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
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="author" content="GrayGrids Team">
<title>Business Index</title>

<link rel="shortcut icon" href="../assets/img/favicon.png">

<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="../assets/css/jasny-bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="../assets/css/jasny-bootstrap.min.css" type="text/css">

<link rel="stylesheet" href="../assets/css/material-kit.css" type="text/css">

<link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="../assets/fonts/line-icons/line-icons.css" type="text/css">

<link rel="stylesheet" href="../assets/css/main.css" type="text/css">

<link rel="stylesheet" href="../assets/extras/animate.css" type="text/css">

<link rel="stylesheet" href="../assets/extras/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="../assets/extras/owl.theme.css" type="text/css">
<link rel="stylesheet" href="../assets/extras/settings.css" type="text/css">

<link rel="stylesheet" href="../assets/css/responsive.css" type="text/css">

<link rel="stylesheet" href="../assets/css/bootstrap-select.min.css">
</head>
<style>
#scateducation{
		display:none;
	}
	#scatshopping{
		display: none;
	}
	#sscat{
		display: none;
	}
	#scatrealestate{
		display:none;
	}
	#scatvehicle{
		display: none;
	}
	#sstutioncoaching{
		display: none;
	} 
	#sstraininginstitute{
		display: none;
	} 
	#sscolleges{
		display: none;
	}
	#ssschools{
		display: none;
	}
	#ssspoken{
		display: none;
	}
	#ssmusic{
		display: none;
	}
	#ssdance{
		display: none;
	}
	#sss9-12{
		display: none;
	} 
	#sssprogramminglanguage{
		display: none;
	}
	#sssengineeringdesign{
		display: none;
	}
	#sssmultimediadesign{
		display: none;
	}
	#sssmobiledevelopment{
		display: none;
	}
	#ssscomputernetwork{
		display: none;
	}
	#sssdatabasetraining{
		display: none;
	}
	#sssadministrationtraining{
		display: none;
	}
	#sss9-12{ display: none; }
	#sssprogramminglanguage{ display: none; }
	#sssengineeringdesign{ display: none; }
	#sssmultimediadesign{ display: none; }
	#sssmobiledevelopment{display: none; } 
	#important{
		color: red;
	}
	.input_invalid{
		color: red;
	}
	.input_valid{
		color: limegreen;
	}
	</style>
<body>

<a<div class="header">
<nav class="navbar navbar-default main-navigation" role="navigation">
<div class="container">
<div class="navbar-header">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<a class="navbar-brand logo" href="../index.php"><img src="../assets/img/logo.png" alt=""></a>
</div>


<div class="collapse navbar-collapse" id="navbar">
<ul class="nav navbar-nav navbar-right">

<li><a href="logout.php"><i class="lnr lnr-user"></i> Logout</a></li>
<li class="postadd">
<!--<a class="btn btn-danger btn-post" href="index.php"><span class="fa fa-plus-circle"></span> Post an Ad</a>-->
</li>
</ul>
</div>

</div>
</nav>




<div id="content">
<div class="container">
<div class="row">
<div class="col-sm-3 page-sideabr">
<aside>
<div class="inner-box">
<div class="user-panel-sidebar">
<div class="collapse-box">
<h5 class="collapset-title no-border">My Classified <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified"><i class="fa fa-angle-down"></i></a></h5>
<div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
<ul class="acc-list">
<li class="active">
<a href="index.php"><i class="fa fa-home"></i>Home</a>
</li>
<li class="active">
<a href="myadds.php"><i class="fa fa-home"></i>My Products</a>
</li>
<li class="active">
<a href="add_product.php"><i class="fa fa-home"></i>Add Products</a>
</li>
<li class="active">
<a href="view_orders.php"><i class="fa fa-home"></i>View Orders</a>
</li>
</ul>
</div>
</div>
	<!--
<div class="collapse-box">
<h5 class="collapset-title">My Ads <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myads"><i class="fa fa-angle-down"></i></a></h5>
<div aria-expanded="true" id="myads" class="panel-collapse collapse in">
<ul class="acc-list">
<li>
<a href=""><i class="fa fa-credit-card"></i> My Ads <span class="badge">44</span></a>
</li>
<li>
<a href="#"><i class="fa fa-heart-o"></i> Favourite Ads <span class="badge">19</span></a>
</li>
<li>
<a href="#"><i class="fa fa-star-o"></i> Saved Search <span class="badge">13</span></a>
</li>
<li>
<a href="#"><i class="fa fa-folder-o"></i> Archived Ads <span class="badge">49</span></a>
</li>
<li>
<a href="#"><i class="fa fa-hourglass-o"></i> Pending Approval <span class="badge">33</span></a>
</li>
</ul>
</div>
</div>-->

</div>
</div>
<div class="inner-box">

</aside>
</div>
<div class="col-sm-9 page-content">
<!--<div class="inner-box">
<div class="usearadmin">
<h3><a href="#"><img class="userimg" src="../assets/img/user.jpg" alt="">  <?php  echo $_SESSION['mname'];  ?></a></h3>
</div>
</div>-->
<div class="inner-box">
<div class="welcome-msg">
<h3 class="page-sub-header2 clearfix no-padding">Hello <?php  echo $_SESSION['mname'];  ?></h3><a href="update/business_update.php" target="_blank">Edit</a>
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
</div>
</div>
</div>






<a href="#" class="back-to-top">
<i class="fa fa-angle-up"></i>
</a>
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
