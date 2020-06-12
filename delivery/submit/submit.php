<?php
require('../../conn.php');
if(isset($_POST['delivered']))
{
    $oid=$_POST['oid'];
    $number=$_POST['number'];
    $check_shipped=mysqli_query($query,"select * from order_tracking where o_id='$oid'");
    $tracking_result=mysqli_fetch_array($check_shipped);
    if($tracking_result['shipped']!=0)
    {
    $change_status=mysqli_query($query,"update order_tracking set confirmed='1',shipped='1',delivered='1' where o_id='$oid'");
        if($change_status==true)
        {   
            //sms code start
        	$username = "genuineseoindia2017@gmail.com";
        	$hash = "c282e62fc8ff60c64c2c0777cf98421c43bac77810ba386fed9d22819443a4a9";

	        // Config variables. Consult http://api.textlocal.in/docs for more info.
        	$test = "0";

        	// Data for text message. This is the text message data.
        	$sender = "GRCESE"; // This is who the message appears to be from.
        	$numbers = $number; // A single number or a comma-seperated list of numbers
        	$message = "Dear User, Thanks for shopping with us.

Your Order No. ".$oid." has been delivered Successfully.

Keep Shopping with us.
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
             echo "<script>alert('Order Delivered');window.location.assign('../index.php');</script>";
        }
        else
        {
             echo "<script>alert('some technicle error');window.location.assign('../index.php');</script>";
        }
    }
    else
    {
        echo "<script>alert('Bhaisab phele order utha toh lo.');window.location.assign('../index.php');</script>";
    }
    
}
else
{
    echo "nhi aaya";
}


?>