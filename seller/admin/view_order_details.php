<!DOCTYPE html>

<?php 
//done1
session_start();
if(isset($_SESSION['bid'])){
	require('../conn.php');
    $bid=$_SESSION['bid']; 
	if(isset($_GET['order_detail']))
	{
		$oid=$_GET['order_detail'];
		$order_confirmed_fetch=mysqli_query($query,"select * from order_confirmed where o_id='$oid'");
		$order_confirmed_result=mysqli_fetch_array($order_confirmed_fetch);
		$address_id=$order_confirmed_result['address_id'];
		$gtotal=$order_confirmed_result['grand_total'];
		$billing_fetch=mysqli_query($query,"select * from billing_adddress where address_id='$address_id'");
		$billing_result=mysqli_fetch_array($billing_fetch);
		$user_mobile=$billing_result['mobile'];
		
	}
	else
	{
		echo "<script>alert('Please select Your order');window.location.assign('view_orders.php');</script>";
	}

    $check_status_fetch=mysqli_query($query,"select * from order_tracking where o_id='$oid'");
    $check_status_result=mysqli_fetch_array($check_status_fetch);
    $status_confirmed=$check_status_result['confirmed'];
    $status_shipped=$check_status_result['shipped'];
    $status_delivered=$check_status_result['delivered'];


	if(isset($_POST['order_cancel']))
	{
		$insert_status=mysqli_query($query,"update order_confirmed set flag='0' where o_id='$oid'");
		if($insert_status==true)
		{
		    //sms code start
        	$username = "genuineseoindia2017@gmail.com";
        	$hash = "c282e62fc8ff60c64c2c0777cf98421c43bac77810ba386fed9d22819443a4a9";

	        // Config variables. Consult http://api.textlocal.in/docs for more info.
        	$test = "0";

        	// Data for text message. This is the text message data.
        	$sender = "GRCESE"; // This is who the message appears to be from.
        	$numbers = $user_mobile; // A single number or a comma-seperated list of numbers
        	$message = "Dear User, Your Order No. ".$oid." has been canceled successfully.

Keep Shopping with Us.

- Regards GROCEASE";
        	// 612 chars or less
        	// A single number or a comma-seperated list of numbers
        	$message = urlencode($message);
        	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        	$ch = curl_init('http://api.textlocal.in/send/?');
        	curl_setopt($ch, CURLOPT_POST, true);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	$result = curl_exec($ch); // This is the result from the API
        	curl_close($ch);
        	
        	//sms code end
			echo "<script>alert('Your Order with order_id $oid is Cancelled');window.location.assign('view_orders.php');</script>";
		}
		else
		{
		echo "<script>alert('Some technicle error');window.location.assign('view_order_details.php?order_detail=$oid');</script>";
		}
	}	
	
	
	
	
	if(isset($_POST['order_packed']))
	{
		$insert_status=mysqli_query($query,"update order_tracking set confirmed='1',shipped='1' where o_id='$oid'");
		if($insert_status==true)
		{
		    //sms code start
        	$username = "genuineseoindia2017@gmail.com";
        	$hash = "c282e62fc8ff60c64c2c0777cf98421c43bac77810ba386fed9d22819443a4a9";

	        // Config variables. Consult http://api.textlocal.in/docs for more info.
        	$test = "0";

        	// Data for text message. This is the text message data.
        	$sender = "GRCESE"; // This is who the message appears to be from.
        	$numbers = $user_mobile; // A single number or a comma-seperated list of numbers
        	$delivery_contact="9457154479";
        	$message = "Dear User, Your Order is out for delivery. Estimated time b/w 6-9 pm. Kindly, keep the cash (Rs ".$gtotal.") ready.
Delivery Boy No: ".$delivery_contact."
- Regards GROCEASE";
        	// 612 chars or less
        	// A single number or a comma-seperated list of numbers
        	$message = urlencode($message);
        	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        	$ch = curl_init('http://api.textlocal.in/send/?');
        	curl_setopt($ch, CURLOPT_POST, true);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	$result = curl_exec($ch); // This is the result from the API
        	curl_close($ch);
        	
        	//sms code end
			echo "<script>alert('Your Order with order_id $oid is Packed');window.location.assign('view_orders.php');</script>";
		}
		else
		{
		echo "<script>alert('Some technicle error');window.location.assign('view_order_details.php?order_detail=$oid');</script>";
		}
	}
	if(isset($_POST['order_confirm']))
	{
		$insert_status=mysqli_query($query,"update order_tracking set confirmed='1' where o_id='$oid'");
		if($insert_status==true)
		{
			echo "<script>alert('Your Order with order_id $oid is Confirmed');window.location.assign('view_orders.php');</script>";
		}
		else
		{
		echo "<script>alert('Some technicle error');window.location.assign('view_order_details.php?order_detail=$oid');</script>";
		}
	}
	$order_check=mysqli_query($query,"select * from order_detail where o_id='$oid' order by o_id desc");
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
<title>Grocery : Merchant order details</title>

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
	.word_break{
		word-break: keep-all;
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

<a class="navbar-brand logo" href="index.php"><img src="../assets/img/logo.png" alt=""></a>
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
<h2 class="title-2">Order Details </h2>
<div class="table-responsive">
<div class="table-action">
</div>
<h3 style="float: left;">Order ID:<?php echo $oid; ?></h3>
	
	
	
<table class="table table-striped table-bordered add-manage-table">
<thead>
<tr>
<th>Product Id</th>
<th>Product Name</th>
<th>Quantity</th>
<th>Selling Price</th>
</tr>
</thead>
<tbody>
	<?php
	
	  $i = 1;
		while($order_fetch=mysqli_fetch_array($order_check))
		{
		    $pid[$i]= $order_fetch['p_id'];
            $quantity[$i]= $order_fetch['quantity'];
			$selling_price[$i] =$order_fetch['selling_price'];
			$product_fetch=mysqli_query($query,"select * from product where p_id='$pid[$i]'");
			$product=mysqli_fetch_array($product_fetch);
            
			$pname=$product['pname'];
			$mrp=$product['mrp'];
?>
<tr style="max-width: 100%;">
<td class="add-img-selector word_break">
<div>
<label>
<?php echo $pid[$i]; ?>
</label>
</div>
</td>
<td class="add-img-td word_break">
	<h4><?php echo $pname; ?></h4>
</td>
<td>
<h4><?php echo $quantity[$i]; ?> </h4>

</td>
<td class="price-td">
	
<p><?php echo $selling_price[$i]; ?></p>	
	
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

	<div style="float: left; word-break: break-all;"> 
	<?php
    if($status_confirmed!=1)
    {
        
    ?>
    <form action="view_order_details.php?order_detail=<?php echo $oid; ?>" method="post">
    <input type="submit" value="confirm" name="order_confirm" class="btn btn-success" />	
    </form>	
    <?php
    }

    ?>
    </div>
    
   
    
    <div style="float: left; word-break: break-all;"> 
    <?php
    if($status_shipped!=1)
    {
        
    ?>
    <form action="view_order_details.php?order_detail=<?php echo $oid; ?>" method="post">
    <input type="submit" value="Packed" name="order_packed" class="btn btn-danger" />	
    </form>
    <?php
    }

    ?>
    </div>
	<div style="float:center;"> 
    <form action="billing.php?o_id=<?php echo $oid; ?>" method="post">
    <input type="submit" value="Generate Bill" name="bill" class="btn btn-success" />	
    </form>	
    </div>
    <div style="float: right; word-break: break-all;"> 

    <?php
    if($status_delivered!=1)
    {
    ?>    
    <form action="view_order_details.php?order_detail=<?php echo $oid; ?>" method="post">
      
    <input type="submit" value="Cancel Order" name="order_cancel" class="btn btn-danger" />
    </form>	
    <?php
    }
    else
    {
    ?>
    <h1>Order Delevered </h1>
    <?php
    }
    ?>
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
