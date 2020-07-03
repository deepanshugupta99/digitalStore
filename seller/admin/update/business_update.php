<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['mid']) and isset($_SESSION['bid'])){
echo $_SESSION['bid'];
}
else 
{
  echo "<script>alert('Access Denied'); window.location.assign('../seller/signup.php');  </script>";
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="author" content="GrayGrids Team">
<title>Business Update</title>

<link rel="shortcut icon" href="../../assets/img/favicon.png">

<link rel="stylesheet" href="../../assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="../../assets/css/jasny-bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="../../assets/css/jasny-bootstrap.min.css" type="text/css">

<link rel="stylesheet" href="../../assets/css/material-kit.css" type="text/css">

<link rel="stylesheet" href="../../assets/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="../../assets/fonts/line-icons/line-icons.css" type="text/css">

<link rel="stylesheet" href="../../assets/css/main.css" type="text/css">

<link rel="stylesheet" href="../../assets/extras/animate.css" type="text/css">

<link rel="stylesheet" href="../../assets/extras/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="../../assets/extras/owl.theme.css" type="text/css">
<link rel="stylesheet" href="../../assets/extras/settings.css" type="text/css">

<link rel="stylesheet" href="../../assets/css/responsive.css" type="text/css">

<link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">
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

<a class="navbar-brand logo" href="../../index.php"><img src="../../assets/img/logo.png" alt=""></a>
</div>


<div class="collapse navbar-collapse" id="navbar">
<ul class="nav navbar-nav navbar-right">

<li><a href="../logout.php"><i class="lnr lnr-user"></i> Logout</a></li>
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
<a href="../index.php"><i class="fa fa-home"></i>View Business</a>
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
<form role="form" name="myForm" action="update.php" onSubmit="return submit_validation()" method="post">
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
  require('../../category_items_registration/sub_cat_list.html');
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
</div>
</div>
</div>






<a href="#" class="back-to-top">
<i class="fa fa-angle-up"></i>
</a>
<script type="text/javascript" src="../../assets/js/cat_change.js"></script>
<script type="text/javascript" src="../../assets/js/form_valid.js"></script>
<script type="text/javascript" src="../../assets/js/form_valid_submit.js"></script>
<script type="text/javascript" src="../../assets/js/jquery-min.js"></script>
<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../assets/js/material.min.js"></script>
<script type="text/javascript" src="../../assets/js/material-kit.js"></script>
<script type="text/javascript" src="../../assets/js/jquery.parallax.js"></script>
<script type="text/javascript" src="../../assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="../../assets/js/wow.js"></script>
<script type="text/javascript" src="../../assets/js/main.js"></script>
<script type="text/javascript" src="../../assets/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="../../assets/js/waypoints.min.js"></script>
<script type="text/javascript" src="../../assets/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="../../assets/js/form-validator.min.js"></script>
<script type="text/javascript" src="../../assets/js/contact-form-script.js"></script>
<script type="text/javascript" src="../../assets/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="../../assets/js/jquery.themepunch.tools.min.js"></script>
<script src="../../assets/js/bootstrap-select.min.js"></script>
</body>
</html>
