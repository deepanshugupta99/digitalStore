<?php
if(!($_SERVER['HTTP_REFERER']=="https://grocease.com/login.php" || $_SERVER['HTTP_REFERER']=="http://grocease.com/login.php"))
{
    echo "<script>alert('oo hacker bhaiya jada hack wack krne ki koshish na kro is site ko sirf login krke hi try kr lo'); window.location.assign('../login.php')</script>";
}
if(isset($_POST['login']))
	{
	require('../conn.php');
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	$emailcheck=mysqli_query($query,"select * from users where contact='$phone' and password='$password'");
	$row=mysqli_fetch_array($emailcheck);
	if($phone!=$row['contact'])
		{
		echo "<script>alert('Wrong Number or Password'); window.location.assign('../login.php');</script>";
		}
	else
		{
		    if($row['flag']!=0)
		    {
		        session_start();
        		$uname=$row['uname'];
	        	$contact=$row['contact'];
        		$uid=$row['uid'];
        		$date=$row['date'];
        		$email=$row['contact'];
        		$_SESSION['uid']=$uid;
        		$_SESSION['uname']=$uname;
        		$_SESSION['contact']=$contact;
        		$_SESSION['email']=$email;
        		$_SESSION['date']=$date;
        		echo "<script>alert('Login Success'); window.location.assign('../index.php');</script>";
		    }
		    else
		    {
		        echo "<script>alert('Your Account is banned due to your misbehaving'); window.location.assign('../index.php');</script>";
		    }
		}

	}

?>