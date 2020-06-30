<?php

if(isset($_POST['add_to_cart']))
{
    if(isset($_SESSION['uid']))
    {
	    $uid=$_SESSION['uid'];
    }
    else
    {
        echo "<script>alert('Please login first');window.location.assign('login.php');</script>";
    }
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
				echo "<script>alert('Your product added'); window.location.assign('');</script>";
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
	  					echo "<script>alert('Your product quantity updated'); window.location.assign('');</script>";
					}
				}
				else
				{
				$available_quantity=$product_avail['quantity'];
				echo "<script>alert('This product has only $available_quantity quantity'); window.location.assign('');</script>";	
				}
			}
			else
			{
				echo "<script>alert('You can not add more than 6 quantity'); window.location.assign('');</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('Sorry product out of stock'); window.location.assign('');</script>";
	}
}


if(isset($_POST['product_delete']))
{
    if(isset($_SESSION['uid']))
    {
	    $uid=$_SESSION['uid'];
    }
    else
    {
        echo "<script>alert('Please login first');window.location.assign('login.php');</script>";
    }
	$cart_id=$_POST['cart_id'];	
	$delete=mysqli_query($query,"DELETE FROM `cart` WHERE cart_id='$cart_id'");	
	if($delete==true)
	{
		echo "<script>alert('Product Deleted');  window.location.assign('');</script>";
	}
		
}


if(isset($_POST['update_quantity']))
{
    if(isset($_SESSION['uid']))
    {
	    $uid=$_SESSION['uid'];
    }
    else
    {
        echo "<script>alert('Please login first');window.location.assign('login.php');</script>";
    }
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
			echo "<script>alert('sorry we have only $new_quantity quantity available for $pname'); window.location.assign('');</script>";	
		}
		else
		{
			$udate_quantity=mysqli_query($query,"UPDATE `cart` SET `quantity`='$new_quantity' where cart_id='$cart_id'");
		}
	}
	else
	{
		
		echo "<script>alert('sorry the product $pname is out of stock'); window.location.assign('');</script>";
	}
}


if(isset($_POST['reduce_one_from_cart']))
{   
    if(isset($_SESSION['uid']))
    {
	    $uid=$_SESSION['uid'];
    }
    else
    {
        echo "<script>alert('Please login first');window.location.assign('login.php');</script>";
    }
	$quantity=$_POST['cart_quantity_minus'];
	$pid=$_POST['pid'];    
	if($quantity==1)
	{
	    mysqli_query($query,"delete from cart where uid='$uid' and p_id='$pid'");
	    echo "<script>window.location.assign('');</script>";  
	}
	else
	{
	    $new_quantity=$quantity-1;
	    $udate_quantity=mysqli_query($query,"UPDATE `cart` SET `quantity`='$new_quantity' where uid='$uid' and p_id='$pid'");
	    echo "<script>window.location.assign('');</script>";
	}
	
}



?>