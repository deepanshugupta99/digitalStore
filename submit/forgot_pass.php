.<?php
if(isset($_POST['forgot']))
{
    require('../conn.php');
    $number=$_POST['phone'];
    $record_fetch=mysqli_query($query,"select * from users where contact='$number'");
    $record_result=mysqli_fetch_array($record_fetch);
    if($record_result!=null)
    {
    $user_password=$record_result['password'];    
	$username = "genuineseoindia2017@gmail.com";
	$hash = "c282e62fc8ff60c64c2c0777cf98421c43bac77810ba386fed9d22819443a4a9";
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";
	// Data for text message. This is the text message data.
	$sender = "GRCESE"; // This is who the message appears to be from.
     // A single number or a comma-seperated list of numbers
	$message = "Dear user, Your password for Grocease is ".$user_password.".";
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
    if ($result!=true) {
      echo "cURL Error #:";
    } else {
    echo "<script>alert('Your password send to your number.');window.location.assign('../login.php'); </script>";
    }	
    }//if number match wala if band    
   /* 
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=jyIkgzreonOSMUT5iD0NpQathRXZV7JYLf1lquKBd4C2xWsFPHlVnM9Bc07pwiW2OIbg4DGYKfRezdUQ&sender_id=FSTSMS&language=english&route=qt&numbers=".urlencode($number)."&message=5629&variables=".urlencode('{FF}')."&variables_values=".urlencode($user_password)."",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
    echo "<script>alert('Your password send to your number.');window.location.assign('../login.php'); </script>";
    }

*/    

    else
    {
        echo "<script>alert('This phone number is not registered.');window.location.assign('../login.php'); </script>";  
    }
}




?>