<!DOCTYPE html>



<?php 
require('conn.php');
$o_id = $_GET['o_id'];
$delivery_status = $_GET['delivery_status'];
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style class="vjs-styles-defaults">
      .vdo-js {
        width: 300px;
        height: 150px;
      }

      .vjs-fluid {
        padding-top: 56.25%
      }
    </style><style class="vjs-styles-dimensions">
      .vdo_ai_7941904-dimensions {
        width: 419px;
        height: 236px;
      }

      .vdo_ai_7941904-dimensions.vjs-fluid {
        padding-top: 56.25%;
      }
    </style>
<title>Shipment Track Widget Flat Responsive Widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="keywords" content="Shipment Track Widget Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
<script src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/client.js.download" async="" type="text/javascript"></script><script type="text/javascript" async="" src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/analytics.js.download"></script><script async="" src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/analytics.js.download"></script><script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/css" rel="stylesheet" type="text/css">
<link href="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/style.css" rel="stylesheet" type="text/css" media="all">
<script id="_bsa_srv-CKYI627U_0" type="text/javascript" src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/CKYI627U.json"></script><script id="_bsa_srv-CKYI653J_1" type="text/javascript" src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/CKYI653J.json"></script><script defer="" async="" src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/vdo.ai.js.download"></script><link id="_vdo_ads_css_5654_" rel="stylesheet" href="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/vdo.min.css"><script async="" src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/js"></script><link rel="preload" href="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/f.txt" as="script"><script type="text/javascript" src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/f.txt"></script></head>
<body style="">
<script src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/jquery.min.js.download"></script><script src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/monetization.js.download" type="text/javascript"></script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
	// format, zoneKey, segment:value, options
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
  	}
})();
</script><script>
	(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//vdo.ai/core/w3layouts/vdo.ai.js");
	</script><!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/js(1)"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125810435-1');
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-30027142-1', 'w3layouts.com');
  ga('send', 'pageview');
</script>

<!---728x90--->
<?php 
$order_tracking_fetch = mysqli_query($query, "select * from order_tracking where o_id = '$o_id'");
$order_tracking = mysqli_fetch_array($order_tracking_fetch);
$delivered = $order_tracking['delivered'];
$shipped = $order_tracking['shipped'];
$recieved = $order_tracking['recieved'];
$confirmed = $order_tracking['confirmed'];
$status = "not recieved";
if($delivered == 1)
{
$status = "delivered";
}
else if($shipped == 1)
{
$status = "order shipped";
}
else if($confirmed == 1)
{
$status = "order confirmed"; 
}
else if($recieved == 1)
{
$status = "order recieved"; 
}


?>




<div class="header">
	<h1>Shipment Track</h1>
</div>
<!---728x90--->
<!-- ------------------------------------------order recieved------------------------------------------------------------------ -->
<?php if($recieved == 1 && $confirmed == 0 && $shipped == 0 && $delivered == 0)

{
 ?>
<div class="content">
	<div class="content1">
		<h2>Order Tracking: <?php echo $o_id;?></h2>
	</div>
	<div class="content2">
		<div class="content2-header1">
			<p>Shipped Via : <span>Grocease</span></p>
		</div>
		<div class="content2-header1">
			<p>Status : <span>Recieved</span></p>
		</div>
		<div class="content2-header1">
			<p>Expected Date : <span><?php echo $delivery_status;?></span></p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="content3">
        <div class="shipment">
			<div class="confirm">
                <div class="imgcircle">
                    <img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/confirm.png" alt="confirm order">
            	</div>
				<span class="line"></span>
				<p>Order Recieved</p>
			</div>
			<div class="dispatch">
           	 	<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/process.png" alt="process order">
            	</div>
				<span class="line"></span>
				<p>Order Confirmed</p>
			</div>
			<div class="dispatch">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/quality.png" alt="quality check">
            	</div>
				<span class="line"></span>
				<p>Picked Up</p>
			</div>
			<div class="dispatch">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/dispatch.png" alt="dispatch product">
            	</div>
				<span class="line"></span>
				<p>On the Way</p>
			</div>
			<div class="delivery">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/delivery.png" alt="delivery">
				</div>
				<p>Product Delivered</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<!---728x90--->

<?php } ?>
<!-- ------------------------------------------order confirmed--------------------------------------------------------------- -->
<?php if($recieved == 1 && $confirmed == 1 && $shipped == 0 && $delivered == 0)
{
?>
<div class="content">
	<div class="content1">
		<h2>Order Tracking: <?php echo $o_id;?></h2>
	</div>
	<div class="content2">
		<div class="content2-header1">
			<p>Shipped Via : <span>Grocease</span></p>
		</div>
		<div class="content2-header1">
			<p>Status : <span>Confirmed</span></p>
		</div>
		<div class="content2-header1">
			<p>Expected Date : <span><?php echo $delivery_status;?></span></p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="content3">
        <div class="shipment">
			<div class="confirm">
                <div class="imgcircle">
                    <img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/confirm.png" alt="confirm order">
            	</div>
				<span class="line"></span>
				<p>Order Recieved</p>
			</div>
			<div class="process">
           	 	<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/process.png" alt="process order">
            	</div>
				<span class="line"></span>
				<p>Order Confirmed</p>
			</div>
			<div class="dispatch">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/quality.png" alt="quality check">
            	</div>
				<span class="line"></span>
				<p>Picked Up</p>
			</div>
			<div class="dispatch">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/dispatch.png" alt="dispatch product">
            	</div>
				<span class="line"></span>
				<p>On the Way</p>
			</div>
			<div class="delivery">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/delivery.png" alt="delivery">
				</div>
				<p>Product Delivered</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>


<?php } ?>
<!-- ------------------------------------------order picked up------------------------------------------------------------------ 

<div class="content">
	<div class="content1">
		<h2>Order Tracking: <?php echo $o_id;?></h2>
	</div>
	<div class="content2">
		<div class="content2-header1">
			<p>Shipped Via : <span>Grocease</span></p>
		</div>
		<div class="content2-header1">
			<p>Status : <span>Checking Quality</span></p>
		</div>
		<div class="content2-header1">
			<p>Expected Date : <span>7-NOV-2015</span></p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="content3">
        <div class="shipment">
			<div class="confirm">
                <div class="imgcircle">
                    <img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/confirm.png" alt="confirm order">
            	</div>
				<span class="line"></span>
				<p>Order Recieved</p>
			</div>
			<div class="process">
           	 	<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/process.png" alt="process order">
            	</div>
				<span class="line"></span>
				<p>Order Confirmed</p>
			</div>
			<div class="process">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/quality.png" alt="quality check">
            	</div>
				<span class="line"></span>
				<p>Picked Up</p>
			</div>
			<div class="dispatch">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/dispatch.png" alt="dispatch product">
            	</div>
				<span class="line"></span>
				<p>On the way</p>
			</div>
			<div class="delivery">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/delivery.png" alt="delivery">
				</div>
				<p>Product Delivered</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>


-->

<!-- ------------------------------------------order on the way------------------------------------------------------------------ -->
<?php if($recieved == 1 && $confirmed == 1 && $shipped == 1 && $delivered == 0)
{
?>
<div class="content">
	<div class="content1">
		<h2>Order Tracking: <?php echo $o_id;?></h2>
	</div>
	<div class="content2">
		<div class="content2-header1">
			<p>Shipped Via : <span>Grocease</span></p>
		</div>
		<div class="content2-header1">
			<p>Status : <span>Shipped</span></p>
		</div>
		<div class="content2-header1">
			<p>Expected Date : <span><?php echo $delivery_status;?></span></p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="content3">
        <div class="shipment">
			<div class="confirm">
                <div class="imgcircle">
                    <img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/confirm.png" alt="confirm order">
            	</div>
				<span class="line"></span>
				<p>Order Recieved</p>
			</div>
			<div class="process">
           	 	<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/process.png" alt="process order">
            	</div>
				<span class="line"></span>
				<p>Order Confirmed</p>
			</div>
			<div class="process">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/quality.png" alt="quality check">
            	</div>
				<span class="line"></span>
				<p>Picked Up</p>
			</div>
			<div class="process">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/dispatch.png" alt="dispatch product">
            	</div>
				<span class="line"></span>
				<p>On the way</p>
			</div>
			<div class="delivery">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/delivery.png" alt="delivery">
				</div>
				<p>Product Delivered</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>


<?php }?>



<?php if($recieved == 1 && $confirmed == 1 && $shipped == 1 && $delivered == 1)
{
?>
<div class="content">
	<div class="content1">
		<h2>Order Tracking: <?php echo $o_id;?></h2>
	</div>
	<div class="content2">
		<div class="content2-header1">
			<p>Shipped Via : <span>Grocease</span></p>
		</div>
		<div class="content2-header1">
			<p>Status : <span>Delivered</span></p>
		</div>
		<div class="content2-header1">
			<p>Expected Date : <span><?php echo $delivery_status;?></span></p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="content3">
        <div class="shipment">
			<div class="confirm">
                <div class="imgcircle">
                    <img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/confirm.png" alt="confirm order">
            	</div>
				<span class="line"></span>
				<p>Order Recieved</p>
			</div>
			<div class="process">
           	 	<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/process.png" alt="process order">
            	</div>
				<span class="line"></span>
				<p>Order Confirmed</p>
			</div>
			<div class="process">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/quality.png" alt="quality check">
            	</div>
				<span class="line"></span>
				<p>Picked Up</p>
			</div>
			<div class="process">
				<div class="imgcircle">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/dispatch.png" alt="dispatch product">
            	</div>
				<span class="line"></span>
				<p>On the way</p>
			</div>
			<div class="delivery">
				<div class="imgcircle"  style="background-color:green">
                	<img src="./Shipment Track Widget Flat Responsive Widget Template __ w3layouts_files/delivery.png" alt="delivery">
				</div>
				<p>Product Delivered</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php } ?>
<div class="footer">
	<p>Copyright © Grocease. All Rights Reserved | Design by <a href="http://grocease.com" target="_blank">Grocease</a></p>
</div>

</body></html>