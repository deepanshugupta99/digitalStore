<?php 
//order confirmed table fetching

$order_fetch = mysqli_query($query, "select * from order_confirmed where uid = '$uid' order by o_id desc");
$i=0;
while($order = mysqli_fetch_array($order_fetch))
{

$o_id[$i] = $order['o_id'];
$grand_total[$i] = $order['grand_total'];
$order_date[$i] = $order['order_date'];
$order_time[$i] = $order['order_time'];
$address_id[$i] = $order['address_id'];
$items[$i] = $order['total_item'];
$cancel_flag[$i]= $order['flag'];


$order_tracking_fetch = mysqli_query($query, "select * from order_tracking where o_id = '$o_id[$i]'");
$order_tracking = mysqli_fetch_array($order_tracking_fetch);
$delivered[$i] = $order_tracking['delivered'];
$shipped[$i] = $order_tracking['shipped'];
$recieved[$i] = $order_tracking['recieved'];
$confirmed[$i] = $order_tracking['confirmed'];
$status[$i] = "not recieved";
if($delivered[$i] == 1)
{
$status[$i] = "delivered";
}
else if($shipped[$i] == 1)
{
$status[$i] = "order shipped";
}
else if($confirmed[$i] == 1)
{
$status[$i] = "order confirmed"; 
}
else if($recieved[$i] == 1)
{
$status[$i] = "order recieved"; 
}



//current date fetch for checking status of delivery
//$current_date_fetch = mysqli_query($query, "select CURDATE()");
//$current_date_result = mysqli_fetch_array($current_date_fetch);
//$current_date[$i] = $current_date_result['CURDATE()'];
//$prev_date_fetch = mysqli_query($query, "select DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
//$prev_date_result = mysqli_fetch_array($prev_date_fetch);
//$prev_date[$i] = $prev_date_result['DATE_SUB(CURDATE(), INTERVAL 1 DAY)'];

//$current_time_fetch = mysqli_query($query, "select CURTIME()+10");
//$current_time_result = mysqli_fetch_array($current_time_fetch);
//$current_time[$i] = $current_time_result['CURTIME()+10'];
date_default_timezone_set('Asia/Kolkata');
$current_time[$i] = date('H:i:s');
$current_date[$i] = date('Y-m-d');
$last_time = '16:00:00';


$prev_date[$i] = date('Y-m-d', strtotime('-1 days'));

if($order_date[$i] == $current_date[$i] )
	{	if($delivered[$i] == 0)
			{
				if($order_time[$i] <= $last_time )
					{
						$delivery_status[$i] = "Order will be delivered today within 6PM to 9PM";
					}
			
				else 
					{
						$delivery_status[$i] = "Order will be delivered Tomorrow within 6PM to 9PM";
					}
	
 
			}
		else
			{
				$delivery_status[$i] = 'Delivered';
			}	
}
else if($order_date[$i] == $prev_date[$i])
	{
		if($delivered[$i] == 0)
			{
	 			if($order_time[$i] > $last_time)
					{
						$delivery_status[$i] = "Order will be delivered today within 6PM to 9PM";
					}
				else
					{
						$delivery_status[$i] = "Your order delivery is delayed. order will be delivered by today";
					}	
			}
		else
			{
				$delivery_status[$i] = 'Delivered';
			}

   }
 else if($delivered[$i] == 0)
 	{
		$delivery_status[$i] = " Sorry for the delay. Please contact 9818472360"; 
 	}  
	else if($delivered[$i] == 1)
 	{
		$delivery_status[$i] = " Delivered"; 
 	}  
   
  
   $i++;
    
}
   
   
?>