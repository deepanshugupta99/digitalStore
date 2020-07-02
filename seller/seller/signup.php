<?php 
session_start();
if(isset($_SESSION['mid'])){
header('location:../admin/index.php');
}
else {
  echo "<script>alert('Registration Not Allowed'); window.location.assign('login.php');  </script>";   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="author" content="GrayGrids Team">
<title>DGcart</title>

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
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>
<body>

<div class="header">
<nav class="navbar navbar-default main-navigation" role="navigation">
<div class="container">
<div class="navbar-header">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<a class="navbar-brand logo" href="../index.php">DGCART</a>
</div>


<div class="collapse navbar-collapse" id="navbar">
<ul class="nav navbar-nav navbar-right">
<li><a href="login.php"><i class="lnr lnr-enter"></i> Login</a></li>

</ul>
</div>

</div>
</nav>



<div class="page-header" style="background: url(../assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="page-title">Register as Seller/Merchant</h2>
</div>
</div>
</div>
</div>
</div>
<section id="content">
<div class="container">
<div class="row">
<style>
* {
  box-sizing: border-box;
}
	#submit1 {
		background-color: #3DAE07;
	}
body {
  background-color: #f1f1f1;
}
#regForm {
  background-color: #ffffff;
  margin: 10px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */



button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}
	
/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
	.input_invalid{
		color: red;
	}
	.input_valid{
		color: limegreen;
	}
</style>

<!-- form valiodation -->

	
<form class="login-form" name="myForm" action="register.php" onSubmit=" return mregister_validation()" id="regForm" method="post">
  
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
  <div class="box">
<h2 class="title-2">SELLER SIGNUP DETAILS</h2>
<div class="form-group">
<label class="control-label" for="textarea">First Name</label> <input class="form-control" placeholder="First Name" type="text" name="fname" id="fname" onKeyUp="name_check()" minlength="3" maxlength="25" required >
		<span id="fname_check" class="input_invalid" style="display: none;">**Atleast 3 characters long**</span>
	<span id="fname_check_ok" class="input_valid" style="display: none;">Ok</span>
	<span id="fname_check_num" class="input_invalid" style="display: none;">*Only Alphabets are allowed*</span>
	  </div>
<div class="form-group">
<label class="control-label" for="textarea">Last Name</label> <input class="form-control" placeholder="Last Name" type="text" name="lname" id="lname" onKeyUp="lname_check()" minlength="3" maxlength="25" required >
		<span id="lname_check" class="input_invalid" style="display: none;">**Atleast 3 characters long**</span>
	<span id="lname_check_ok" class="input_valid" style="display: none;">Ok</span>
	<span id="lname_check_num" class="input_invalid" style="display: none;">*Only Alphabets are allowed*</span>
	  </div>
<div class="form-group">
<label class="control-label" for="textarea">Email</label> <input class="form-control" placeholder="Your Email" type="email" id="email" name="username" onKeyUp="ValidateEmail()" required>
	<span id="email_check" class="input_invalid" style="display: none;">**Wrong email**</span>
    <span id="email_check_ok" class="input_valid" style="display: none;">**Email ok**</span>
	  </div>
<div class="form-group">
<label class="control-label" for="textarea">Password</label> <input class="form-control" placeholder="Password" type="password" name="password" onKeyUp="pass_check()" maxlength="20" minlength="6" required>
	<span id="pass_check1" class="input_invalid" style="display: none;">**To Small  (Atleast 5 characters long)**</span>
	<span id="pass_check2" class="input_valid" style="display: none;">Average Ok</span>
	<span id="pass_check3" class="input_valid" style="display: none;">Very Strong</span>
</div>
<div class="form-group">
<label class="control-label" for="textarea">Phone Number</label> <input class="form-control" placeholder="Phone Number" type="text" name="contact" onKeyUp="num_check()" id="mobile" required maxlength="10" minlength="10">
			<span id="number_check" class="input_invalid" style="display: none;">**Not a valid Number**</span>
	<span id="number_check_ok" class="input_valid" style="display: none;">Ok</span>
</div>
<div class="form-group">
	<input type="submit" name="register" value="register" id="submit1" class="btn btn-success" />
</div>
</div>
  </div>


  <script>


  </script>
</form>


</div>
</div>
</section>


<?php
require('../dynamic-pages/footer.php');	
?>


<a href="#" class="back-to-top">
<i class="fa fa-angle-up"></i>
</a>

<script type="text/javascript" src="../assets/js/jquery-min.js"></script>
<script type="text/javascript" src="../assets/js/cat_change.js"></script>
<script type="text/javascript" src="../assets/js/form_valid.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/form_valid_merchant_signup.js"></script>
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
