<?php

if(isset($_POST['add_to_cart']))
{
	$pid=$_POST['pid'];
	$quantity=$_POST['quantity'];
	$check_product_avail=mysqli_query($query,"select * from product where p_id='$pid'");
	$product_avail=mysqli_fetch_array($check_product_avail);
	if($product_avail['quantity']>=$quantity)
	{
		$check_cart_product_exist=mysqli_query($query,"select * from cart where p_id='$pid' and uid='$uid'");
		$exist_pid=mysqli_fetch_array($check_cart_product_exist);
		if($exist_pid['cart_id']==null)
		{
			$add_cart=mysqli_query($query,"insert into cart(`uid`,`p_id`,`quantity`) values('$uid','$pid','$quantity')");
			if($add_cart==true)
			{
				echo "<script>alert('Your product added'); window.location.assign('cart.php');</script>";
			}
		}
		else
		{	
			if($exist_pid['quantity']<6)
			{
				if($exist_pid['quantity']<$product_avail['quantity'])
				{
					$new_quantity=$exist_pid['quantity']+1;
					$exist_cart=$exist_pid['cart_id'];
					$update_product_quantity=mysqli_query($query,"UPDATE `cart` SET `quantity`='$new_quantity' where cart_id='$exist_cart'");
					if($update_product_quantity==true)
					{
	  					echo "<script>alert('Your product quantity updated'); window.location.assign('cart.php');</script>";
					}
				}
				else
				{
				$available_quantity=$product_avail['quantity'];
				echo "<script>alert('This product has only $available_quantity quantity'); window.location.assign('cart.php');</script>";	
				}
			}
			else
			{
				echo "<script>alert('You can not add more than 6 quantity'); window.location.assign('cart.php');</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('Soory product out of stock'); window.location.assign('cart.php');</script>";
	}
}


if(isset($_POST['product_delete']))
{
	$cart_id=$_POST['cart_id'];	
	$delete=mysqli_query($query,"DELETE FROM `cart` WHERE cart_id='$cart_id'");	
	if($delete==true)
	{
		echo "<script>alert('Product Deleted'); window.location.assign('cart.php');</script>";
	}
		
}


if(isset($_POST['update_quantity']))
{
	$cart_id=$_POST['cartid'];
	$quantity=$_POST['quantity'];
	$new_quantity=$quantity;
	$pid=$_POST['pid'];
	$check_product_avail=mysqli_query($query,"select * from product where p_id='$pid'");
	$product_avail=mysqli_fetch_array($check_product_avail);
	$avail_quantity=$product_avail['quantity'];
	$pname=$product_avail['pname'];
	if($new_quantity>$avail_quantity)
	{
		$new_quantity=$avail_quantity;
	}
		
	if($new_quantity>0)
	{
		if($new_quantity<$quantity)
		{
			echo "<script>alert('sorry we have only $new_quantity quantity available for $pname'); window.location.assign('cart.php');</script>";	
		}
		else
		{
			$udate_quantity=mysqli_query($query,"UPDATE `cart` SET `quantity`='$new_quantity' where cart_id='$cart_id'");
			echo "<script>window.location.assign('cart.php');</script>";	
		}
	}
	else
	{
		
		echo "<script>alert('sorry the product $pname is out of stock'); window.location.assign('cart.php');</script>";
	}
}

if(isset($_POST['make_order']))
{
date_default_timezone_set('Asia/Kolkata');
$current_time = date('His');
$current_date = date('Y-m-d');
    
    
	$flag=1;
	$gtotal=$_POST['gtotal'];
	if($gtotal<1)
	{
	    echo "<script>alert('Fill Your basket First'); window.location.assign('cart.php');</script>";
	}
	else
	{
	$fname=$_POST['name'];
	$number=$_POST['number'];
	$landmark=$_POST['landmark'];
	$street="Free Hold";
	$hno=$_POST['hno'];
	$area="sanjay nagar";
	$city="ghaziabad";
	$cart_fetch=mysqli_query($query,"select * from cart where uid='$uid'");
	$h=0;
	while($cart=mysqli_fetch_array($cart_fetch))
	{
		$p_available[$h]=$cart['p_available'];
		$cart_id[$h]=$cart['cart_id'];
		$pid[$h]=$cart['p_id'];
		$product_fetch=mysqli_query($query,"select * from product where p_id='$pid[$h]'");
        $product_result=mysqli_fetch_array($product_fetch);	
        $selling_price[$h]=$product_result['selling_price'];
        $product_quantity[$h]=$product_result['quantity'];
		$cart_quantity[$h]=$cart['quantity'];
		if($p_available[$h]!=0 && $cart_quantity[$h]<=$product_quantity[$h])
		{
		}
		else
		{
			$flag=0;
			echo "<script>alert('sorry some of your product is exceeding the available quantity'); window.location.assign('cart.php');</script>";
			break;
		}
		$h++;
	}
	
	
	$billing_address_insert=mysqli_query($query,"insert into billing_adddress(`uid`,`name`,`mobile`,`pin_code`,`house_no`,`street`,`landmark`,`city`,`state`,`address_type`) values('$uid','$fname','$number','201002','$hno','$street','$landmark','$city','UP','home')");
	$address_id_fetch=mysqli_query($query,"select * from billing_adddress where uid='$uid' order by address_id desc");
	$address_fetch=mysqli_fetch_array($address_id_fetch);
	$address_id=$address_fetch['address_id'];

	if($flag==1)
	{
		$confirmed_order=mysqli_query($query,"insert into order_confirmed(`uid`,`address_id`,`total_item`, `order_date`, `order_time`,`grand_total`) values('$uid','$address_id','$h', '$current_date', '$current_time','$gtotal')");
		$order_confirmed_fetch=mysqli_query($query,"select * from order_confirmed where uid='$uid' order by o_id desc");
		$order_confirmed=mysqli_fetch_array($order_confirmed_fetch);
		$o_id=$order_confirmed['o_id'];
		if($o_id!=null)
		{	
			for($l=0;$l<$h;$l++)
			{
				mysqli_query($query,"insert into order_detail values('$o_id','$pid[$l]','$cart_quantity[$l]','$selling_price[$l]')");
				$original_product_fetch=mysqli_query($query,"select * from product where p_id='$pid[$l]'");
				$original_product=mysqli_fetch_array($original_product_fetch);
				$original_p_quantity=$original_product['quantity']-$cart_quantity[$l];
				$update_product=mysqli_query($query,"update product set quantity='$original_p_quantity' where p_id='$pid[$l]'");
			}
			$tracking_update = mysqli_query($query, "insert into order_tracking(`recieved`, `o_id`) values('1','$o_id') ");
			$cart_delete=mysqli_query($query,"delete from cart where uid='$uid'");
			
			//order sms comformation code
	        $username = "genuineseoindia2017@gmail.com";
	        $hash = "c282e62fc8ff60c64c2c0777cf98421c43bac77810ba386fed9d22819443a4a9";
        	// Config variables. Consult http://api.textlocal.in/docs for more info.
        	$test = "0";
	        // Data for text message. This is the text message data.
	        $sender = "GRCESE"; // This is who the message appears to be from.
	        // A single number or a comma-seperated list of numbers
	        $message = "Dear user,
Your order is confirmed with total items ".$h.". Please pay Rs. ".$gtotal." at the time of delivery. Regards Grocease Team.";
	       
	        // 612 chars or less
	        // A single number or a comma-seperated list of numbers
	        $message = urlencode($message);
	        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$number."&test=".$test;
	        $ch = curl_init('http://api.textlocal.in/send/?');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        $result = curl_exec($ch); // This is the result from the API
			curl_close($ch);

			$seller_name="Deepanshu Gupta";
			$seller_number="9654765835";
			$msg2_sms="Dear ".$seller_name.",
You have new order today ".$current_date.". Please confirm the order as soon as possible.
Thankx and regards GROCEASE TEAM.";
			
			//seller sms comformation code
			$message1 = urlencode($msg2_sms);
	        $data = "username=".$username."&hash=".$hash."&message=".$message1."&sender=".$sender."&numbers=".$seller_number."&test=".$test;
	        $ch = curl_init('http://api.textlocal.in/send/?');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        $result = curl_exec($ch); // This is the result from the API
			curl_close($ch);
			
			
			
			
			//order sms comformation code end
			echo "<script>alert('Your Order is received and a confirmation message send to your number- $number'); window.location.assign('my-orders.php');</script>";
		}
		else
		{
			echo "<script>alert('Some technicle error please try again'); window.location.assign('cart.php');</script>";
		}
	}
	else
	{
		echo "<script>alert('Some of your products is Out of Stock'); window.location.assign('cart.php');</script>";
	}
	}
	
}


?>