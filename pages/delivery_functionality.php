<?php
if(isset($_POST['submit_date']))
	{
		$date=$_POST['check_date'];
		$order_check=mysqli_query($query,"select * from order_confirmed where order_date>='$date' order by o_id desc");
	}
	else
	{
		//$date_fetch=mysqli_query($query,"select CURDATE()");
		//$date_result=mysqli_fetch_array($date_fetch);
		//$date=$date_result['CURDATE()'];
		$order_check=mysqli_query($query,"select * from order_confirmed order by o_id desc");
	}






?>