<!DOCTYPE html>

<?php 
session_start();
if(isset($_SESSION['bid'])){
	require('../conn.php');
    $bid=$_SESSION['bid'];	 
}
else {
  echo "<script>alert('Access Denied. Please Login First'); window.location.assign('../seller/signup.php');  </script>";


}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="author" content="GrayGrids Team">
<title>My Adds</title>

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

<a class="navbar-brand logo" href="../index.php"><img src="../assets/img/logo.png" alt=""></a>
</div>


<div class="collapse navbar-collapse" id="navbar">
<ul class="nav navbar-nav navbar-right">

<li><a href="logout.php"><i class="lnr lnr-user"></i> Logout</a></li>
<li class="postadd">
</li>
</ul>
</div>



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
<a href="add_product.php"><i class="fa fa-home"></i>Add Products</a>
</li>
</ul>
</div>
</div>
<!--<div class="collapse-box">
<h5 class="collapset-title">My Ads <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myads"><i class="fa fa-angle-down"></i></a></h5>
<div aria-expanded="true" id="myads" class="panel-collapse collapse in">
<ul class="acc-list">
<li>
<a href=""><i class="fa fa-credit-card"></i>loop<span class="badge"></span></a>
</li>
<li>
<a href="#"><i class=""></i><span class="badge"></span></a>
</li>
<li>
<a href="#"><i class=""></i><span class="badge"></span></a>
</li>
<li>
<a hre<af="#"><i class=""></i><span class="badge"></span></a>
</li>
<li>
<a href="#"><i class=""></i><span class="badge"></span></a>
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
<div class="inner-box">
<h2 class="title-2"><i class="fa fa-credit-card"></i> My ADS</h2>
<div class="table-responsive">
<div class="table-action">
</div>

<table class="table table-striped table-bordered add-manage-table">
<thead>
<tr>
<th>Product ID.</th>
<th>Photo</th>
<th>Adds Details</th>
<th>Quantity Left</th>
<th>Option</th>
</tr>
</thead>
<tbody>
	<?php
	$pid_check2=mysqli_query($query,"select * from product where b_id='$bid' order by pname");
	  echo $bid;
	  $i = 1;
		while($product_fetch=mysqli_fetch_array($pid_check2))
		{
			$pid[$i]= $product_fetch['p_id'];
		    $pname[$i]= $product_fetch['pname'];
            $mrp[$i]= $product_fetch['mrp'];
			$sprice[$i]  = $product_fetch['selling_price'];
			$pdesc[$i]  = $product_fetch['pdesc'];
			$img1[$i]  = $product_fetch['img1'];
			$quantity[$i]  = $product_fetch['quantity'];
	
?>
<tr style="max-width: 100%;">
<td class="add-img-selector">
<div>
<label>
<?php echo $pid[$i]; ?>.
</label>
</div>
</td>
<td class="add-img-td">
<a href="ads-details.html">
<img class="img-responsive" src="assets/img/item/img-1.jpg" alt="img">
</a>
</td>
<td class="ads-details-td">
<h4><?php echo $pname[$i]; ?> </h4>

<p><strong>MRP: </strong><?php echo $mrp[$i]; ?></p>
<p><strong>Selling Price:  </strong><?php echo $sprice[$i]; ?></p>
</td>
<td class="price-td">
<?php echo $quantity[$i]; ?>
</td>
<td class="action-td">
<p><form action="update/product_update.php" method="get" ><button type="submit" class="fa fa-pencil-square-o btn btn-primary btn-xs" name="pid" value="<?php echo $pid[$i]; ?>" > Edit</butto></form></p>
<p><form action="#" method="get" ><button type="submit" class="fa fa-share-square-o btn btn-info btn-xs" name="addview" > view</butto></form></p>
<p><form action="myadds.php" method="get" ><button type="submit" class="fa fa-trash btn btn-danger btn-xs" name="adddelete" > Delete</butto></form></p>
</td>
</tr>
<?php
			$i=$i+1;
			
		}			
?>
</tbody>
</table>







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
