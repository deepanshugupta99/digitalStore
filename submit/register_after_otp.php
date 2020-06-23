
<?php
if(isset($_POST['submit_otp']))
{
    require('../conn.php');
    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $p_otp=$_POST['p_otp'];
    $otp=$_POST['otp'];
    date_default_timezone_set('Asia/Kolkata');

$current_date = date('Y-m-d');
    ?>
    <html>
        <head>
<title>Enter OTP</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
    
<body>
    <div class="w3l_banner_nav_right">
        <div class="w3_login" id="login_register">
            <div class="form">
<p id="enter_otp" style="display:none;">
    <h3>Enter your otp which was send to your number <?php echo $phone; ?></h3>
    <form action="register_after_otp.php" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>" />
    <input type="hidden" name="password" value="<?php echo $password; ?>" />
    <input type="hidden" name="email" value="<?php echo $email; ?>" />
    <input type="hidden" name="phone" value="<?php echo $phone; ?>" />
    <input type="hidden" name="p_otp" value="<?php echo $p_otp; ?>" />
    <input type="text" name="otp" placeholder="Enter OTP" />
    <input type="submit" name="submit_otp" value="Verify" />
    </form>
</p>    
</div>
</div>
    
</body>    
</html>
<?php
    if($otp==$p_otp)
    {
    	$insert=mysqli_query($query,"INSERT INTO `users`(`email`, `password`, `uname`, `contact`, `date`) VALUES('$email','$password','$name','$phone', '$current_date')");	       

	    if($insert!=true)
	    {	
		    echo "<script>alert('Some technicle error please try again'); window.location.assign('../register.php');</script>";	
	    }
	    else
	    {
		    $fetch=mysqli_query($query,"select * from users where email='$email' and password='$password'");
		    $row=mysqli_fetch_array($fetch);
		    if($email!=$row['email'])
		    {
			    echo "<script>window.location.assign('../login.php');</script>";
	    	}
		    else
    	    {
	    	session_start();
    		$uname=$row['uname'];
    		$contact=$row['contact'];   
    		$uid=$row['uid'];
    		$date=$row['date'];
    		$_SESSION['uid']=$uid;
    		$_SESSION['uname']=$uname;
    		$_SESSION['contact']=$contact;
    		$_SESSION['email']=$email;
    		$_SESSION['date']=$date;
	    	echo "<script>alert('Registered Successfully'); window.location.assign('../index.php');</script>";
	    	}
	    }
    }
    else
    {
        echo "<script>alert('Please enter correct OTP'); document.GetElementById('enter_otp').style.display='inline';</script>";        
    }
    
    
    
}
