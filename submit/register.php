
<?php
if(isset($_POST['register']))
{
require('../conn.php');
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$name=$fname." ".$lname;
$password=$_POST['password'];
$email=$_POST['email'];
$phone=$_POST['phone'];


date_default_timezone_set('Asia/Kolkata');

$current_date = date('Y-m-d');

//$current_date_fetch = mysqli_query($query, "select CURDATE()");
//$current_date_result = mysqli_fetch_array($current_date_fetch);
//$current_date = $current_date_result['CURDATE()'];

$emailcheck=mysqli_query($query,"select * from users where email='$email'");
$phonecheck=mysqli_query($query,"select * from users where contact='$phone'");
$phonefetch=mysqli_fetch_array($phonecheck);
$check=mysqli_fetch_array($emailcheck);
if($email!=$check['email'] && $phone!=$phonefetch['contact'])
{

	$otp=rand(10000,99999);
	// Authorisation details.
	$username = "genuineseoindia2017@gmail.com";
	$hash = "c282e62fc8ff60c64c2c0777cf98421c43bac77810ba386fed9d22819443a4a9";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "GRCESE"; // This is who the message appears to be from.
	$numbers = $phone; // A single number or a comma-seperated list of numbers
	$message = "Dear user,
Thankx for registering with Grocease. Your OTP is ".$otp." .";
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

    
    
//otp code end


}
else
{
	if($email==$check['email'] && $phone==$phonefetch['contact'])
	{
		echo "<script>alert('You are already registered with us please login.'); 				window.location.assign('../register.php');</script>";
	}
	if($email==$check['email'] && $phone!=$phonefetch['contact'])
	{
		echo "<script>alert('This email is already registered with another account.');window.location.assign('../register.php'); </script>";
	}
	if($email!=$check['email'] && $phone==$phonefetch['contact'])
	{
		echo "<script>alert('This phone number is already registered with another account.');window.location.assign('../login.php'); </script>";
	}
	
}

}

?>



<html>
<title>Enter OTP</title>    
<body>
    	<div class="w3l_banner_nav_right">
<!-- login -->
		<div class="w3_login" id="login_register">

<p id="enter_otp" style="display:none;">
    <center><h3>Enter your otp which was send to your number <?php echo $_POST['phone']; ?></h3></center>
   <center> <form action="register_after_otp.php" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>" />
    <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>" />
    <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>" />
    <input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>" />
    <input type="hidden" name="p_otp" value="<?php echo $otp; ?>" />
    <input type="text" name="otp" placeholder="Enter OTP" />
    <input type="submit" name="submit_otp" value="Verify" />
    </form></center>
</p>    
</div>
</div>
</body>    
</html>
