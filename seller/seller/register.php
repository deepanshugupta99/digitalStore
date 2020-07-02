<?php 
if(isset($_POST['login']))
{
require_once('../conn.php');
$email=$_POST['username'];
$pass=$_POST['password'];
$q1=mysqli_query($query,"select * from merchants where email='$email'");
$q1_result=mysqli_fetch_array($q1);
$passnew=$q1_result['password'];
if($q1_result!=null){
if($passnew==$pass)
            {
$mid=$q1_result['m_id'];
$name=$q1_result['m_name'];
$number=$q1_result['contact'];
session_start();
$_SESSION['email']=$email;
$_SESSION['mid']=$mid;
$_SESSION['mname']=$name;
$_SESSION['mnumber']=$number;
echo $_SESSION['mname'].", ".$_SESSION['mnumber'].", ".$_SESSION['mid'];
header('location:../admin/index.php');
            }
	else
	{
		echo "<script>alert('Password is wrong'); window.location.assign('login.php');  </script>";
	}
}
else
{
	 echo "<script>alert('Email is wrong'); window.location.assign('login.php');  </script>";
}
}
if(isset($_POST['register']))
{
require('../conn.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$name=$fname." ".$lname;
$email = $_POST['username'];
$pass = $_POST['password'];
$number=$_POST['contact'];
$que3 = mysqli_query($query,"select email from merchants where `email`='$email'");
$result2 = mysqli_fetch_array($que3);
	if($result2['email']==$email){
  echo "<script>alert('Email you have entered already exist. Please try another email'); window.location.assign('signup.php');  </script>";     
		
	}// check if $result2==$email (if end)
	else{
		
		$que1 = mysqli_query($query,"insert into merchants(`m_name`,`email`,`password`,`contact`) values('$name','$email','$pass','$number')");

if($que1== true)
{

$que2 = mysqli_query($query,"select * from merchants where `email`='$email' and `password`='$pass'");
$result = mysqli_fetch_array($que2);
$mid = $result['m_id'];
echo $mid;
	session_start();
	$_SESSION['email']=$email;
$_SESSION['mid']=$mid;
$_SESSION['mname']=$name;
$_SESSION['mnumber']=$number;
	
	header('location:../admin/index.php');
}
	else{
		echo "Registration Unsuccessfull. Please try again";
	}
	}
}
?>
