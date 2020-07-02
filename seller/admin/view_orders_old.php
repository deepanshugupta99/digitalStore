<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['bid'])){
	require('../conn.php');
    $bid=$_SESSION['bid']; 
	if(isset($_POST['submit_date']))
	{
		$date=$_POST['check_date'];
		echo $date;
		$order_check=mysqli_query($query,"select * from order_confirmed where order_date='$date' order by o_id desc");
	}
	else
	{
		$order_check=mysqli_query($query,"select * from order_confirmed order by o_id desc");
	}
	
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
<li class="active">
<a href="myadds.php"><i class="fa fa-home"></i>My Products</a>
</li>
</ul>
</div>
</div>

</div>
</div>
<div class="inner-box">

</aside>
</div>

<div class="col-sm-9 page-content">
<div class="inner-box">
<h2 class="title-2"><i class="fa fa-credit-card"></i> My ADS</h2>
	<form action="view_orders.php" method="post" >
	<?php  
		if(isset($_POST['submit_date']))
		{
	?>
	<input type="date" name="check_date" value="<?php echo $date; ?>" placeholder="Select Date For check order" />
	<?php
		}
		else
		{
	?>
	<input type="date" name="check_date" placeholder="Select Date For check order"  />
	<?php
		}
	?>
	<input type="submit" name="submit_date" value="Check Orders" class="btn btn-success btn-sm"> 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-success btn-sm" href="view_orders.php">All Orders</a>
	</form>
	
<div class="table-responsive">
<div class="table-action">
</div>

<table class="table table-striped table-bordered add-manage-table">
<thead>
<tr>
<th>Order ID.</th>
<th>Order Total</th>
<th>Customer Details</th>
<th>Order Date & Time</th>
<th>Option</th>
</tr>
</thead>
<tbody>
	<?php
	
	  $i = 1;
		while($order_fetch=mysqli_fetch_array($order_check))
		{
			$o_id[$i]= $order_fetch['o_id'];
		    $uid[$i]= $order_fetch['uid'];
            $address_id[$i]= $order_fetch['address_id'];
            $cancel_flag[$i]= $order_fetch['flag'];
			$order_date[$i]  = $order_fetch['order_date'];
			$order_time[$i]  = $order_fetch['order_time'];
			$order_day[$i]  = $order_fetch['order_day'];
			$grand_total[$i]  = $order_fetch['grand_total'];
			$customer_address_fetch=mysqli_query($query,"select * from billing_adddress where address_id='$address_id[$i]' and uid='$uid[$i]'");
			$user_address=mysqli_fetch_array($customer_address_fetch);
			$user_name[$i]=$user_address['name'];
			$user_number[$i]=$user_address['mobile'];
			$house_no[$i]=$user_address['house_no'];
			$street[$i]=$user_address['street'];
			$landmark[$i]=$user_address['landmark'];
			$status_fetch=mysqli_query($query,"select * from order_tracking where o_id='$o_id[$i]'");
			$status_result=mysqli_fetch_array($status_fetch);
			if($status_result['confirmed']!=0 && $status_result['shipped']!=1 && $status_result['delivered']!=1)
			{
				$status="confirmed";
			}
			if($status_result['confirmed']!=0 && $status_result['shipped']!=0 && $status_result['delivered']!=1)
			{
				$status="shipped";
			}
			if($status_result['confirmed']!=0 && $status_result['shipped']!=0 && $status_result['delivered']!=0)
			{
				$status="delivered";
			}
			if($status_result['confirmed']!=1 && $status_result['shipped']!=1 && $status_result['delivered']!=1)
			{
				$status="received";
			}
			
			
		if($cancel_flag[$i]!=0)
		{
?>
<tr style="max-width: 100%;">
<td class="add-img-selector">
<div>
<label>
<?php echo $o_id[$i]; ?>.
</label>
</div>
</td>
<td class="add-img-td">
Rs.<?php echo $grand_total[$i]; ?>
</td>
<td class="ads-details-td">
<h4>Order Status:<?php echo $status; ?> </h4>
<p><strong>Customer name:</strong><?php echo $user_name[$i]; ?></p>
<p><strong>Customer Contact: </strong><?php echo $user_number[$i]; ?></p>
<p><strong>Customer Address: </strong><?php echo $house_no[$i].",".$street[$i].",".$landmark[$i]; ?></br>
Sanjay nagar,Sector-23.	
</p>
</td>
<td class="price-td">
	<p><strong>Order Date: </strong><?php echo $order_date[$i]; ?></p>
	<p><strong>Order Time: </strong><?php echo $order_time[$i]; ?></p>
</td>
<td class="action-td">
<p>
    <form action="view_order_details.php" method="get" >
        <input type="hidden" name="number" value="<?php echo $user_number[$i]; ?>" />
        <button type="submit" class="fa fa-pencil-square-o btn btn-success btn-md" name="order_detail" value="<?php echo $o_id[$i]; ?>" > View Order</butto>
        
    </form>
</p>

</td>
</tr>
<?php
		}
		else
		{
		    
// order cancel show
?>

<tr style="max-width: 100%;">
<td class="add-img-selector">
<div>
<label>
<?php echo $o_id[$i]; ?>.
</label>
</div>
</td>
<td class="add-img-td">
Rs.<?php echo $grand_total[$i]; ?>
</td>
<td class="ads-details-td">
<h4>Order Status:<span style="color:red;">Canceled</span> </h4>
<p><strong>Customer name:</strong><?php echo $user_name[$i]; ?></p>
<p><strong>Customer Contact: </strong><?php echo $user_number[$i]; ?></p>
<p><strong>Customer Address: </strong><?php echo $house_no[$i].",".$street[$i].",".$landmark[$i]; ?></br>
Sanjay nagar,Sector-23.	
</p>
</td>
<td class="price-td">
	<p><strong>Order Date: </strong><?php echo $order_date[$i]; ?></p>
	<p><strong>Order Time: </strong><?php echo $order_time[$i]; ?></p>
</td>
<td class="action-td">
<p>

        <button type="button" class="fa fa-pencil-square-o btn btn-success btn-md" > Order Canceled</butto>
        
</p>

</td>
</tr>   


<?php
		}
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
